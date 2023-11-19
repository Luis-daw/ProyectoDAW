<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Añadir producto</title>
</head>

<body>
   <?php
   require_once("../../assets/models/DaoProducts.php");
   session_start();
   if (isset($_SESSION['user']['permissions']) && $_SESSION['user']['permissions'] <= 1) {
      header("Location: ../../");
      exit;
   }
   if (isset($_POST['name']) && isset($_POST['price'])) {
      $name = $_POST['name'];
      $price = $_POST['price'];
      $daoProducts = new DaoProducts("proyecto-daw");

      $image = isset($_POST['image']) ? $_POST['image'] : null;
      $daoProducts->addProduct($daoProducts->createProduct($name, $_SESSION['user']['name'], $price, $image));

      // header("Location: ../../"); 
      // exit();
   }

   ?>
   <main class="form-container row">

      <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post" id="formAddProduct">
         <input type="text" name="name" id="name">
         <input type="number" name="price" id="price" min="0">
         <input type="file" name="image" id="image">
         <input type="submit" value="Enviar">
      </form>
   </main>
</body>

</html>