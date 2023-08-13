<?php


if (isset($_POST['enviar'])) {
    session_start();
    require_once "../assets/models/DaoUsuarios.php";
    
    $daoUsers = new DaoUsers('usuarios');
    $userName = $_POST['username'];
    $name = $_POST['name'];
    $password = $_POST['pass'];
    $passwordVerif = $_POST['passVerif'];
    $birthDate = $_POST['birthdate'];
    $direction = $_POST['direction'];
    $permissions = $_POST['permissions'];
    $destinyUrl = '.';
    $message = '';
    echo $userName;
    
    //Hacer funcionalidad con DAOS y demás.
    if (!$daoUsers->obtener($userName)){
        if ($password == $passwordVerif){

            $daoUsers->insertar($daoUsers->crearUsuario($userName, $name, $password, $birthDate, $direction, $permissions));
            $destinyUrl = '../login';
        }
        else{
            $message = 'Las contraseñas no coinciden';
        }
    }
    else{
        $message = 'El nombre de usuario ya existe';
    }
    $_SESSION['data']['user'] = $userName;
}    

header("Location: $destinyUrl");
//exit;
?>