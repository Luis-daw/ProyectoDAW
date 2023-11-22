<!DOCTYPE html>
<html lang="ES-es">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Perfil</title>
</head>

<body>
   <?php
   session_start();
   $user = isset($_GET['user']) ? $_GET['user'] : false;
   if (!$user) {
      $user = isset($_SESSION['user']['name']) ? $_SESSION['user']['name'] : false;
   }
   if (!$user) {
      header("Location: ../../");
      exit();
   }
   
   ?>
</body>

</html>