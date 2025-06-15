<?php require(__DIR__ . "/../view/common/header.php"); ?>
<div class="bg-white p-8 rounded-2xl shadow-xl text-center max-w-md">
    <div class="bg-white rounded-2xl shadow-xl p-8 max-w-md text-center space-y-6 border border-yellow-300">
        <!-- Icono -->
        <div class="flex justify-center">
            <svg class="w-16 h-16 text-yellow-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>

        <!-- Mensaje -->
        <h2 class="text-2xl font-semibold text-yellow-700">¡Tu pago está pendiente!</h2>
        <p class="text-gray-600">Estamos procesando tu pago. Esto puede tomar unos minutos, dependiendo del medio de pago.</p>

        <!-- Consejos -->
        <div class="text-left bg-yellow-100 p-4 rounded-md text-sm text-yellow-700">
            <p class="font-medium mb-2">¿Qué hacer ahora?</p>
            <ul class="list-disc list-inside space-y-1">
                <li>Revisa tu correo para verificar el estado del pago.</li>
                <li>Guarda el comprobante si usaste pago en efectivo o transferencia.</li>
                <li>Te notificaremos apenas se confirme.</li>
            </ul>
        </div>

        <!-- Acciones -->
        <div class="space-y-2">
            <a href="/" class="inline-block bg-yellow-500 text-white px-6 py-2 rounded-lg hover:bg-yellow-600 transition">Volver al inicio</a>
        </div>
    </div>
</div>
<?php require(__DIR__ . "/../view/common/footer.php"); ?>