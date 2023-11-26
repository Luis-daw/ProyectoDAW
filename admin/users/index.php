<!DOCTYPE html>
<html lang="ES-es">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Gestionar usuarios</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <link rel="stylesheet" href="./styles.css">
   <link rel="stylesheet" href="../../css/styles.css">

</head>

<body>
   <main>
      <?php
      session_start();
      require_once('../../assets/models/DaoUsers.php');
      require_once('../../nav.php');

      $userPermissions = isset($_SESSION['user']['permissions']) ? $_SESSION['user']['permissions'] : false;
      if (!$userPermissions) {
         header("Location: ../../");
      }
      generateNav();
      $daoUsers = new DaoUsers('proyecto-daw');

      if (isset($_GET['user'])){
         $user = $_GET['user'];
         $daoUsers->eliminateUser($user);
      }
      ?>
      <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post" id="formLogin">
         <input type="text" name="username" id="username" class='ml-35 mt-2 username' placeholder="Buscar usuario...">
         <input type="submit" value="Buscar" class="button btn-buscar">
      </form>
      <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
         <?php

         if (isset($_POST['cbx'])) {
            $checkbox = $_POST['cbx'];
            $permissions = $_POST['sel'];
            foreach ($checkbox as $username => $value) {
               $daoUsers->update($username, $permissions[$username]);
            }
         }
         if (isset($_POST['username'])) {
            $list = $daoUsers->getUsersPermissions($userPermissions, $_POST['username']);
         } else {
            $list = $daoUsers->getUsersPermissions($userPermissions);
         }
         $row = 1;
         if (is_array($list)) {
            echo "<table id='table' class='table'>
         <thead>
            <tr>
              <th scope='col'>#</th>
              <th scope='col'>Nombre de usuario</th>
              <th scope='col'>Permisos</th>
              <th scope='col'>Cambiar</th>
              <th scope='col'>Eliminar</th>
            </tr>
         </thead>
         <tbody>
            ";
            foreach ($list as $key => $value) {
               echo "<tr><th scope='row'>$row</th>";
               echo "<td>" . $value['username'] . "</td>";
               echo "<td>";
               echo "<select name='sel[" . $value['username'] . "]'>
                     <option value='1'>Cliente</option>
                     <option value='2'";
               if ($value['permission_level'] == 2) {
                  echo "selected";
               }
               echo ">Vendedor</option>
                     <option value='3'";
               if ($value['permission_level'] == 3) {
                  echo "selected";
               }
               echo ">Vendedor verificado</option>";

               if ($userPermissions >= 5) {
                  echo "<option value='4'";
                  if ($value['permission_level'] == 4) {
                     echo "selected";
                  }
                  echo ">Moderador</option>";
               }
               echo "</select>";
               echo "</td>";
               echo "<td><input type='checkbox' name='cbx[" . $value['username'] . "]'></td>";
               echo "<td><a href='./index.php?user=".$value['username']."'><button type='button'>Eliminar usuario</button></a></td>";
               echo "</tr>";
               $row++;
            }
            echo "</tbody></table>";
         } else {
            echo "Fallo al cargar los datos";
         }
         ?>
         <input type="submit" value="Actualizar seleccionados" class="ml-35 btn btn-primary btn-enviar">
      </form>
   </main>
</body>
</html>