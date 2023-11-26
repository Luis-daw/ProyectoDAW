<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Producto</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <link rel="stylesheet" href="../../css/styles.css">
</head>

<body>
   <?php
   session_start();
   require_once("../../assets/models/DaoProducts.php");
   require_once("../../nav.php");
   $userPermissions = isset($_SESSION['user']['permissions']) ? $_SESSION['user']['permissions'] : false;

   if (isset($_GET['comprar'])) {
      $daoProducts = new DaoProducts('proyecto-daw');
      $daoProducts->changeProductStatus($_GET['comprar'], "buyed");
      $daoProducts->buyProduct($_GET['comprar'], $_SESSION['user']['name']);
   }
   if (isset($_GET['permitir'])) {
      $daoProducts = new DaoProducts('proyecto-daw');
      $daoProducts->changeProductStatus($_GET['comprar'], "enabled");
   }
   if (isset($_GET['eliminar'])) {
      $daoProducts = new DaoProducts('proyecto-daw');
      $daoProducts->eliminateProduct($_GET['eliminar']);
   }
   if (!$userPermissions) {
      header("Location: ../../login");
      exit();
   }
   $productName = isset($_GET['product']) ? $_GET['product'] : false;
   if (!$productName) {
      // header("Location: ../");
      // exit();
   }
   $daoProducts = new DaoProducts('proyecto-daw');
   $product = $daoProducts->getProductName($productName);
   $canBuy = isset($_GET['canBuy']) ? false : true;


   generateNav();

   function buyProduct($product)
   {
   ?>
      <a href="./?comprar=<?= $product ?>">
         <input type="button" value="Comprar" class="button mb-4">
      </a>
      <br>
   <?php
   }
   function allowProduct($product)
   {
   ?>
      <a href="./?permitir=<?= $product ?>">
         <input type="button" value="Permitir venta" class="button mb-4">
      </a>
      <br>
   <?php
   }
   function deleteProduct($product)
   {
   ?>
      <a href="./?eliminar=<?= $product ?>">
         <input type="button" value="Eliminar" class="button mb-4">
      </a>
      <br>
   <?php
   }
   ?>
   <main>
      <div class="row">
         <div class="col-md-4 ms-4">
            <h3><?= $productName ?></h3>
            <img src="data:image/jpeg;base64,<?= $product->image ?>" alt="Imagen de <?= $productName ?>" class="col-md-6">
         </div>
         <div class="col-md-4">
            <h3 class="row"><?= $product->price ?>€</h3>
            <h5 class="row"><?= $product->description ?></h5>
         </div>
         <div class="col-md-3 pt-3">
            <?php
            if (isset($_GET['allow'])) {
               allowProduct($product->id);
            } else {
               buyProduct($product->id);
            }
            if ($_SESSION['user']['permissions'] >= 4) {
               deleteProduct($product->id);
            }
            ?>
         </div>
      </div>



   </main>
</body>

</html>