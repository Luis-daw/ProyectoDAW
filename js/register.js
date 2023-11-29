//Importamos el objeto de los tipos de password
import inputType from "./inputTypes.js";
//Recogemos las etiquetas del DOM que vamos a usar.
let formRegister = document.getElementById("formRegister");
let campoPass = document.getElementById("pass");
let campoPassVerif = document.getElementById("passverif");
let passMessage = document.getElementById("passMessage");

formRegister.addEventListener("submit", function (event) {
   event.preventDefault();
   if (campoPass.value.localeCompare(campoPassVerif.value) == 0){
      this.submit();
   }  
});