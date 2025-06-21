<?php require(__DIR__ . "/../common/header.php"); ?>

<section class="min-h-screen flex items-center justify-center  px-4">
    <div class="bg-white shadow-2xl rounded-3xl p-10 md:p-16 max-w-3xl w-full text-center border border-gray-200">

        <div class="mx-auto mb-8 w-24 h-24 flex items-center justify-center rounded-full bg-indigo-100">
            <svg class="w-12 h-12 text-indigo-600 animate-pulse" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01M12 19c3.866 0 7-3.134 7-7S15.866 5 12 5 5 8.134 5 12s3.134 7 7 7z" />
            </svg>
        </div>

        <h1 class="text-6xl font-extrabold text-gray-800 mb-4 tracking-tight">404</h1>
        <p class="text-2xl text-gray-700 font-semibold mb-2">Página no encontrada</p>
        <p class="text-gray-500 mb-8 leading-relaxed">Lo sentimos, no pudimos encontrar la página que estás buscando. Puede haber sido eliminada o el enlace es incorrecto.</p>

        <div class="flex justify-center gap-4">
            <a href="/" class="inline-flex items-center justify-center px-6 py-3 text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg font-medium shadow transition">
                Volver al inicio
            </a>
        </div>
    </div>
</section>



<?php require(__DIR__ . "/../common/footer.php"); ?>