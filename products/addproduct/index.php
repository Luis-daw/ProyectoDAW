<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Añadir producto</title>
</head>

<body>
   <?php
   session_start();
   if (isset($_SESSION['user']['permissions']) && $_SESSION['user']['permissions'] <= 1) {
      header("Location: ../../");
      exit;
   }

   ?>
   <form action="" method="post" id="formAddProduct">
      <input type="text" name="name" id="name">
      <input type="number" name="price" id="price" min="0">
      <input type="file" name="image" id="image">
   </form>
</body>

</html>