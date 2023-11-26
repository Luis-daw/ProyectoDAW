<!DOCTYPE html>
<html lang="ES-es">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Perfil</title>   
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <link rel="stylesheet" href="../../css/styles.css">

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
   
   $products;
   
   ?>
</body>

</html>