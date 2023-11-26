<!DOCTYPE html>
<html lang="ES-es">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Indice</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
   <?php
      session_start();
      require_once './nav.php';
      generateNav();
   ?>
   
   <footer class="row container w-100 bg-primary ps-4 pt-2" data-bs-theme="dark">
      <div class="col-lg-4 col-md-6">
         <div class="row">Sobre nosotros</div>
         <div class="row">Política de privacidad</div>
         <div class="row">Política de cookies</div>
         <div class="row">Aviso legal</div>
         <div class="row">Información sobre compras</div>
      </div>
      <div class="col-lg-4 col-md-6">
         <div class="row">Contacto</div>
         <div class="row">
            <div class="col-3">insta</div>
            <div class="col-3">twitt</div>
            <div class="col-3">faceb</div>
            <div class="col-3">email</div>
         </div>
      </div>
      <div class="col-lg-4 col-md-6">
         <p class="copyright">Todos los derechos reservados</p>
      </div>
   </footer>   
</body>

</html>