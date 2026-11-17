let valorRandomGerado = gerarNumRandom();
console.log(valorRandomGerado);

let body = document.querySelector("body");

let inputLoginPassword = document.getElementById("inputLoginPassword");
let eyeLoginPassword = document.getElementById("eyeLoginPassword");

inputLoginPassword.addEventListener("input", function () {
    if (inputLoginPassword.value.length == 0) {
        eyeLoginPassword.style.display = "none";
    } else {
        eyeLoginPassword.style.display = "block";
    }
});

eyeLoginPassword.addEventListener("click", function () {
    if (inputLoginPassword.type == "password") {
        eyeLoginPassword.src = "/../assets/images/icons/eye&invisible.svg";
        inputLoginPassword.type = "text";
    } else {
        eyeLoginPassword.src = "/../assets/images/icons/eye&visible.svg";
        inputLoginPassword.type = "password";
    }
});

let videoBg = document.getElementById("videoBg");

let audio = document.getElementById("audio");
let audioBtn = document.getElementById("audioBtn");
let imgAudioBtn = document.getElementById("imgAudioBtn");
let audioMessage = document.getElementById("audioMessage");

let timeoutMessage;

let bgDarkFah = document.getElementById("bgDarkFah");
let fah = document.getElementById("fah");

audio.volume = 1;

if (valorRandomGerado == 6) {
    audio.src = "/../assets/musics/audios/fah.mp3";
} else {
    audio.src = "/../assets/musics/Golden&Brown&X&Love&Story&-&Elliot&Sutton.mp3";
}
audio.load();

audioBtn.addEventListener("click", function () {
    if (audio.paused) {
        clearTimeout(timeoutMessage);

        body.style.backgroundImage = "";
        videoBg.style.display = "block";
        videoBg.play();

        if (valorRandomGerado == 6) {
            // imgAudioBtn.src = "/../assets/images/icons/pause.svg";

            audioMessage.style.display = "none";
            videoBg.style.display = "none";
            videoBg.pause();

            bgDarkFah.style.opacity = 1;
            bgDarkFah.style.visibility = "visible";
            bgDarkFah.style.pointerEvents = "auto";

            fah.style.opacity = 1;
            fah.style.visibility = "visible";
            fah.style.pointerEvents = "auto";

            setTimeout(() => {
                bgDarkFah.style.opacity = 0;
                bgDarkFah.style.visibility = "hidden";
                bgDarkFah.style.pointerEvents = "none";

                fah.style.opacity = 0;
                fah.style.visibility = "hidden";
                fah.style.pointerEvents = "none";

                imgAudioBtn.src = "/../assets/images/icons/play.svg";
            }, 2000);
        } 

        audio.play();
        imgAudioBtn.src = "/../assets/images/icons/pause.svg";
        audioMessage.style.opacity = 1;
        audioMessage.style.visibility = "visible";
        audioMessage.style.pointerEvents = "auto";

        // timeoutMessage = setTimeout(() => {
        //     audioMessage.style.opacity = 0;
        //     audioMessage.style.visibility = "hidden";
        //     audioMessage.style.pointerEvents = "none";
        // }, 7500);
    } else {
        videoBg.pause();
        audio.pause();
        imgAudioBtn.src = "/../assets/images/icons/play.svg";
        audioMessage.style.opacity = 0;
        audioMessage.style.visibility = "hidden";
        audioMessage.style.pointerEvents = "none";
    }
});

audio.addEventListener("ended", function () {
    imgAudioBtn.src = "/../assets/images/icons/play.svg";

    videoBg.pause();
})

let audioMessageImg = document.getElementById("audioMessageImg");
audioMessageImg.addEventListener("click", function () {
    if (audio.volume == 1) {
        audioMessageImg.src = "/../assets/images/icons/no&audio.svg";
        audio.volume = 0;
    } else {
        audioMessageImg.src = "/../assets/images/icons/audio.svg";
        audio.volume = 1;
    }
})

function gerarNumRandom() {
    return Math.floor(Math.random() * 10);
}