(function (){
   let form = document.getElementById("formRegister");
   let password = document.getElementById("pass");
   let passverif = document.getElementById("passverif");
   form.addEventListener("submit", (event) => {
      event.preventDefault();
      if (password.value === passverif.value){
         console.log("Se envia");
         event.submitter
      }
   })
})()