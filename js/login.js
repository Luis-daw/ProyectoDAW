//Recogemos las etiquetas del DOM que vamos a usar.
let formLogin = document.getElementById("formLogin");
let btnPassword = document.getElementById("lookPassword");
let textPassword = document.getElementById("pass");

//Variable para cambiar la visualizacion del campo password.
let ver = false;

btnPassword.addEventListener("click", function () {
    if (ver) {
        ver = false;
        textPassword.type = "password";
    } else {
        ver = true;
        textPassword.type = "text";
    }
});

formLogin.addEventListener("submit", function (event) {
    if (event.submitter.id !== "enviar") {
        event.preventDefault();
    }
});
