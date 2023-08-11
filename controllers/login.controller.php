<?php

    session_start();
    require_once('../models/login.model.php');

    if($_POST){

        $user = $_POST['user']; 
        $pass = $_POST['pass']; 

        $model = new Login();
        $entrada = $model->login($user, $pass);

        if($entrada != false) header('Location: ../view/dashboard.html');
        else header('Location: ../view/login.html');

    }

?>