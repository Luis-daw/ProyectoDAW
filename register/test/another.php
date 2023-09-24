<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['button_reset'])) {
        echo  "reset button is clicked";
    } 
    else if (isset($_POST['button_save'])) {
        echo  "save button is clicked";
    } 
    else if (isset($_POST['button_delete'])) {
       echo  "delete button is clicked";
    } 
    else if (isset($_POST['enviar'])) {
       echo  "enviar";
    } 
    else {
        echo  " invalid form submission or access denied";
    }
}
?>