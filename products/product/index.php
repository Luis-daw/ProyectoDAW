<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Producto</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
   <?php
   session_start();
   require_once("../../assets/models/DaoProducts.php");
   require_once("../../nav.php");
   $userPermissions = isset($_SESSION['user']['permissions']) ? $_SESSION['user']['permissions'] : false;
   if (!$userPermissions) {
      header("Location: ../../login");
      exit();
   }
   $productName = isset($_GET['product']) ? $_GET['product'] : false;
   if (!$productName) {
      header("Location: ../");
      exit();
   }
   $daoProducts = new DaoProducts('proyecto-daw');
   $product = $daoProducts->getProductName($productName);
   $canBuy = isset($_GET['canBuy']) ? false : true;


   generateNav();

   function buyProduct()
   {
   ?>
      <form action="" method="post">
         <input type="submit" value="Comprar">
      </form>
   <?php
   }
   function allowProduct()
   {
   ?>
      <form action="" method="post">
         <input type="submit" value="Permitir producto">
      </form>
   <?php
   }
   function deleteProduct()
   {
   ?>
      <form action="" method="post">
         <input type="submit" value="Eliminar">
      </form>
   <?php
   }
   ?>
   <main>
      <div class="row">
         <div class="col-md-5">
            <h3><?= $productName ?></h3>
            <img src="data:image/jpeg;base64,<?= $product->image ?>" alt="Imagen de <?= $productName ?>" class="col-md-6">
         </div>
         <div class="col-md-4">
            <h3 class="row"><?= $product->price ?>€</h3>
            <h5 class="row"><?= $product->description ?></h5>
         </div>
         <div class="col-md-3">
            <form action="" method="post">
               <input type="submit" value="Comprar">
            </form>
         </div>
      </div>



   </main>
</body>

</html>