<?php require(__DIR__ . "/view/common/header.php"); ?>
<div class="flex flex-col  gap-4">
    <form id="form-checkout">
        <div>
            <label for="payerPhone">Phone Number</label>
            <input id="form-checkout__payerPhone" name="payerPhone" type="text" />
        </div>
        <div>
            <label for="payerOTP">OTP</label>
            <input id="form-checkout__payerOTP" name="payerOTP" type="text" />
        </div>
        <div>
            <button onclick="handleYape(event)">Create YAPE</button>
        </div>
    </form>

</div>


<?php require(__DIR__ . "/view/common/footer.php"); ?>

<script>
    const mp = new MercadoPago("TEST-57647ea1-a49d-42f9-9358-0023b9ef4233", {
        locale: "es-PE"
    });

    async function handleYape(event) {
        event.preventDefault();
        const otp = document.getElementById("form-checkout__payerOTP").value;
        const phoneNumber = document.getElementById("form-checkout__payerPhone").value;
        // Mostrar valores en consola
        console.log("OTP:", otp);
        console.log("Phone Number:", phoneNumber);
        try {
            const yapeOptions = {
                otp: otp,
                phoneNumber: phoneNumber
            };
            
            const yape = mp.yape(yapeOptions);
            const yapeToken = await yape.create();
            console.log("✅ Token Yape generado:", yapeToken.id);

            // Aquí puedes enviarlo al backend
            const response = await fetch('crear_yape_token.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    token: yapeToken.id
                })
            });
            console.log("🧾 Raw response:", response);
            const result = await response.json();
            console.log("💰 Resultado del pago:", result);

        } catch (error) {
            console.error("❌ Error al generar token Yape:", error);
        }
    }
</script>