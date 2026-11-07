<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login | Sistema - MVC</title>
    <link rel="stylesheet" href="/../assets/styles/style.css">
</head>
<body>
    <h1 class="title">Sistema - MVC</h1>

    <?php if(isset($erro)): ?>
        <p style="color: red; margin-bottom: 10px;">
            <?php echo htmlspecialchars($erro); ?>
        </p>
    <?php endif; ?>

    <form action="index.php?action=autenticar" method="POST" class="form-login">
        <h1>Acesse sua conta</h1>

        <div class="p-login" style="margin-top: 80px;">
            <label>E-mail</label>
            <input type="email" name="email">
        </div>

        <div class="p-login senha-login">
            <label>Senha</label>
            <div class="senha-box-input">
                <input type="password" name="senha" id="senhaLogin">
                <img src="/../assets/images/olho-aberto.svg" alt="olho-aberto.svg" class="olho-login" id="olhoBtn">
            </div>
        </div>

        <p>
            <button type="submit">Entrar</button>
        </p>
    </form>

    <script>
        let senhaLoginInput = document.getElementById("senhaLogin");
        let olhoBtn = document.getElementById("olhoBtn");

        senhaLoginInput.addEventListener('input', function () {
            if (senhaLoginInput.value.length == 0) {
                olhoBtn.style.display = 'none';
            } else {
                olhoBtn.style.display = 'block';
            }
        });

        olhoBtn.addEventListener('click', function () {
            if (senhaLoginInput.type == "password") {
                senhaLoginInput.type = 'text';
                olhoBtn.src = '/../assets/images/olho-fechado.svg';
                olhoBtn.alt = 'olho-fechado.svg';
            } else {
                senhaLoginInput.type = 'password';
                olhoBtn.src = '/../assets/images/olho-aberto.svg';
                olhoBtn.alt = 'olho-aberto.svg';
            }
        });
    </script>

</body>
</html>