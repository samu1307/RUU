<?php

    include_once('../helpers/validations.php');
    validateSession();

    /* Incluir Head */
    $tittle =  'Recuperación de contraseña';
    $urlCss =  './css/main.css';
    $urlJs =  './js/newpass.js';
    $icon = 1;
    include('./templates.php/head-page.php'); 
?>
<body id="body-login" class="body-login">  
    <div class="userUpdate">
        <div class="uc-p df">Contraseña actualizada</div>
        <div class="uc-line"></div>
    </div>
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
                    <input class="normal w100 recupass" type="password" id="passone" name="passone" placeholder="Crea una contraseña nueva">
                </div>
                <div class="right__body-div-pass">
                    <span>Verifica</span>
                    <input class="normal w100 recupass" type="password" id="passverify" name="passtwo" placeholder="Verifica la contraseña">
                </div>
                <div class="pass-lenght styleAlert dn">Mínimo 6 caracteres</div>
                <div class="pass-equal styleAlert dn">Contraseñas no coinciden</div>
                <div class="right__body-op-record df" style="margin-bottom: 10px;">
                    <input type="checkbox" id="view">
                    <div>Mostrar contraseña</div>
                </div>
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