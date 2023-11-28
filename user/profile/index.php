<!DOCTYPE html>
<html lang="ES-es">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Perfil</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <link rel="stylesheet" href="../../css/styles.css">
   <link rel="stylesheet" href="./styles.css">

</head>

<body>
   <?php
   session_start();
   require_once "../../nav.php";
   require_once "../../assets/models/DaoProducts.php";
   $user = isset($_GET['user']) ? $_GET['user'] : false;
   if (!$user) {
      $user = isset($_SESSION['user']['name']) ? $_SESSION['user']['name'] : false;
   }
   if (!$user) {
      header("Location: ../../");
      exit();
   }
   generateNav();
   $daoProducts = new DaoProducts('proyecto-daw');
   $products = $daoProducts->getUsersProducts($user);
   ?>
   <h3 class="ps-2"><?= $user ?></h3>
   <h4 class="ps-2 mt-4">Productos comprados recientemente</h4>
   <div class="row ps-4">

   <?php foreach ($products as $product) : ?>
      <article class="col-xl-2 col-lg-2 col-md-4 ps-1 product">
      <h3><?= $product['name'] ?></h3>
      <div class='img-prod'>
         <img src="data:image/jpeg;base64,<?= $product['image'] ?>" alt="Imagen de <?= $product['name'] ?>">
      </div>
      <p class="text-end"><?= $product['price'] ?></p>
      </article>
   <?php endforeach; ?>
   </div>

</body>

</html>