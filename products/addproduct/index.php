<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Añadir producto</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <link rel="stylesheet" href="styles.css">
</head>

<body>
   <?php
   require_once("../../assets/models/DaoProducts.php");
   session_start();
   $daoProducts = new DaoProducts("proyecto-daw");
   if (isset($_SESSION['user']['permissions']) && $_SESSION['user']['permissions'] <= 1) {
      header("Location: ../../");
      exit;
   }
   $categories = $daoProducts->getCategories();
   $_SESSION['user']['name'] = 'Administrador';
   $_SESSION['user']['permissions'] = 5;
   if (isset($_POST['name']) && isset($_POST['price'])) {

      $name = $_POST['name'];
      $price = $_POST['price'];
      $description = $_POST['description'];
      $categoriesHidden = isset($_POST['categories']) ? $_POST['categories'] : false;
      $image = isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK ? $_FILES["image"]["tmp_name"] : null;
      if ($image !== null) {
         $imageContent = file_get_contents($_FILES["image"]["tmp_name"]);
         // Codificar en base64
         $image = base64_encode($imageContent);
      }
      $status = $_SESSION['user']['permissions'] >= 3 ? 'enabled' : 'waiting';
      $daoProducts->addProduct($daoProducts->createProduct($name, $_SESSION['user']['name'], $price, $image, $description), $status);
      
      if ($categoriesHidden){
         $id = $daoProducts->getProductId($name,$price);
         $daoProducts->insertCategoriesProduct(explode('|',$categoriesHidden),$id);
      }
      header("Location: ../../");
      exit();
   }

   ?>
   <main class="form-container row">

      <form action="<?php $_SERVER["PHP_SELF"] ?>" enctype="multipart/form-data" method="post" id="formAddProduct" class="row">
         <div class="mb-3 col-md-6">
            <label for="name" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="name" id="name">
         </div>

         <div class="mb-3 col-md-6">
            <label for="price" class="form-label">Precio:</label>
            <input type="number" class="form-control" name="price" id="price" min="0">
         </div>



         <div class="mb-3 col-6">
            <label for="image" class="form-label">Imagen:</label>
            <input type="file" class="form-control" name="image" id="image">
            <label for="category" class="form-label mt-3">Selecciona las categorias:</label>
            <select id="category">
               <option value="no"></option>
               <?php
               foreach ($categories as $id => $category) {
                  echo "<option value='" . $id . "'>" . $category . "</option>";
               }
               ?>
            </select>
         </div>

         <div class="mb-3 col-6">
            <label for="description" class="form-label">Descripción:</label>
            <textarea class="form-control" name="description" id="description" cols="10" rows="3"></textarea>
         </div>
         <textarea id="categories" cols="30" rows="2" readonly></textarea>
         <input type="hidden" name="categories" id="hidden">
         <button type="submit" class="btn btn-primary" id="btnSend">Enviar</button>
      </form>
   </main>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
   <script src="categories.js"></script>
</body>

</html>