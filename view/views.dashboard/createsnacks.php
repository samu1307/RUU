<?php
    $tittle =  'Crear Refrigerio';
    $urlJs =  '../js/cuser.js';
    $urlCss =  '../css/main.css';
    $icon = 1;
    $report = 0;
    include('../templates.php/head-page.php'); 
?>
<body id="body-create">
    <div class="userCreated">
        <div class="uc-p df">Refrigerio creado</div>
        <div class="uc-line"></div>
    </div>
    <div id="body-login" class="body-user">
    <div class="login-right forms-create">
    <div class="left__head" id="headLeft">
        <div class="left__head-logo">
            <img src="../img/escudo.png">
            <h3>RUU</h3>
        </div>
        <div class="left__head-arrow">
            <a class="df cxy" href="../dashboard.php">
                <i class="las la-arrow-left c-black"></i>
            </a>
        </div>
    </div>
    <div class="right__text info-create w100 df">
        <h1>Crear refrigerio</h1>
        <p>
            Como coordinador o Auxiliar, podrás crear,
            editar y eliminar refrigerios, además de
            realizar una variedad de funciones más
        </p>
    </div>
    <form id="createUser" class="right__body form-user w100 df" >
        <div class="right__names df w100">
            <div class="right__jornada-div-btn w100" id="div-type-refry">
                <span>Tipo de Refrigero</span>
                <div class="right__jornada df w100">
                    <button class="right__jornada-btn off" id="jor-btn-mañana" type="button" value="coor">
                        <div class="right__jornada-cont df cxy"></div>
                        <div>A</div>
                    </button>
                    <button class="right__jornada-btn off" id="jor-btn-tarde" type="button" value="aux">
                        <div class="right__jornada-cont df cxy"></div>
                        <div>B<div>
                    </button>
                </div>
            </div>
            <div class="right__name-name">
                <span>Cantidad</span>
                <input type="number" placeholder="Cantidad" name="name" id="name">
            </div>
        </div>
        <textarea name="refriDecription" id="refriDecription" placeholder="Descripción"></textarea>
        <input class="right__body-btn-send create-btn-user" id="btnSubmit" type="submit" value="Crear usuario">
    </form>
    </div>
    <?php 
        $urlA = '../dashboard.php';
        $urlImg = '../img/escudo.png';
        include('../templates.php/slider-form.php'); 
    ?>
    </div>
</body>
</html>