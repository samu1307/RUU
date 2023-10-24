<?php

    include_once('../helpers/validations.php');
    validateSession();

    $img = file_get_contents('./img/escudo.png');
    echo $img."<hr>";
    $imgHex = bin2hex($img);
    echo $imgHex;

    /* Incluir Head */
    $tittle =  'Recuperación de contraseña';
    $urlCss =  './css/main.css';
    $urlJs =  './js/sendMail.js';
    $icon = 1;
    include('./templates.php/head-page.php'); 
?>
<body id="body-login" class="body-login">
    <div class="userUpdate">
        <div class="uc-p df">Enviando correo</div>
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
                <h1>Recuperación de contraseña</h1>
                <p>
                    Ingresa tu correo electrónico para 
                    enviarte un código de verificación.
                </p>
            </div>
            <form id="form" class="right__body form-email w100 df">
                <div class="right__body-div-email">
                    <span>Correo</span>
                    <input class="normal recupass w100" type="text" id="userLogin" name="email" placeholder="Ingresa tu correo">
                    <div class="alertUser cxy">Correo no válido</div>
                </div>
                <div class="userUndefined styleAlert dn">Usuario no encontrado</div>
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