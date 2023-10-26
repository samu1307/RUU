<?php

    require_once('../models/reports.model.php');
    $_POST = json_decode(file_get_contents('php://input'),true);
    $reports = new Reports();

    if(isset($_GET['report'])){
        switch($_GET['report']){
            case 'users':
                echo json_encode($reports->reportUsers());
            break;
        }
    }

?>