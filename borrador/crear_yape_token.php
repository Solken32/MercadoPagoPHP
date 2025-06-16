<?php


require_once "vendor/autoload.php";  // Ruta al autoload de Composer

use MercadoPago\Client\Common\RequestOptions;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Payment\PaymentClient;
use MercadoPago\Exceptions\MPApiException;
use MercadoPago\Exceptions\MPException;
use MercadoPago\MercadoPagoConfig as MPC;

// Configura tu access token
MercadoPagoConfig::setAccessToken('TEST-3716927369784955-061017-84294c3d6d5b662a9645a5e3276d2cf3-2487195421');

// Recibir el token desde el frontend (por ejemplo, generado con mp.yape({...}).create())
$data = json_decode(file_get_contents('php://input'), true);
$token = $data['token'] ?? null;

// Opcional: validar token
if (!$token) {
    http_response_code(400);
    echo json_encode(['error' => 'Token no recibido']);
    exit;
}

// Crear cliente de pagos
$client = new PaymentClient();

// Crear la solicitud de pago
$createRequest = [
    "description" => "Pago con Yape - Producto de prueba",
    "installments" => 1,
    "payer" => [
        "email" => "test_user_2099502838@testuser.com",
    ],
    "payment_method_id" => "yape",
    "token" => $token,
    "transaction_amount" => 50.00,
];

try {
    $payment = $client->create($createRequest);
    // Depuración: ¿es un objeto válido?
    if ($payment) {
        echo json_encode($payment); // ✅ Esta línea debe devolver JSON
    } else {
        echo json_encode(['error' => 'Error desconocido al crear el pago.']);
    }
} catch (MPApiException $e) {
    echo json_encode(['x error' => $e->getApiResponse()->getContent()]);
    
} 
