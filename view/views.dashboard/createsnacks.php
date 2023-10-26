<?php

    require('../../models/crud.model.php'); 
    $model = new ModelCRUD();

    $urlCss =  '../css/main.css';
    $tittle =  'Crear Refrigerio';
    $urlJs =  '../js/csnack.js';
    $icon = 1;
    include('../templates.php/head-page.php'); 

    $coor = $model->read('v_usercoordinador');
    $aux = $model->read('v_userauxiliar');

    if($_GET){
        $idSnack = $_GET['id'];
        $res = $model->getDataSnack($idSnack);
        if(!$res) header('Location: ../dashboard.php');
    }

?>
<body id="body-create">
    <div class="userCreated">
        <div class="uc-p df">Refrigerio creado</div>
        <div class="uc-line"></div>
    </div>
    <div class="userUpdate">
        <div class="uc-p df">Refrigerio actualizado</div>
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
            En calidad de coordinador o auxiliar,
            tendrás la capacidad de crear, editar
            y eliminar refrigerios, así como de llevar
            a cabo diversas funciones adicionales.
        </p>
    </div>
    <?php if(isset($res)){ foreach($res as $data){ ?>
        <form id="createUser" enctype="multipart/form-data" class="right__body form-user w100 df" >
        <div class="right__jornada-div-btn w100">
            <span>Tipo:</span>
            <div class="right__jornada df w100">
                <button class="right__jornada-btn <?php if($data['tipo'] == 'A') echo 'rol-btn-active' ?> off" id="type-btn-a" type="button" value="coor">
                    <div class="right__jornada-cont df cxy"></div>
                    <div>A</div>
                </button>
                <button class="right__jornada-btn <?php if($data['tipo'] != 'A') echo 'rol-btn-active'?> off" id="type-btn-b" type="button" value="aux">
                    <div class="right__jornada-cont df cxy"></div>
                    <div>B<div>
                </button>
            </div>
        </div>
        <div class="right__user df w100">
            <div class="right__user-user" style="width: 25%;">
                <span>Cantidad</span>
                <input type="number" name="cantSnacks" id="snackCant" style="padding: 1vh 7vw;" value="<?= $data['cantidad'] ?>">
            </div>
            <div class="right__snack-coor">
                <span>Coordinador</span>
                <select name="" id="">
                    <?php
                        if(isset($coor)){
                            forEach($coor as $c){ 
                                $vari = $c['idCoordinador'] == $data['coordinador']; ?>
                                <option <?php if($vari) echo 'selected' ?> value="<?= $c['idCoordinador'] ?>"><?= $c['nombre'] ?></option>
                    <?php }}?>
                </select>
            </div>
            <div class="right__snack-aux">
                <span>Auxiliar</span>
                <select name="" id="">
                    <?php
                        if(isset($aux)){
                            forEach($aux as $a){ 
                                $vari = $a['idAuxiliar'] == $data['auxiliar']; ?>
                                <option <?php if($vari) echo 'selected' ?> value="<?= $a['idAuxiliar'] ?>"><?= $a['nombre'] ?></option>
                    <?php }}?>
                </select>
            </div>
        </div>
        <div class="right__body-btn w100">
            <span>Descripción</span>
            <div class="right__body-btn-rols w100">
                <textarea name="refriDecription" id="refriDecription"><?= $data['descripcion'] ?></textarea>
            </div>
        </div>
        <input class="right__body-btn-send create-btn-user" id="btnSubmit" type="submit" value="Crear refrigerio">
    </form>
    <?php }}else{ ?>
    <form id="createUser" enctype="multipart/form-data" class="right__body form-user w100 df" >
        <div class="right__jornada-div-btn w100">
            <span>Tipo:</span>
            <div class="right__jornada df w100">
                <button class="right__jornada-btn off" id="type-btn-a" type="button" value="coor">
                    <div class="right__jornada-cont df cxy"></div>
                    <div>A</div>
                </button>
                <button class="right__jornada-btn off" id="type-btn-b" type="button" value="aux">
                    <div class="right__jornada-cont df cxy"></div>
                    <div>B<div>
                </button>
            </div>
        </div>
        <div class="right__user df w100">
            <div class="right__user-user" style="width: 25%;">
                <span>Cantidad</span>
                <input type="number" name="cantSnacks" id="snackCant" style="padding: 0; height: 58%;">
            </div>
            <div class="right__snack-coor">
                <span>Coordinador</span>
                <select name="" id="">
                    <?php
                        if(isset($coor)){
                            forEach($coor as $c){ ?>
                                <option value="<?= $c['idCoordinador'] ?>"><?= $c['nombre'] ?></option>
                    <?php }}?>
                    <option selected disabled hidden>--</option>
                </select>
            </div>
            <div class="right__snack-aux">
                <span>Auxiliar</span>
                <select name="" id="">
                    <?php
                        if(isset($aux)){
                            forEach($aux as $a){ ?>
                                <option value="<?= $a['idAuxiliar'] ?>"><?= $a['nombre'] ?></option>
                    <?php }}?>
                    <option selected disabled hidden>--</option>
                </select>
            </div>
        </div>
        <div class="right__body-btn w100">
            <span>Descripción</span>
            <div class="right__body-btn-rols w100">
                <textarea name="refriDecription" id="refriDecription"></textarea>
            </div>
        </div>
        <input class="right__body-btn-send create-btn-user" id="btnSubmit" type="submit" value="Crear refrigerio">
    </form>
    <?php } ?>
    </div>
    <?php 
        $urlA = '../dashboard.php';
        $urlImg = '../img/escudo.png';
        include('../templates.php/slider-form.php'); 
    ?>
    </div>
</body>
</html>