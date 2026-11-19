let logoutBtn = document.getElementById("logoutBtn");

logoutBtn.addEventListener("click", function () {
    if (confirm("Você deseja realmente sair?")) {
        logoutBtn.href = "/index?action=logout";
    } else {
        logoutBtn.href = "";
    }
});

let addOracaoBtn = document.getElementById("addOracaoBtn");
let bgDark = document.getElementById("bgDark");
let formOracao = document.getElementById("formOracao");

let cancelarAddOracao = document.getElementById("cancelarAddOracao");

addOracaoBtn.addEventListener("click", function () {
    bgDark.classList.add("visible");
    formOracao.classList.add("visible");
});

cancelarAddOracao.addEventListener("click", function (event) {
    event.preventDefault();
    bgDark.classList.remove("visible");
    formOracao.classList.remove("visible");
});