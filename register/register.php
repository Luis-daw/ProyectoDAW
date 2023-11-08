<?php
// Incluye las clases necesarias
require_once "../assets/models/DaoUsers.php";
require_once "../assets/models/classes/User.php";
// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["username"])) {
    // Recopila los datos del formulario
    $userName = $_POST["username"];
    $name = $_POST["name"];
    $surName = $_POST["surname"];
    $password = $_POST["pass"];
    $birthDate = $_POST["birthdate"];
    $direction = $_POST["direction"];
    $permissions = $_POST["permissions"];

    // Crea una instancia de la clase DaoUsers
    $daoUsers = new DaoUsers("proyecto-daw"); // Reemplaza "nombre_de_tu_base_de_datos" con el nombre real de tu base de datos

    // Crea una instancia de la clase User con los datos del formulario
    $user = $daoUsers->createUser($userName, $name, $surName, $password, $birthDate, $direction, $permissions);
    // Inserta el usuario en la base de datos
    $daoUsers->insert($user);

    // Redirige a una página de confirmación o realiza cualquier otra acción necesaria
   header("Location: ../login"); // Reemplaza "confirmation.php" con la página a la que deseas redirigir
   exit();
}
?>