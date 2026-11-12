<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MyPrayers</title>
    <link rel="stylesheet" href="/../assets/styles/style.css">
</head>
<body>
    <div class="bg-dark-blue"></div>


    <form action="index.php?action=autenticar" method="POST" class="form-login">
        <h2 class="my-prayers-title-login">MyPrayers</h2>
        <h1>LOGIN</h1>

        <div class="input-container">
            <div class="input-box">
                <label>E-mail</label>
                <input type="email" name="email" placeholder="Insira seu e-mail... Ex.: joao@gmail.com">
            </div>

            <div class="input-box">
                <label>Senha</label>
                <div class="password-box">
                    <input type="password" name="password" placeholder="Insira sua senha... Ex.: 12aB@.87">
                    <img src="/../assets/images/icons/eye&visible.svg" alt="eye&visible.svg" class="eye-login">
                </div>
            </div>
        </div>

        <button type="submit">Entrar</button>
    </form>

    <script src="/../assets/scripts/script.js"></script>

</body>
</html>