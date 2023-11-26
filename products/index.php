<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Productos</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <link rel="stylesheet" href="../css/styles.css">
   <link rel="stylesheet" href="./styles.css">
</head>

<body class="">
   <?php
   require_once('../assets/models/DaoProducts.php'); // Incluye el archivo DaoProducts.php
   require_once('../nav.php');
   $daoProducts = new DaoProducts("proyecto-daw");
   $daoProducts->toJson();
   generateNav();
   ?>
   <aside class="ms-2 col-lg-3 col-md-4 col-sm-4 row me-3 mt-2">
      <?php
      $categories = $daoProducts->getCategories();
      echo "<label for='categoriesSelect' class='form-label'><strong>Categoría</strong></label>";
      echo "<select id='categoriesSelect' class='col-12 form-control'>";
      echo "<option value=''> </option>";
      foreach ($categories as $id => $category) {
         echo "<option value='" . $id . "'>" . $category . "</option>";
      }
      echo "</select>";
      ?>
      <strong class="pt-1">Precio </strong>
      <div class="row"></div>
      <input type="number" name="min" id="min" min="0" class="col-6 form-control mt-1" placeholder="Min">
      <input type="number" name="max" id="max" min="0" class="col-6 form-control mt-4" placeholder="Máx">
      <button id="filter" class="button mt-4">Filtrar</button>
   </aside>
   <main id="productContainer" class="col-lg-8 col-md-6 col-sm-4 row mt-2">

   </main>

   <?php

   echo '<script src="../js/productApp.js" type="module"></script>';
   ?>
</body>

</html>