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

let bgDarkUpdate = document.getElementById("bgDarkUpdate");
let formOracaoUpdate = document.getElementById("formOracaoUpdate");

function openUpdate(idUser, idOracao, title, body) {
    let idUserUpdate = document.getElementById("idUserUpdate");
    let idOracaoUpdate = document.getElementById("idOracaoUpdate");
    let titleOracaoUpdate = document.getElementById("inputTitleUpdate");
    let bodyOracaoUpdate = document.getElementById("inputOracaoUpdate");

    idUserUpdate.value = idUser;
    idOracaoUpdate.value = idOracao;
    titleOracaoUpdate.value = title;
    bodyOracaoUpdate.value = body;

    bgDarkUpdate.style.opacity = 1;
    bgDarkUpdate.style.visibility = 'visible';
    bgDarkUpdate.style.pointerEvents = 'auto';

    formOracaoUpdate.style.opacity = 1;
    formOracaoUpdate.style.visibility = 'visible';
    formOracaoUpdate.style.pointerEvents = 'auto';
}

function closeUpdate() {
    event.preventDefault();
    bgDarkUpdate.style.opacity = 0;
    bgDarkUpdate.style.visibility = 'hidden';
    bgDarkUpdate.style.pointerEvents = 'none';

    formOracaoUpdate.style.opacity = 0;
    formOracaoUpdate.style.visibility = 'hidden';
    formOracaoUpdate.style.pointerEvents = 'none';
}

// let filterOracao = document.getElementById("filterOracao") // form;
let filterOracaoInput = document.getElementById("filterOracaoInput");
let filterOracaoBtn = document.getElementById("filterOracaoBtn");
let clearFilter = document.getElementById("clearFilter");

// let isFilterOracaoBtnClicked = false;

// filterOracaoInput.addEventListener("input", function () {
//     if (filterOracaoInput.value.length == 0 && isFilterOracaoBtnClicked == false) {   
//         filterOracaoBtn.style.opacity = 0.6;  
//         filterOracaoBtn.style.pointerEvents = 'none'; 

//         isFilterOracaoBtnClicked = true;
        
//         clearFilter.style.opacity = 1;  
//         clearFilter.style.pointerEvents = 'auto';  
//     } else {
//         filterOracaoBtn.style.opacity = 1;  
//         filterOracaoBtn.style.pointerEvents = 'auto'; 

//         isFilterOracaoBtnClicked = false;
        
//         clearFilter.style.opacity = 0.6;  
//         clearFilter.style.pointerEvents = 'none';  
//     }
// });