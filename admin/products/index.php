<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Gestionar products</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <link rel="stylesheet" href="./styles.css">
   <link rel="stylesheet" href="../../css/styles.css">
</head>

<body>
   <?php
   session_start();
   require_once('../../assets/models/DaoProducts.php');
   require_once('../../nav.php');
   generateNav();
   $daoProducts = new DaoProducts('proyecto-daw');
   if (isset($_GET['eliminate'])){
      $daoProducts->eliminateProduct($_GET['eliminate']);
   }
   if (isset($_GET['add'])){      
      $daoProducts->changeProductStatus($_GET['add'], 'enabled');
   }
   $products = $daoProducts->list('waiting');
   ?>
   <div class="container mt-4">
      <h2>Lista de products</h2>

      <table class="table">
         <thead>
            <tr>
               <th>Nombre</th>
               <th>Precio</th>
               <th>Proveedor</th>
               <th>Acciones</th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($products as $product) : ?>
               <tr>
                  <td><?= $product->name ?></td>
                  <td><?= $product->price ?></td>
                  <td><?= $product->provider ?></td>
                  <td>
                     <a href="./index.php?add=<?= $product->id ?>">
                        <button type="button" class="btn btn-success">Permitir</button>
                     </a>
                     <a href="./index.php?eliminate=<?= $product->id ?>">
                        <button type="button" class="btn btn-danger">Eliminar</button>
                     </a>
                  </td>
               </tr>
            <?php endforeach; ?>
         </tbody>
      </table>

   </div>
</body>

</html>