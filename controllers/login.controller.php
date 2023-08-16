<?php

    session_start();
    require_once('../models/login.model.php');

    $_POST = json_decode(file_get_contents('php://input'),true);

    if(isset($_POST)){
        
        $user = $_POST['user']; 
        $pass = $_POST['pass']; 
        
        $model = new LoginModel();
        $entrada = $model->login($user, $pass);

        if($entrada != false) echo 1;
        else echo 0;
   
    }

?>