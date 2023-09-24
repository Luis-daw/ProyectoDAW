<!DOCTYPE html>
<html lang="ES-es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">
</head>

<body data-bs-theme="">
    <?php
    session_start();
    $userName = '';
    $name = '';
    $surName = '';
    $birthDate = '';
    $direction = '';
    $status = 1;
    if (isset($_SESSION['data']['user']) && $_SESSION['data']['user'] != "") {
        $userName = $_SESSION['data']['user'];
        $name = $_SESSION['data']['name'];
        $surName = $_SESSION['data']['surName'];
        $birthDate = $_SESSION['data']['birthDate'];
        $direction = $_SESSION['data']['direction'];
        $status = $_SESSION['data']['status'];
        unset($_SESSION['data']);
    }
    ?>
    <div class="form">
        <?php
        if ($name != "") {
        ?>
            <p class="text-center pb-4">El nombre de usuario introducido ya existe</p>
        <?php
        }

        ?>
        <form action="./register.php" method="post">
            <input type="submit" value="Enviar" name="enviar">
            <div class="row d-none" id="passMessage">
                <p class="text-center">Las contraseñas deben ser iguales</p>
            </div>
            <div class="row">
                <label for="username">Nombre de usuario</label>
                <input type="text" name="username" id="username" minlength="4" class="form-control" value="<?php echo $userName ?>" required>
            </div>
            <div class="row">
                <div class="col-6 form-group">
                    <label for="user" class="form-label">Nombre</label>
                    <input type="text" name="name" id="name" maxlength="24" class="form-control" value="<?php echo $name ?>" required>
                </div>
                <div class="col-6 form-group">
                    <label for="surname" class="form-label">Apellidos</label>
                    <input type="text" name="surname" id="surname" maxlength="48" class="form-control" value="<?php echo $surName ?>" required>
                </div>
            </div>
            <div class="row">
                <label for="pass" class="form-label">Contraseña</label>
                <input type="password" name="pass" id="pass" minlength="8" class="form-control" required>
            </div>
            <div class="row">
                <label for="verifpass" class="form-label">Repite la contraseña</label>
                <input type="password" name="passverif" id="passverif" minlength="8" class="form-control" required>
            </div>
            <div class="row">
                <label for="birthdate" class="form-label">Fecha de nacimiento</label>
                <input type="date" name="birthdate" id="birthdate" max="2005-06-01" min="1923-06-01" class="form-control" value="<?php echo $name ?>" required>
            </div>
            <div class="row">
                <label for="direction" class="form-label">Dirección</label>
                <input type="text" name="direction" id="direction">
            </div>
            <div class="row">
                <label for="permissions" class="form-label">Seleccione que desea realizar</label>
                <select name='permissions' id="permissions" class="form-select">
                    <option value="1"> Compras </option>
                    <option value="2"> Compras y ventas </option>
                </select>
            </div>
        </form>
        <form action="./test/another.php" method="post" id="formRegister">
            <div class="row d-none" id="passMessage">
                <p class="text-center">Las contraseñas deben ser iguales</p>
            </div>
            <div class="row">
                <label for="username">Nombre de usuario</label>
                <input type="text" name="username" id="username" minlength="4" class="form-control" value="<?php echo $userName ?>" required>
            </div>
            <div class="row">
                <div class="col-6 form-group">
                    <label for="user" class="form-label">Nombre</label>
                    <input type="text" name="name" id="name" maxlength="24" class="form-control" value="<?php echo $name ?>" required>
                </div>
                <div class="col-6 form-group">
                    <label for="surname" class="form-label">Apellidos</label>
                    <input type="text" name="surname" id="surname" maxlength="48" class="form-control" value="<?php echo $surName ?>" required>
                </div>
            </div>
            <div class="row">
                <label for="pass" class="form-label">Contraseña</label>
                <input type="password" name="pass" id="pass" minlength="8" class="form-control" required>
            </div>
            <div class="row">
                <label for="verifpass" class="form-label">Repite la contraseña</label>
                <input type="password" name="passverif" id="passverif" minlength="8" class="form-control" required>
            </div>
            <div class="row">
                <label for="birthdate" class="form-label">Fecha de nacimiento</label>
                <input type="date" name="birthdate" id="birthdate" max="2005-06-01" min="1923-06-01" class="form-control" value="<?php echo $name ?>" required>
            </div>
            <div class="row">
                <label for="direction" class="form-label">Dirección</label>
                <input type="text" name="direction" id="direction">
            </div>
            <div class="row">
                <label for="permissions" class="form-label">Seleccione que desea realizar</label>
                <select name='permissions' id="permissions" class="form-select">
                    <option value="1"> Compras </option>
                    <option value="2"> Compras y ventas </option>
                </select>
            </div>
            <div class="row">
                <input type="submit" value="Enviar" name="enviar">
            </div>
        </form>
    </div>


    <script src="../js/register.js" type="module"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>