<!DOCTYPE html>
<html lang="ES-es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/login.css">
</head>

<body data-bs-theme="">
    <?php


    if (isset($_POST['enviar'])){
        
    }
    require_once "../assets/models/DaoUsuarios.php";
    ?>
    <div class="form">
        <form action="./index.php" method="post" id="formLogin">
            <div class="row">
                <input type="text" name="nombre" id="nombre" minlength="4" class="form-control" required>
            </div>
            <div class="row">
                <input type="password" name="pass" id="pass" minlength="8" class="form-control" required>
                <button id="lookPassword" class="btn btn-primary w-25 ms-4">
                    Boton
                    <img src="../img/ver.jpg" alt="Ver contraseña">
                </button>
            </div>
            <div class="row">
                <input type="submit" value="Enviar" name="enviar" id="enviar">
            </div>

        </form>
    </div>


    <script src="../js/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>