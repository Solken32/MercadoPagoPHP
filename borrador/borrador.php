<?php

namespace Examples\Preference;


require_once "vendor/autoload.php"; //carga todas las clase de mercado pago


use MercadoPago\Client\Common\RequestOptions;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\Exceptions\MPApiException;
use MercadoPago\MercadoPagoConfig;

// Set the production or sandbox access token
MercadoPagoConfig::setAccessToken("APP_USR-933836705807625-061309-b800135f1ba2a1b8cb7807adca658a2e-2487241761");

// Initialize the API client
$client = new PreferenceClient();


// EXTRAER DATA RECIBIDA
$data = json_decode(file_get_contents("php://input"), true);
$products = $data["products"];

try {
    $request = [
        "items" => [
            [
                "title" => "Potomachi",
                "unit_price" => 10.00,
                "quantity" => 1,
            ]
        ],
        "payment_methods" => [
            "excluded_payment_types" => [], // NO EXCLUIR NINGUN METODO DE PAGO
            "installments" => 1  // SOLO PERMITIDO UNA CUOTA
        ],
        "back_urls" => [ // DEFINIMOS PAHTS GAAA
            "success" => "https://hd0bbg0n-8000.use.devtunnels.ms/payNotification/pago-exitoso.php",
            "failure" => "https://hd0bbg0n-8000.use.devtunnels.ms/payNotification/pago-fallido.php",
            "pending" => "https://hd0bbg0n-8000.use.devtunnels.ms/payNotification/pago-pendiente.php"
        ],
        "auto_return" => "approved", // REDIRIGE AUTOMATICAMENTE SI EL PAGO FUE EXITOSO
    ];

    // Step 5: Create the request options, setting X-Idempotency-Key
    $request_options = new RequestOptions();
    $request_options->setCustomHeaders(["X-Idempotency-Key: DP1-0001"]);
    // Step 6: Make the request
    $preference = $client->create($request);
    
} catch (MPApiException $e) {
    echo "Status code: " . $e->getApiResponse()->getStatusCode() . "\n";
    echo "Content: ";
    var_dump($e->getApiResponse()->getContent());
    echo "\n";
} catch (\Exception $e) {
    echo $e->getMessage();
}
?>


<?php require(__DIR__ . "/view/common/header.php"); ?>
<div class="flex flex-col  gap-4">
    <div id="product-list" class="grid grid-cols-2  sm:grid-cols-3 lg:grid-cols-4 gap-6 ">

    </div>
    <div id="wallet_container"></div>
    <?php echo $products; ?>
</div>


<?php require(__DIR__ . "/view/common/footer.php"); ?>

<script>

    //ENVIAR EL CARRITO AL BACKEND
    const carrito = JSON.parse(localStorage.getItem("cart"));  // convierte texto a JSON
    fetch("/index.php",{
        method: "POST",
        headers: {"Content-Type":"application/json"},
        body:JSON.stringify({ products: carrito}) // convierte objeto a una cadena JSON
    })
    .then(res => res.json())
    .then(data => {
        console.log(data);
        
    })

    const mp = new MercadoPago("APP_USR-e0986749-4d8e-49c3-952a-cf82162a2428", {
        locale: "es-pe"
    });

    console.log("Preferencia:", "<?php echo $preference->id; ?>");
    mp.bricks().create("wallet", "wallet_container", {
        initialization: {
            redirectMode: "self",
            preferenceId: "<?php echo $preference->id; ?>"
        },

        callbacks:{
            onReady: () => {
                console.log("Brick listo");
            },
            onSubmit: (data) => {
                // SE PUEDE USAR PARA REGISTRAR ORDEN EN LA BD
                if (!data || !data.paymentData) {
                    console.error("No se recibió paymentData:", data); // ESTO SALE POR DEFAULT
                    return;
                }
                console.log("Pago enviado", data.paymentData);
            },
            onError: (error) => {
                console.error("Error en el pago", error);
                alert("Hubo un problema con el pago. Intenta Nuevamente");
            },
            onPaymentApproved: (payment) =>{
                console.log("Pago Aprobado", payment);
                window.location.href="/payNotification/pago-exitoso.php";
            },
            onPaymentRejected: (payment) => {
                console.log("Pago rechazado",payment);
                window.location.href="/payNotification/pago-fallido.php";
            }
        },

        customization: {
            theme: "dark", // TEMA DEL BOTON
            customStyle: {
                valueProp: 'practicality',

            },
        }
    })
</script>