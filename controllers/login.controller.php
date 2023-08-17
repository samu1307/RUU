<?php

    session_start();
    require_once('../models/login.model.php');

    $_POST = json_decode(file_get_contents('php://input'),true);

    if(isset($_POST)){
        
        $rol = $_POST['rol']; 
        $user = $_POST['user']; 
        $pass = $_POST['pass']; 

        $model = new LoginModel();
        $entrada = $model->login($rol, $user, $pass);

        if($entrada == true) echo 1;
        else echo 0;
   
    }

?>