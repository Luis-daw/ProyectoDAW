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
   if (isset($_GET['cerrar'])){
      $_SESSION['user']['name'] = null;
      $_SESSION['user']['permissions'] = 0;
   }
   generateNav();
   ?>

   <main class="mt-4 pt-4">
      <h3 class="mt-4 pt-4 text-center">Bienvenido a InfotechTrade consulta nuestra política de privacidad y compras <a href="./politicas">aquí</a></h3>
   </main>
</body>

</html>