<?php

    include_once('../models/login.model.php');
    $login = new LoginModel();
    $arrUsers = $login->readCookie();
    print_r($arrUsers);

    /* Incluir Head */
    $tittle =  'Inicio de Sesión';
    $urlCss =  './css/main.css';
    $urlJs =  './js/login.js';
    $icon = 1;
    include('./templates.php/head-page.php'); 
?>
<body id="body-login" class="body-login">
    <?php 
        $urlA = '../index.php';
        $urlImg = './img/escudo.png';
        include('./templates.php/slider-form.php'); 
    ?>    
    <div class="login-right div-form-login">
        <div class="left__head" id="headLeft">
            <div class="left__head-logo">
                <img src="./img/escudo.png">
                <h3>RUU</h3>
            </div>
            <div class="left__head-arrow">
                <div><a class="df cxy" href="../index.php">
                    <i class="las la-arrow-left"></i>
                </a></div>
            </div>
        </div>
        <div class="right__text info-login w100 df">
            <h1>Inicia Sesión</h1>
            <p>
                Si estas registrado en el sistema de información,
                podrás iniciar sesión
            </p>
        </div>
        <form id="form" class="right__body form-login w100 df" >
            <div class="right__body-btn w100">
                <span>¿Cuál es tu rol?</span>
                <div class="right__body-btn-rols w100">
                    <button class="right__body-btn-rol off" id="rol-btn-coor" type="button" value="coor">
                        <div class="right__body-cont df cxy"></div>
                        <div>Coordinador</div>
                    </button>
                    <button class="right__body-btn-rol off" id="rol-btn-aux" type="button" value="aux">
                        <div class="right__body-cont df cxy"></div>
                        <div>Auxiliar<div>
                    </button>
                </div>
                <div class="alertRol">Falta especificar el rol</div>
            </div>
            <div class="right__body-div-email">
                <span>Usuario</span>
                <input class="normal w100" type="text" id="userLogin" name="user" placeholder="Ingresa tu usuario">
                <div class="alertUser">Falta especificar el usuario</div>
            </div>
            <div class="right__body-div-pass">
                <span>Contraseña</span>
                <input class="normal w100" type="password" id="passLogin" name="pass" placeholder="•••••••••••••••">
                <div class="alertPass">Falta especificar la contraseña</div>
            </div>
            <div class="alertLogin w100 df cxy"></div>
            <div class="right__body-op df">
                <div class="right__body-op-record df cxy">
                    <input type="checkbox" name="record">
                    <div>Recordar</div>
                </div>
                <a class="right__body-op-pass" href="./recucorreo.php">¿Has olvidado tu contraseña?</a>
            </div>
            <input class="right__body-btn-send" id="btnSubmit" type="submit" value="Ingresar">
        </form>
    </div>
</body>
</html>