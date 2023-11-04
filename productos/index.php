<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>
<body data-bs-theme="">
    <?php
    require_once('../assets/models/DaoProducts.php'); // Incluye el archivo DaoProducts.php
    $daoProducts = new DaoProducts("proyecto-daw");
    $daoProducts->toJson();
    echo "¿Ha fallado?";
    ?>
    <section id="productContainer" class="row">
        <!-- <article class="col-xl-3 col-lg-3 col-md-4 ps-3">
            <h3></h3>
            <img src="" alt="">
            <p class="text-end"></p>
        </article> -->
        <p id="test3"></p>
    </section>
</body>
</html>