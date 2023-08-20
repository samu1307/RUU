<?php

    require_once('../models/crud.model.php');

    $_POST = json_decode(file_get_contents('php://input'),true);


    if(isset($_POST)){

        $to = 'samusamisam@gmail.com';
        $by = $_POST['email'];
        $msg = $_POST['body'];
        $matter = $_POST['matter'];

        mail($to, $matter, $msg);

    }

?>