<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WAKAMY EVENTOS</title>
    <!-- TAILWIND CDN --->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- FONT AWESONE ICONOS -->
    <script src="https://kit.fontawesome.com/2e25975fef.js" crossorigin="anonymous"></script>
    <!--  MERCAQDO PAGO SDK    -->
    <script src="https://sdk.mercadopago.com/js/v2"></script>
</head>

<body>

    <!-- Header -->
    <header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-50">
        <!-- Main header -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 lg:h-20">
                <!-- Mobile menu button -->
                <button id="mobile-menu-btn" class="cursor-pointer md:hidden p-2 rounded-md text-gray-700 hover:text-gray-900 hover:bg-gray-100 transition-colors">
                    <i id="menu-icon" class="fas fa-bars text-xl"></i>
                </button>

                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="/" class="flex items-center">
                        <h1 class="text-2xl lg:text-3xl font-bold text-gray-900">
                            <i class="fas fa-tshirt mr-2 text-blue-600"></i>
                            Wakamy<span class="text-blue-600">Events</span>
                        </h1>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex space-x-8 ml-12">
                    <a href="#" class="text-gray-700 hover:text-gray-900 font-medium transition-colors relative group">
                        <i class="fas fa-female mr-2"></i>Mujer
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-blue-600 transition-all group-hover:w-full"></span>
                    </a>
                    <a href="#" class="text-gray-700 hover:text-gray-900 font-medium transition-colors relative group">
                        <i class="fas fa-male mr-2"></i>Hombre
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-blue-600 transition-all group-hover:w-full"></span>
                    </a>
                    <a href="#" class="text-gray-700 hover:text-gray-900 font-medium transition-colors relative group">
                        <i class="fas fa-child mr-2"></i>Niños
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-blue-600 transition-all group-hover:w-full"></span>
                    </a>
                    <a href="#" class="text-gray-700 hover:text-gray-900 font-medium transition-colors relative group">
                        <i class="fas fa-gem mr-2"></i>Accesorios
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-blue-600 transition-all group-hover:w-full"></span>
                    </a>
                    <a href="#" class="text-red-600 hover:text-red-700 font-medium transition-colors relative group">
                        <i class="fas fa-fire mr-2"></i>Ofertas
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-red-600 transition-all group-hover:w-full"></span>
                    </a>
                </nav>

                <!-- Search bar - Desktop -->
                <div class="hidden lg:flex flex-1 max-w-md mx-8">
                    <div class="relative w-full">
                        <input
                            type="text"
                            placeholder="Buscar productos..."
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                        <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>

                <!-- Right side icons -->
                <div class="flex items-center space-x-4">
                    <!-- Search button - Mobile -->
                    <button id="mobile-search-btn" class="cursor-pointer lg:hidden p-2 text-gray-700 hover:text-gray-900 hover:bg-gray-100 rounded-full transition-colors">
                        <i class="fas fa-search text-lg"></i>
                    </button>

                    <!-- User account -->
                    <a href="#" class="p-2 text-gray-700 hover:text-gray-900 hover:bg-gray-100 rounded-full transition-colors">
                        <i class="fas fa-user text-lg"></i>
                    </a>

                    <!-- Wishlist 
                    <a href="#" class="p-2 text-gray-700 hover:text-gray-900 hover:bg-gray-100 rounded-full transition-colors relative">
                        <i class="fas fa-heart text-lg"></i>
                        <span class="absolute -top-1 -right-1 h-4 w-4 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">
                            3
                        </span>
                    </a> -->

                    <!-- Shopping cart -->
                    <button onclick="showCart()" class="p-2 text-gray-700 hover:text-gray-900 hover:bg-gray-100 rounded-full transition-colors relative">
                        <i class="fas fa-shopping-bag text-lg"></i>
                        <span class="absolute -top-1 -right-1 h-4 w-4 bg-blue-600 text-white text-xs rounded-full flex items-center justify-center">
                            <div id="cart-count" class="bg-red-500 text-white px-2 rounded-full">0</div>
                        </span>
                    </button>
                </div>
            </div>

            <!-- Mobile search bar -->
            <div id="mobile-search" class="lg:hidden pb-4 hidden">
                <div class="relative">
                    <input
                        type="text"
                        placeholder="Buscar productos..."
                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
            </div>
        </div>

        <!-- Aside Carrito -->
        <aside id="cart-aside" class="fixed right-0 top-0 w-80 h-full bg-white shadow-lg p-4 overflow-y-auto z-50 hidden">
            <div class="flex justify-between w-full cursor-pointer">
                <h2 class="text-xl font-bold mb-4">🛒 Carrito</h2>
                <button onclick="closeCart()">x</button>
            </div>    
            <div id="cart-items" class="space-y-4"></div>
            
        </aside>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="md:hidden border-t border-gray-200 bg-white hidden">
            <div class="px-4 py-6 space-y-4">
                <a href="#" class="block text-lg font-medium text-gray-900 hover:text-blue-600 transition-colors">
                    <i class="fas fa-female mr-3 w-5"></i>Mujer
                </a>
                <a href="#" class="block text-lg font-medium text-gray-900 hover:text-blue-600 transition-colors">
                    <i class="fas fa-male mr-3 w-5"></i>Hombre
                </a>
                <a href="#" class="block text-lg font-medium text-gray-900 hover:text-blue-600 transition-colors">
                    <i class="fas fa-child mr-3 w-5"></i>Niños
                </a>
                <a href="#" class="block text-lg font-medium text-gray-900 hover:text-blue-600 transition-colors">
                    <i class="fas fa-gem mr-3 w-5"></i>Accesorios
                </a>
                <a href="#" class="block text-lg font-medium text-red-600 hover:text-red-700 transition-colors">
                    <i class="fas fa-fire mr-3 w-5"></i>Ofertas
                </a>
                <div class="pt-4 border-t border-gray-200 space-y-2">
                    <a href="#" class="block text-gray-600 hover:text-gray-900 transition-colors">
                        <i class="fas fa-question-circle mr-3 w-5"></i>Ayuda
                    </a>
                    <a href="#" class="block text-gray-600 hover:text-gray-900 transition-colors">
                        <i class="fas fa-phone mr-3 w-5"></i>Contacto
                    </a>
                    <a href="#" class="block text-gray-600 hover:text-gray-900 transition-colors">
                        <i class="fas fa-map-marker-alt mr-3 w-5"></i>Seguimiento
                    </a>
                </div>
            </div>
        </div>

    </header>
    <main class="min-h-screen flex items-center justify-center">