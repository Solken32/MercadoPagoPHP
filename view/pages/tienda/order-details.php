<?php
require_once __DIR__ . "/../../../config/config.php";
$publicKey = $_ENV['PUBLIC_KEY'];

require(__DIR__ . "/../../common/header.php");
?>

<div class="flex flex-col  gap-4">

    <div class="mx-auto px-4">
        <!-- Header -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl font-bold text-gray-900">Detalles de la Orden</h1>
                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                    <i class="fas fa-check-circle mr-1"></i>
                    Confirmada
                </span>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                <div>
                    <span class="text-gray-500">Número de Orden:</span>
                    <p class="font-semibold">#ORD-2024-001234</p>
                </div>
                <div>
                    <span class="text-gray-500">Fecha:</span>
                    <p class="font-semibold">21 de Junio, 2024</p>
                </div>
                <div>
                    <span class="text-gray-500">Entrega Estimada:</span>
                    <p class="font-semibold">25-27 de Junio, 2024</p>
                </div>
            </div>
        </div>

        <div class="cart-items grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Productos -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">
                        <i class="fas fa-shopping-bag mr-2 text-blue-600"></i>
                        Productos Ordenados
                    </h2>
                    
                    <!-- Producto 1 -->
                    <div class="flex items-center space-x-4 py-4 border-b border-gray-200">
                        <div class="flex-shrink-0">
                            <img src="/placeholder.svg?height=80&width=80" alt="Producto" class="w-20 h-20 object-cover rounded-lg">
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-lg font-medium text-gray-900">Camiseta Premium Cotton</h3>
                            <p class="text-sm text-gray-500">Color: Negro, Talla: M</p>
                            <p class="text-sm text-gray-500">SKU: TSH-001-BLK-M</p>
                        </div>
                        <div class="text-center">
                            <p class="text-sm text-gray-500">Cantidad</p>
                            <p class="font-semibold">2</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-500">Precio Unit.</p>
                            <p class="font-semibold">$29.99</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-500">Total</p>
                            <p class="font-semibold text-lg">$59.98</p>
                        </div>
                    </div>

                    <!-- Producto 2 -->
                    <div class="flex items-center space-x-4 py-4 border-b border-gray-200">
                        <div class="flex-shrink-0">
                            <img src="/placeholder.svg?height=80&width=80" alt="Producto" class="w-20 h-20 object-cover rounded-lg">
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-lg font-medium text-gray-900">Jeans Slim Fit</h3>
                            <p class="text-sm text-gray-500">Color: Azul Oscuro, Talla: 32</p>
                            <p class="text-sm text-gray-500">SKU: JNS-002-BLU-32</p>
                        </div>
                        <div class="text-center">
                            <p class="text-sm text-gray-500">Cantidad</p>
                            <p class="font-semibold">1</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-500">Precio Unit.</p>
                            <p class="font-semibold">$79.99</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-500">Total</p>
                            <p class="font-semibold text-lg">$79.99</p>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Sidebar con Resumen y Pago -->
            <div class="space-y-6">
                <!-- Resumen de la Orden -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">
                        <i class="fas fa-calculator mr-2 text-green-600"></i>
                        Resumen de la Orden
                    </h2>
                    
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal (3 artículos)</span>
                            <span class="font-medium">$269.96</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Envío</span>
                            <span class="font-medium">$15.00</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Impuestos</span>
                            <span class="font-medium">$22.80</span>
                        </div>
                        <div class="flex justify-between text-green-600">
                            <span>Descuento (SAVE10)</span>
                            <span class="font-medium">-$26.99</span>
                        </div>
                        <hr class="border-gray-200">
                        <div class="flex justify-between text-lg font-bold">
                            <span>Total</span>
                            <span class="text-blue-600">$280.77</span>
                        </div>
                    </div>

                    <!-- Información de Ahorro -->
                    <div class="mt-4 p-3 bg-green-50 rounded-lg">
                        <div class="flex items-center">
                            <i class="fas fa-piggy-bank text-green-600 mr-2"></i>
                            <span class="text-sm text-green-800 font-medium">
                                ¡Ahorraste $26.99 en esta orden!
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Información de Pago -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">
                        <i class="fas fa-credit-card mr-2 text-purple-600"></i>
                        Información de Pago
                    </h2>
                    
                    <div class="space-y-4">
                        <!-- Método de Pago Usado -->
                        <div class="p-3 bg-blue-50 rounded-lg border border-blue-200">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <i class="fab fa-cc-visa text-2xl text-blue-600 mr-3"></i>
                                    <div>
                                        <p class="font-medium text-gray-900">Visa terminada en 4242</p>
                                        <p class="text-sm text-gray-500">Método de pago utilizado</p>
                                    </div>
                                </div>
                                <i class="fas fa-check-circle text-green-600"></i>
                            </div>
                        </div>

                        <!-- Métodos de Pago Aceptados -->
                        <div>
                            <h3 class="text-sm font-medium text-gray-700 mb-2">Métodos de pago aceptados:</h3>
                            <div class="grid grid-cols-4 gap-2">
                                <div class="p-2 border border-gray-200 rounded text-center">
                                    <i class="fab fa-cc-visa text-xl text-blue-600"></i>
                                </div>
                                <div class="p-2 border border-gray-200 rounded text-center">
                                    <i class="fab fa-cc-mastercard text-xl text-red-600"></i>
                                </div>
                                <div class="p-2 border border-gray-200 rounded text-center">
                                    <i class="fab fa-cc-amex text-xl text-blue-500"></i>
                                </div>
                                <div class="p-2 border border-gray-200 rounded text-center">
                                    <i class="fab fa-paypal text-xl text-blue-700"></i>
                                </div>
                            </div>
                        </div>

                        <div id="wallet_container"></div>

                        <!-- Seguridad -->
                        <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                            <i class="fas fa-shield-alt text-green-600 mr-2"></i>
                            <span class="text-sm text-gray-700">
                                Pago procesado de forma segura con encriptación SSL
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Información de Envío -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">
                        <i class="fas fa-truck mr-2 text-orange-600"></i>
                        Información de Envío
                    </h2>
                    
                    <div class="space-y-3">
                        <div>
                            <p class="text-sm text-gray-500">Dirección de entrega:</p>
                            <p class="font-medium">Juan Pérez</p>
                            <p class="text-sm text-gray-700">Av. Principal 123, Apt 4B</p>
                            <p class="text-sm text-gray-700">Ciudad, Estado 12345</p>
                        </div>
                        
                        <div class="pt-3 border-t border-gray-200">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-600">Método de envío:</span>
                                <span class="font-medium">Envío Estándar</span>
                            </div>
                            <div class="flex items-center justify-between mt-1">
                                <span class="text-sm text-gray-600">Número de seguimiento:</span>
                                <span class="font-medium text-blue-600">#TRK123456789</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Acciones 
        <div class="mt-8 bg-white rounded-lg shadow-sm p-6">
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    <i class="fas fa-download mr-2"></i>
                    Descargar Factura
                </button>
                <button class="px-6 py-3 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
                    <i class="fas fa-truck mr-2"></i>
                    Rastrear Envío
                </button>
                <button class="px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                    <i class="fas fa-redo mr-2"></i>
                    Reordenar
                </button>
            </div>
        </div> -->
    </div>

    
</div>


<?php require(__DIR__ . "/../../common/footer.php"); ?>

<script>
    const mp = new MercadoPago("<?= $publicKey ?>", {
        locale: "es-PE"
    });

    function SendData() {

        //ENVIAR EL CARRITO AL BACKEND
        const carrito = JSON.parse(localStorage.getItem("cart")); // convierte texto a JSON
        console.log(carrito);
        fetch("<?= $BASE_URL ?>server/create_preference.php", {
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
                    window.location.href = "<?= $BASE_URL ?>/view/payNotification/pago-exitoso.php";
                },
                onPaymentRejected: (payment) => {
                    console.log("Pago rechazado", payment);
                    window.location.href = "<?= $BASE_URL ?>/view/payNotification/pago-fallido.php";
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