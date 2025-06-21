<aside id="cart-aside" class="flex flex-col fixed top-0 right-0 h-full w-full sm:w-96 bg-white shadow-2xl z-50 transform translate-x-full transition-transform duration-300 ease-in-out">

    <!-- Cart Header -->
    <div class="flex items-center justify-between p-6 border-b border-gray-200 bg-gray-50">
        <div class="flex items-center">
            <i class="fas fa-shopping-bag text-2xl text-blue-600 mr-3"></i>
            <h2 class="text-xl font-bold text-gray-800">Mi Carrito</h2>
        </div>
        <button onclick="closeCart()" class="cursor-pointer p-2 hover:bg-gray-200 rounded-full transition-colors">
            <i class="fas fa-times text-xl text-gray-600"></i>
        </button>
    </div>

    <!-- Cart Content -->
    <div class="flex flex-col h-full text-xs overflow-y-auto">

        <div id="cart-items" class="cart-items flex-1 overflow-y-auto p-6 space-y-4">
            <!-- Empty Cart Message (hidden by default) 
                    <div id="empty-cart" class="hidden text-center py-12">
                        <i class="fas fa-shopping-bag text-6xl text-gray-300 mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-600 mb-2">Tu carrito está vacío</h3>
                        <p class="text-gray-500 mb-6">¡Agrega algunos productos increíbles!</p>
                        <button id="continue-shopping" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition-colors">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Continuar Comprando
                        </button>
                    </div> -->
        </div>

        <!-- Cart Summary -->
        <div class="border-t border-gray-200 p-6 bg-gray-50">
            <!-- Price Breakdown -->
            <div class="space-y-2 mb-4">
                <div class="flex justify-between text-gray-600">
                    <span>Subtotal:</span>
                    <span id="subtotal">S/ 00.00</span>
                </div>
                <div class="flex justify-between text-gray-600">
                    <span>Impuestos:</span>
                    <span id="taxes">S/ 0.00</span>
                </div>
                <hr class="my-2">
                <div class="flex justify-between text-lg font-bold text-gray-800">
                    <span>Total:</span>
                    <span id="total">S/0.00</span>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="space-y-3 flex flex-col gap-0.4">
                <a href="/order-details">
                    <button class="cursor-pointer w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold transition-colors">
                        <i class="fas fa-credit-card mr-2"></i>
                        Proceder al Pago
                    </button>
                </a>
                <button id="continue-shopping-btn" class="cursor-pointer w-full bg-gray-200 hover:bg-gray-300 text-gray-800 py-3 rounded-lg font-semibold transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Continuar Comprando
                </button>
            </div>

            <!-- Security Badge -->
            <div class="flex items-center justify-center mt-4 text-sm text-gray-500">
                <i class="fas fa-shield-alt text-green-500 mr-2"></i>
                Compra 100% seguro y protegido
            </div>

        </div>
    </div>

</aside>