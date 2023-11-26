<!DOCTYPE html>
<html lang="ES-es">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Registrarse</title>
   <link rel="stylesheet" href="../css/styles.css">
   <link rel="stylesheet" href="./register.css">
</head>

<body>
   <div class="form">
      <form action="./register.php" method="post" id="formRegister" name="enviar">
         <div class="row mb-3">
            <input type="text" name="username" id="username" minlength="4" class="form-control" required placeholder="Nombre de usuario">
         </div>
            <div class="col-6 form-group">
               <label for="user" class="form-label">Nombre</label>
               <input type="text" name="name" id="name" maxlength="24" class="form-control" placeholder="Nombre" required>
            </div>
            <div class="col-6 form-group">
               <label for="surname" class="form-label">Apellidos</label>
               <input type="text" name="surname" id="surname" maxlength="48" class="form-control" placeholder="Apellidos" required>
            </div>
         <div class="row">
            <label for="pass" class="form-label">Contraseña</label>
            <input type="password" name="pass" id="pass" minlength="8" class="form-control" placeholder="Contraseña" required>
         </div>
         <div class="row">
            <label for="passverif" class="form-label">Repite la contraseña</label>
            <input type="password" name="passverif" id="passverif" minlength="8" class="form-control" placeholder="Repite la contraseña" required>
         </div>
         <div class="row">
            <label for="birthdate" class="form-label">Fecha de nacimiento</label>
            <input type="date" name="birthdate" id="birthdate" max="2005-10-01" min="1923-10-01" class="form-control" required>
         </div>
         <div class="row">
            <label for="direction" class="form-label">Dirección</label>
            <input type="text" name="direction" id="direction" placeholder="Dirección" required>
         </div>
         <div class="row">
            <label for="permissions" class="form-label" title="Esto se podrá cambiar posteriormente en la configuración">Seleccione que desea realizar</label>
            <select name='permissions' id="permissions" class="form-select">
               <option value="1"> Compras </option>
               <option value="2"> Compras y ventas </option>
            </select>
         </div>
         <input type="submit" value="Enviar" name="enviar" class="button">
      </form>
   </div>

   <script src="../js/register.js" type="module"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>