let logoutBtn = document.getElementById("logoutBtn");

logoutBtn.addEventListener("click", function (event) {
    if (confirm("Você deseja realmente sair?")) {
        logoutBtn.href = "/index?action=logout";
    } else {
        event.preventDefault();
        logoutBtn.href = "";
    }
});

let filterUserInput = document.getElementById("filterUserInput");
let filterUserBtn = document.getElementById("filterUserBtn");
function filtrarUsers() {
    if (filterUserInput.value.length == 0) {   
        filterUserBtn.style.opacity = 0.6;  
        filterUserBtn.style.pointerEvents = 'none'; 
        
    } else {
        filterUserBtn.style.opacity = 1;  
        filterUserBtn.style.pointerEvents = 'auto'; 
    }
}

if (filterUserInput && filterUserBtn) {
    filterUserInput.addEventListener("input", filtrarUsers);
    filtrarUsers();
}

let date = new Date();

let bodyAdmin = document.getElementById("bodyAdmin");
if (bodyAdmin) {
    bodyAdmin.style.backgroundPosition = "center center";

    if (date.getHours() >= 5 && date.getHours() < 16) {
        bodyAdmin.style.backgroundImage = "url('/../assets/images/templario/templario&bg&admin&morning.png')";
    } else {
        bodyAdmin.style.backgroundImage = "url('/../assets/images/templario/templario&bg&admin&afternoon.png')";
    }

}

let clockHour = document.getElementById("clockHour");
let clockMinutes = document.getElementById("clockMinutes");

function atualizarHorario() {
    let date = new Date();

    clockHour.textContent = String(date.getHours()).padStart(2, "0");
    clockMinutes.textContent = String(date.getMinutes()).padStart(2, "0");
    // manter os dois digitos
}

atualizarHorario();

setInterval(atualizarHorario, 1000);

let addUserAdmin = document.getElementById("addUserAdmin");
let bgDarkAdmin = document.getElementById("bgDarkAdmin");
let formRegisterAdmin = document.getElementById("formRegisterAdmin");

let noAddUserAdmin = document.getElementById("noAddUserAdmin");

addUserAdmin.addEventListener("click", function () {
    bgDarkAdmin.classList.add("visible");
    formRegisterAdmin.classList.add("visible");
});

noAddUserAdmin.addEventListener("click", function (event) {
    event.preventDefault();
    bgDarkAdmin.classList.remove("visible");
    formRegisterAdmin.classList.remove("visible");
});

let inputAddUserPassword = document.getElementById("inputAddUserPassword");
let eyeAddUserPassword = document.getElementById("eyeAddUserPassword");

inputAddUserPassword.addEventListener("input", function () {
    if (inputAddUserPassword.value.length == 0) {
        eyeAddUserPassword.style.display = "none";
    } else {
        eyeAddUserPassword.style.display = "block";
    }
});

eyeAddUserPassword.addEventListener("click", function () {
    if (inputAddUserPassword.type == "password") {
        eyeAddUserPassword.src = "/../assets/images/icons/eye&invisible.svg";
        inputAddUserPassword.type = "text";
    } else {
        eyeAddUserPassword.src = "/../assets/images/icons/eye&visible.svg";
        inputAddUserPassword.type = "password";
    }
});

let formAdminUpdate = document.getElementById("formAdminUpdate");

function openUpdateAdmin(idUser, name, email) {
    let idUserUpdateAdmin = document.getElementById("idUserUpdateAdmin");
    let nameUpdateAdmin = document.getElementById("nameUpdateAdmin");
    let emailUpdateAdmin = document.getElementById("emailUpdateAdmin");

    idUserUpdateAdmin.value = idUser;
    nameUpdateAdmin.value = name;
    emailUpdateAdmin.value = email;

    bgDarkAdmin.classList.add("visible");
    formAdminUpdate.classList.add("visible");

//     bgDarkAdmin.style.opacity = 1;
//     bgDarkAdmin.style.visibility = 'visible';
//     bgDarkAdmin.style.pointerEvents = 'auto';

//     formAdminUpdate.style.opacity = 1;
//     formAdminUpdate.style.visibility = 'visible';
//     formAdminUpdate.style.pointerEvents = 'auto';
}

function closeUpdateAdmin() {
    event.preventDefault();
    bgDarkAdmin.classList.remove("visible");
    formAdminUpdate.classList.remove("visible");
    // bgDarkAdmin.style.opacity = 0;
    // bgDarkAdmin.style.visibility = 'hidden';
    // bgDarkAdmin.style.pointerEvents = 'none';

    // formAdminUpdate.style.opacity = 0;
    // formAdminUpdate.style.visibility = 'hidden';
    // formAdminUpdate.style.pointerEvents = 'none';
}