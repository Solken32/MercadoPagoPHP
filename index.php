
<?php 
require_once __DIR__ . "/config/config.php";
$publicKey = $_ENV['PUBLIC_KEY'];

require(__DIR__ . "/view/common/header.php"); 
?>

<div class="flex flex-col  gap-4">
    <div id="product-list" class="grid grid-cols-2  sm:grid-cols-3 lg:grid-cols-4 gap-6 ">

    </div>
    <div id="wallet_container"></div>
</div>


<?php require(__DIR__ . "/view/common/footer.php"); ?>

<script>
    const mp = new MercadoPago("<?= $publicKey ?>", {
        locale: "es-PE"
    });

    function SendData() {

        //ENVIAR EL CARRITO AL BACKEND
        const carrito = JSON.parse(localStorage.getItem("cart")); // convierte texto a JSON
        console.log(carrito);
        fetch("/server/create_preference.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    products: carrito
                }) // convierte objeto a una cadena JSON
            })
            .then(res => res.json())
            .then(data => {
                console.log("Respuesta del backend:");
                console.log(data);
                const preferenceId = data.preferenceId;
                generateBrick(preferenceId);
            })
            .catch(error => {
                console.error("Ocurrió un error en el fetch:", error);
            });
    }

    function generateBrick(preferenceId) {
        mp.bricks().create("wallet", "wallet_container", {
            initialization: {
                redirectMode: "self",
                preferenceId: preferenceId
            },

            callbacks: {
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
                onPaymentApproved: (payment) => {
                    console.log("Pago Aprobado", payment);
                    window.location.href = "/payNotification/pago-exitoso.php";
                },
                onPaymentRejected: (payment) => {
                    console.log("Pago rechazado", payment);
                    window.location.href = "/payNotification/pago-fallido.php";
                }
            },

            customization: {
                theme: "dark", // TEMA DEL BOTON
                customStyle: {
                    valueProp: 'practicality',
                },
            }
        })
    }

    SendData();
</script>