<!DOCTYPE html>
<html lang="ES-es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Perfil</title>
</head>
<body>
   <?php
      $test = isset($_GET['user']) ? $_GET['user'] : 'prueba';
      echo $test;
   ?>
</body>
</html>