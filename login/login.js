(function(){
   let password = document.getElementById("password");
   let lookPassword = document.getElementById("lookPassword");
   lookPassword.addEventListener("click",function (event){
      if(!this.classList.contains("fa-eye-slash")){
         this.classList.remove("fa-eye");
         this.classList.add("fa-eye-slash");
         password.type = "text";
      }
      else{
         this.classList.add("fa-eye");
         this.classList.remove("fa-eye-slash");
         password.type = "password";
      }
   });
})()