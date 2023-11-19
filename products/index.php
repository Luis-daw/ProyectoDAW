<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Productos</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <link rel="stylesheet" href="./style.css">
</head>

<body class="row">
   <?php
   require_once('../assets/models/DaoProducts.php'); // Incluye el archivo DaoProducts.php
   $daoProducts = new DaoProducts("proyecto-daw");
   $daoProducts->toJson();
   ?>
   <aside class="col-lg-2 col-md-2" style="border: 1px solid black;">
      <?php
      $categories = $daoProducts->getCategories();
      echo "<select id='categoriesSelect'>";
      foreach ($categories as $id => $category) {
         echo "<option value='" . $id . "'>" . $category . "</option>";
      }
      echo "</select>";
      ?>
      
   </aside>
   <main id="productContainer" class="col-lg-10 col-md-10 col-sm-12 row">

   </main>

   <?php

   echo '<script src="../js/productApp.js" type="module"></script>';
   ?>
</body>

</html>