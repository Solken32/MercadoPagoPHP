<?php

namespace Examples\Preference;

header('Content-Type: application/json'); 
require_once "../vendor/autoload.php"; //carga todas las clase de mercado pago
require_once __DIR__."/../config/config.php";


use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\Exceptions\MPApiException;
use MercadoPago\MercadoPagoConfig;

// Add access token e inicializar access token
MercadoPagoConfig::setAccessToken($_ENV["ACCESS_TOKEN"]);
$client = new PreferenceClient();

$data = json_decode(file_get_contents("php://input"), true);
$products= $data["products"] ?? [];

try {
    $request = [
        "items" => [],
        "payment_methods" => [
            "excluded_payment_types" => [], // No excluir ningun método de pago
            "installments" => 1  // Solo permitir una cuota
        ],
        "back_urls" => [ // Definimos pahts
            "success" => "https://hd0bbg0n-8000.use.devtunnels.ms/payNotification/pago-exitoso.php",
            "failure" => "https://hd0bbg0n-8000.use.devtunnels.ms/payNotification/pago-fallido.php",
            "pending" => "https://hd0bbg0n-8000.use.devtunnels.ms/payNotification/pago-pendiente.php"
        ],
        "auto_return" => "approved", // Redirige automaticamente si el pago es exitoso
    ];

    foreach ($products as $p) {
    $request["items"][] = [
        "title" => $p["name"],
        "unit_price" => floatval($p["price"]),
        "quantity" => 1
    ];
}

    //-------------------
    //Hacer la solicitud
    //-------------------
    $preference = $client->create($request);
    echo json_encode(["preferenceId" => $preference->id]);

} catch (MPApiException $e) {

    echo "Status code: " . $e->getApiResponse()->getStatusCode() . "\n";
    echo "Content: ";
    var_dump($e->getApiResponse()->getContent());
    echo "\n";

} catch (\Exception $e) {
    echo $e->getMessage();
}

?>