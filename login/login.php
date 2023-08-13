<?php


if (isset($_POST['enviar'])) {
    session_start();
    require_once "../assets/models/DaoUsuarios.php";
    
    $daoUsers = new DaoUsers('usuarios');
    $userName = $_POST['nombre'];
    $password = $_POST['pass'];
    $destinyUrl = '.';
    echo $userName;
    if ($daoUsers -> comprobarLogin($userName, $password)){
        $_SESSION['user'] = $userName;
        $destinyUrl = '..';
    }
    $_SESSION['data']['user'] = $userName;
}    

header("Location: $destinyUrl");
//exit;
?>