<?php 

?>


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
    <?php require(__DIR__."/../common/header.php") ;?>
    <main class="min-h-screen flex items-center justify-center">
        <?php require_once(__DIR__.$view); ?>
    </main>
    <?php require(__DIR__."/../common/footer.php"); ?>
    

</body>

</html>