<?php

    include_once('../helpers/validations.php');
    validateSession();

    /* Incluir Head */
    $tittle =  'Recuperación de contraseña';
    $urlCss =  './css/main.css';
    $urlJs =  './js/login.js';
    $icon = 1;
    include('./templates.php/head-page.php'); 
?>
<body id="body-login" class="body-login">  
    <div class="login-right div-form-email">
        <div class="left__head" id="headLeft">
            <div class="left__head-logo">
                <img src="./img/escudo.png">
                <h3>RUU</h3>
            </div>
            <div class="left__head-arrow">
                <div><a class="df cxy" href="login.php">
                    <i class="las la-arrow-left"></i>
                </a></div>
            </div>
        </div>
        <div class="right__body-main">
            <div class="right__text info-login w100 df">
                <h1>Cambia la contraseña</h1>
                <p>
                    Restaura tu contraseña por una nueva
                    para que puedas ingresar al sistema
                </p>
            </div>
            <form id="form" class="right__body form-email w100 df">
                <div class="right__body-div-email">
                    <span>Contraseña nueva</span>
                    <input class="normal w100 recupass" type="password" id="userLogin" name="user" placeholder="Crea una contraseña nueva">
                    <div class="alertUser">Falta especificar el usuario</div>
                </div>
                <div class="right__body-div-pass">
                    <span>Verifica</span>
                    <input class="normal w100 recupass" type="password" id="passLogin" name="pass" placeholder="Verifica la contraseña">
                    <div class="alertPass">Falta especificar la contraseña</div>
                </div>
                <div class="alertLogin w100 df cxy"></div>
                <input class="right__body-btn-send recupass" id="btnSubmit" type="submit" value="Validar">
            </form>
        </div>
    </div>
    <?php 
        $urlA = 'login.php';
        $urlImg = './img/escudo.png';
        include('./templates.php/slider-form.php'); 
    ?>  
</body>
</html>