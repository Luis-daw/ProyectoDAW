<!DOCTYPE html>
<html lang="ES-es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indice</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body data-bs-theme="dark">
    <?php
    session_start();
    ?>
    <nav class="navbar navbar-expand-md bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Icono aqui</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./productos/index.html">Nuestros productos</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categorias
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Ordenadores</a></li>
                            <li><a class="dropdown-item" href="#">Portátiles</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Componentes</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Test</a>
                    </li>
                    <div>pues eso</div>
                    <form class="d-flex ms-4" role="search" action="./buscar/index.html" name="formBuscar" method="post">
                        <input class="form-control me-2 px-4" type="search" placeholder="Buscar producto" name="buscar" aria-label="Buscar producto">
                        <button class="btn btn-secondary" type="submit">Buscar</button>
                    </form>
                </ul>
            </div>
            <div>
                <?php
                $permissions = isset($_SESSION['user']['permissions']) ? $_SESSION['user']['permissions'] : 0;

                switch ($numPermisos) {
                    case 0:
                        echo "<a class='navbar-brand' href='./login'> Iniciar sesión </a>";
                        break;
                    case 5 || 4:
                        echo 'Admin o editor';
                    case 3 || 2:
                        echo 'Vender productos';
                    case 1:
                        echo 'Cerrar sesión';
                        break;
                    default:
                        break;
                }
                ?>
            </div>
        </div>
    </nav>
    <main class="content ps-4 pt-2">
        <h1>Nuestros productos más populares</h1>
        <div class="products row w-100 ps-3 dataoverhere">
            Si estás viendo esto no están cargando los productos.
        </div>
        <h1 class="pt-4 mt-4">Algunos productos de tu interés</h1>
        <div class="products row w-100 ps-3">
            Si estás viendo esto no están cargando los productos.
        </div>
    </main>

    <a href="./fromBbddToJson.php">Test json generate</a>

    <footer class="row container w-100 bg-primary ps-4 pt-2" data-bs-theme="dark">
        <div class="col-lg-4 col-md-6">
            <div class="row">Sobre nosotros</div>
            <div class="row">Política de privacidad</div>
            <div class="row">Política de cookies</div>
            <div class="row">Aviso legal</div>
            <div class="row">Información sobre compras</div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="row">Contacto</div>
            <div class="row">
                <div class="col-3">insta</div>
                <div class="col-3">twitt</div>
                <div class="col-3">faceb</div>
                <div class="col-3">email</div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <p class="copyright">Todos los derechos reservados</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="./js/test.js" type="module"></script>
</body>

</html>