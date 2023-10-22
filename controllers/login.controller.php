<?php

    session_start();
    require_once('../models/login.model.php');

    $_POST = json_decode(file_get_contents('php://input'),true);

    if(isset($_POST)){
        
        $rol = $_POST['rol']; 
        $user = $_POST['user'];
        $pass = $_POST['pass']; 
        $record = $_POST['record']; 

        $model = new LoginModel();
        echo $model->login($rol, $user, $pass, $record);

    }

?>