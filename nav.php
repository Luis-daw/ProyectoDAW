<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Pruebas</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
   <?php
   // Función que nos genera la barra de navegación en todo el proyecto.
   function generateNav()
   {
      if (session_status() == PHP_SESSION_NONE) {
         // Solo inicia la sesión si no ha sido iniciada aún
         session_start();
      }
      $permissions = isset($_SESSION['user']['permissions']) ? $_SESSION['user']['permissions'] : 0;
      $host = $_SERVER['HTTP_HOST'];
      $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
      $base_url = $protocol . $host . "/proyectodaw/";
   ?>
      <nav class="navbar navbar-expand-md" id="navBar">
         <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo $base_url ?>">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 40" width="145" height="40">
                  <text x="2" y="30" font-family="Arial" font-size="20" fill="white">InfotechTrade</text>
               </svg>

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMain">
               <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                     <a class="nav-link" href="<?php echo $base_url . "products" ?>">Nuestros productos</a>
                  </li>
                  <?php
                  if ($permissions >= 4) {
                  ?>
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                           Administración
                        </a>
                        <ul class="dropdown-menu">
                           <li><a class="dropdown-item" href="<?php echo $base_url . "admin/users" ?>">Gestionar usuarios</a></li>
                           <li><a class="dropdown-item" href="<?php echo $base_url . "admin/products" ?>">Gestionar productos</a></li>
                        </ul>
                     </li>

                  <?php
                  }
                  ?>
               </ul>
               <ul class="navbar-nav mb-2 mb-lg-0 me-4 ms-auto">
                  <?php
                  if ($permissions == 0) {
                     echo ' <li class="nav-item">
                     <a class="nav-link" href="' . $base_url . "login" . '">Iniciar sesión</a>
                  </li>';
                  } else {
                     echo '<li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Usuario
                     </a>
                     <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="' . $base_url . "user/profile" . '">Perfil</a></li>';
                     if ($permissions >= 2) {
                        echo '<li><a class="dropdown-item" href="' . $base_url . "products/addproduct" . '">Añadir producto</a></li>';
                     }
                     echo '<li><a class="dropdown-item" href="' . $base_url . "?cerrar=true" . '">Cerrar sesión</a></li>';
                  }
                  ?>
               </ul>
            </div>
         </div>
      </nav>
   <?php
   }
   ?>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>