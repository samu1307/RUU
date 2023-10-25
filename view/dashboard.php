<?php

    session_start();

    require_once('../helpers/validations.php');
    require_once('../controllers/dashboard.controller.php');

    
    $rol = $_SESSION["rol"];
    $query = new ControllerCRUD();
    if($rol !== 'Auxiliar'){
        $coorDates = $query->show("v_userCoordinador");
        $auxDates = $query->show("v_userAuxiliar");
    }
    $snacksDates = $query->show("refrigerio");
    $coursesDates = $query->show("curso");
    
    validateCookie();

    /* Incluir Head */
    $tittle =  'Panel de control';
    $urlJs =  './js/dashboard.js';
    $urlCss =  './css/main.css';
    $icon = 1;
    include('./templates.php/head-page.php'); 

?>
<head>
    <script src="./js/reports.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body id="body-dash">
    <div class="cont-delete-confirm">
        <button id="close-delete"><i class="las la-times"></i></button>
        <h3>¿Desea eliminar a este usuario?</h3>
        <div class="cont-delete-btns">
            <button id="delete-btn-ca">Cancelar</button>
            <a id="delete-btn-el">Eliminar</a>
        </div>
    </div>
    <?php include_once('./views.dashboard/users.iframe.php') ?>
    <?php include_once('./views.dashboard/courses.iframe.php') ?>
    <?php include_once('./views.dashboard/snacks.iframe.php') ?>
    <?php include_once('./views.dashboard/profile.iframe.php') ?>
    <?php include_once('./views.dashboard/report.iframe.php') ?>
    <div class="nav df">
        <div class="nav-nav df">
            <a class="df jc-s btn-menu-menu" id="homeMenu" href="../index.php">
                <div class="icon-img" id="w100">
                    <i class="las la-home"></i>
                </div>
                <div class="icon-text" id="dn">
                    <h4>Inicio</h4>
                </div>
            </a>
            <div class="df jc-s btn-menu-menu" id="profileMenu">
                <div class="icon-img" id="w100">
                    <i class="las la-id-card"></i>
                </div>
                <div class="icon-text" id="dn">
                    <h4>Perfil</h4>
                </div>
            </div>
            <div id="line"></div>
            <?php if(trim($rol) !== 'Auxiliar'){ ?>
            <div class="df jc-s btn-menu-menu" id="courseMenu">
                <div class="icon-img" id="w100">
                    <i class="las la-atlas"></i>
                </div>
                <div class="icon-text" id="dn">
                    <h4>Cursos</h4>
                </div>
            </div>
            <?php } if(trim($rol) !== 'Auxiliar'){ ?> 
            <div class="df jc-s btn-menu-menu click-sections" id="userMenu">
                <div class="icon-img" id="w100">
                    <i class="las la-users"></i>
                </div>
                <div class="icon-text" id="dn">
                    <h4>Usuarios</h4>
                </div>
            </div>
            <?php } ?>
            <div class="df jc-s btn-menu-menu" id="snackMenu">
                <div class="icon-img" id="w100">
                    <i class="las la-utensils"></i>
                </div>
                <div class="icon-text" id="dn">
                    <h4>Refrigerios</h4>
                </div>
            </div>
            <div id="line"></div>
            <div class="df jc-s btn-menu-menu" id="reportMenu">
                    <div class="icon-img" id="info-img">
                        <i class="las la-newspaper"></i>
                    </div>
                    <div class="icon-text" id="dn">
                        <h4>Reporte</h4>
                    </div>
            </div>
            <div id="line"></div>
            <a class="df jc-s btn-menu-menu" id="logoutMenu" href="../controllers/exit.controller.php">
                <div class="icon-img" id="w100">
                    <i class="las la-sign-out-alt"></i>
                </div>
                <div class="icon-text" id="dn">
                    <h4>Cerrar Sesión</h4>
                </div>
            </a>
        </div>
    </div>
</body>
</html>