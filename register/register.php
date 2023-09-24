<?php

  
if (isset($_POST['enviar'])) {
    echo "Entra enviar";
    session_start();
    require_once "../assets/models/DaoUsuarios.php";
    
    $daoUsers = new DaoUsers('proyecto-daw');
    $userName = $_POST['username'];
    $name = $_POST['name'];
    $surName = $_POST['surname'];
    $password = $_POST['pass'];
    $passwordVerif = $_POST['passverif'];
    $birthDate = $_POST['birthdate'];
    $direction = $_POST['direction'];
    $permissions = $_POST['permissions'];
    $destinyUrl = '.';
    $message = '';
    echo "El nombre de usuario es $userName";
    echo "<br> El nombre es $name";
    echo "<br> Los apellidos son $surName";
    echo "<br> La contraseña es $password";
    echo "<br> La contraseña verif es $passwordVerif";
    echo "<br> La fecha de nacimiento es $birthDate";
    echo "<br> La direccion es $direction";
    echo "<br> El nivel de permisos es  $permissions";
    
    //Hacer funcionalidad con DAOS y demás.
    // if ($daoUsers->obtener($userName) != null){
        // if ($password == $passwordVerif){

            // $daoUsers->insertUser($daoUsers->createUser($userName, $name, $surName, $password, $birthDate, $direction, $permissions));
            // $destinyUrl = './login';
        // }
        // else{
            // $message = 'Las contraseñas no coinciden';
        // }
    // }
    // else{
        // $message = 'El nombre de usuario ya existe';
    // }
    // $_SESSION['data']['user'] = $userName;
}    
// else{
    // "No entra enviar";
// }

// header("Location: $destinyUrl");
//exit;
?>