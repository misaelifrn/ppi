<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MyPrayers</title>
    <link rel="stylesheet" href="/../assets/styles/style.css">
</head>
<body>
    <div class="bg-dark"></div>

    <audio src="/assets/musics/Golden&Brown&X&Love&Story&-&Elliot&Sutton.mp3" autoplay id="audio"></audio> <!-- loop -->
    <button class="audio-btn" id="audioBtn"><img src="/../assets/images/icons/play.svg" alt="play.svg" id="imgAudioBtn"></button>
    <p class="audio-message" id="audioMessage"><img src="/../assets/images/icons/audio.svg" alt="audio.svg" class="audio-message-img"> Você está tocando <b>"Golden Brown x Love Story"</b>, de Ellito Sutton.</p>

    <video src="/../assets/images/videos/video&background.mp4" autoplay muted class="video-bg" id="videoBg"></video>

    <div class="bg-dark-fah" id="bgDarkFah"></div>
    <img src="/../assets/images/fah.jpeg" alt="fah.jpeg" class="fah-img" id="fah">

    <form action="index.php?action=authenticate" method="POST" class="form-login">
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
                    <input type="password" name="password" id="inputLoginPassword" placeholder="Insira sua senha... Ex.: 12aB@.87">
                    <img src="/../assets/images/icons/eye&visible.svg" alt="eye&visible.svg" class="eye-login" id="eyeLoginPassword">
                </div>
            </div>

            <p class="not-cadastro">Não possui cadastrado? <a href="#">Cadastrar</a>.</p>
        </div>

        <button type="submit">Entrar</button>
    </form>

    <footer>4° Bimestre - PPI Project</footer>

    <script src="/../assets/scripts/script.js"></script>

</body>
</html>