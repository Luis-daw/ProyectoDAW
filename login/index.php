<!DOCTYPE html>
<html lang="ES-es">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link rel="stylesheet" href="../css/styles.css">
   <link rel="stylesheet" href="./login.css">
</head>

<body data-bs-theme="">
   <?php
   session_start();
   require_once "../assets/models/DaoUsers.php";
   $username ="";
   $login = null;
   if (isset($_POST['username']) && isset($_POST['password'])){
      $username = $_POST['username'];
      $password = $_POST['password'];
      $daoUsers = new DaoUsers("proyecto-daw");
      $login = $daoUsers->login($username,$password);
      if ($login){
         //Añadir aqui lo de los permisos, puedo modificar lo del login para sacarlos
         $_SESSION['user']['name'] = $username;
         $_SESSION['user']['permissions'] = $daoUsers->permissions($username); 
         header("Location: ../"); 
         exit();
      }
   } 
   ?>
   <div class="form">
      <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post" id="formLogin">
      <div class="row">
         <?php 
         if ($login === false){
            echo "<p class='main-color'> Usuario o contraseña mal introducidos </p>";
         }
         ?>
      </div>
      <div class="mb-3">
        <label for="username" class="visually-hidden">Nombre de usuario</label>
        <input type="text" name="username" id="username" minlength="4" class="form-control me-2" value="<?php echo $username ?>" required placeholder="Nombre de usuario">
      </div>
      <div class="mb-3">
        <input type="password" name="password" id="password" minlength="8" class="form-control me-2" required placeholder="Contraseña">
        <i class="fa-solid fa-eye position-absolute end-0 translate-middle-y" id="lookPassword"></i>
      </div>
         <div class="row">
            <input type="submit" value="Enviar" name="enviar" class="button">
         </div>

      </form>
      <a href="../register"> Registrarse </a>
   </div>

   <script src="https://kit.fontawesome.com/1ab15ceac4.js" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

   <script src="./login.js"></script>
</body>

</html>