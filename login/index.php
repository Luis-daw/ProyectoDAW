<!DOCTYPE html>
<html lang="ES-es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">
</head>

<body data-bs-theme="">
    <?php 
    session_start();
    $name = "";
    if (isset($_SESSION['data']['user']) && $_SESSION['data']['user'] != ""){
        $name = $_SESSION['data']['user'];
        unset($_SESSION['data']['user']);
    }
    ?>
    <div class="form">
        <?php 
            if ($name != ""){
        ?>
        <p class="text-center pb-4">Usuario o contraseña mal introducidos</p>
        <?php
            }
        
        ?>
        <form action="./login.php" method="post" id="formLogin">
            <div class="row">
                <input type="text" name="nombre" id="nombre" minlength="4" class="form-control" value="<?php echo $name ?>" required>
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
        <a href="../register/index.php"> Registrarse </a>
    </div>


    <script src="../js/login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>