<?php
    $urlCss =  '../css/main.css';
    $tittle =  'Crear Usuario';
    $urlJs =  '../js/cuser.js';
    $icon = 1;
    include('../templates.php/head-page.php'); 

    include_once('../../models/crud.model.php'); 
    if($_GET){
        $idUser = $_GET['id'];
        $rol = $_GET['r_0'];
        $model = new ModelCRUD();
        $res = $model->getDataUser($idUser, $rol);
        if(!$res) header('Location: ../dashboard.php');
    }

?>
<body id="body-create">
    <?php 
        $jsPath = '../js/modules/preloader.js';
        include_once('../templates.php/preloader.php')
    ?>
    <div class="userCreated">
        <div class="uc-p df">Usuario creado</div>
        <div class="uc-line"></div>
    </div>
    <div class="userUpdate">
        <div class="uc-p df">Usuario actualizado</div>
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
    <?php if(isset($res)){ foreach($res as $data){?>
    <div class="right__text info-create w100 df">
        <h1>Actualizar Usuario</h1>
        <p>
            Como coordinador, podrás crear, editar
            y eliminar usuarios, además de realizar
            una variedad de funciones más
        </p>
    </div>
    <form id="createUser" class="right__body form-user w100 df" >
        <div class="right__names df w100">
            <div class="right__name-name">
                <span>Nombres</span>
                <input type="text" placeholder="Nombres" value="<?= $data['nombre'] ?>" name="name" id="name">
            </div>
            <div class="right__name-lastname">
                <span>Apellidos</span>
                <input type="text" placeholder="Apellidos" value="<?= $data['apellido'] ?>" name="lastname" id="lastname">
            </div>
        </div>
        <div class="right__info df w100">
            <div class="right__info-number">
                <span>Telefono</span>
                <input type="number" maxlength="10" placeholder="Telefono" value="<?= $data['telefono'] ?>" name="number" id="number">
            </div>
            <div class="right__info-email">
                <span>Correo</span>
                <input type="email" placeholder="Correo" value="<?= $data['correo'] ?>" name="email" id="email">
            </div>
        </div>
        <div class="right__jornada-div-btn w100">
            <span>Jornada</span>
            <div class="right__jornada df w100">
                <button class="right__jornada-btn off <?php if($data['jornada'] == 'M') echo 'rol-btn-active'; ?>" id="jor-btn-mañana" type="button" value="coor">
                    <div class="right__jornada-cont df cxy"></div>
                    <div>Mañana</div>
                </button>
                <button class="right__jornada-btn off <?php if($data['jornada'] !== 'M') echo 'rol-btn-active'; ?>" id="jor-btn-tarde" type="button" value="aux">
                    <div class="right__jornada-cont df cxy"></div>
                    <div>Tarde<div>
                </button>
            </div>
        </div>
        <div class="right__user df w100">
            <div class="right__user-user">
                <span>Usuario</span>
                <input type="text" placeholder="Usuario" value="<?= $data['user'] ?>" name="user" id="user">
            </div>
            <div class="right__user-pass">
                <span>Contraseña</span>
                <input type="pass" placeholder="Contraseña" value="<?= $data['pass'] ?>"  name="pass" id="pass">
            </div>
        </div>
        <div class="right__body-btn w100" style="display:none;">
            <span>Rol</span>
            <div class="right__body-btn-rols w100">
                <button class="right__body-btn-rol off <?php if($data['rol'] == 'Coordinador') echo 'rol-btn-active'?>" id="rol-btn-coor" type="button" value="coor">
                    <div class="right__body-cont df cxy"></div>
                    <div>Coordinador</div>
                </button>
                <button class="right__body-btn-rol off <?php if($data['rol'] !== 'Coordinador') echo 'rol-btn-active'?>" id="rol-btn-aux" type="button" value="aux">
                    <div class="right__body-cont df cxy"></div>
                    <div>Auxiliar<div>
                </button>
            </div>
        </div>
        <div class="right__body-btn w100">
            <span>Estado</span>
            <div class="right__body-btn-rols w100">
                <button class="right__body-btn-rol off <?php if($data['estado'] == 'A') echo 'rol-btn-active' ?>" style="width: 49%;" id="rol-btn-active" type="button" value="coor">
                    <div class="right__body-cont df cxy"></div>
                    <div>Activo</div>
                </button>
                <button class="right__body-btn-rol off <?php if($data['estado'] == 'I') echo 'rol-btn-active' ?>" style="width: 49%;" id="rol-btn-inactive" type="button" value="aux">
                    <div class="right__body-cont df cxy"></div>
                    <div>Inactivo<div>
                </button>
            </div>
        </div>
        <div class="right__body-btn w100" style="display:none;">
            <span>Rol</span>
            <div class="right__body-btn-rols w100">
                <button class="right__body-btn-rol off <?php if($data['rol'] == 'Coordinador') echo 'rol-btn-active' ?>" id="rol-btn-coor" type="button" value="coor">
                    <div class="right__body-cont df cxy"></div>
                    <div>Coordinador</div>
                </button>
                <button class="right__body-btn-rol off <?php if($data['rol'] !== 'Coordinador') echo 'rol-btn-active' ?>" id="rol-btn-aux" type="button" value="aux">
                    <div class="right__body-cont df cxy"></div>
                    <div>Auxiliar<div>
                </button>
            </div>
        </div>
        <input class="right__body-btn-send create-btn-user" id="btnSubmit" type="submit" value="Actualizar usuario">
    </form>
    <?php }}else{ ?>
        <div class="right__text info-create w100 df">
            <h1>Crear Usuario</h1>
            <p>
                Como coordinador, podrás crear, editar
                y eliminar usuarios, además de realizar
                una variedad de funciones más
            </p>
        </div>
        <form id="createUser" enctype="multipart/form-data" class="right__body form-user w100 df" >
        <div class="right__names df w100">
            <div class="right__name-name">
                <span>Nombres</span>
                <input type="text" placeholder="Nombres" name="name" id="name">
            </div>
            <div class="right__name-lastname">
                <span>Apellidos</span>
                <input type="text" placeholder="Apellidos" name="lastname" id="lastname">
            </div>
        </div>
        <div class="right__info df w100">
            <div class="right__info-number">
                <span>Telefono</span>
                <input type="number" maxlength="10" placeholder="Telefono" name="number" id="number">
            </div>
            <div class="right__info-email">
                <span>Correo</span>
                <input type="email" placeholder="Correo" name="email" id="email">
            </div>
        </div>
        <div class="right__jornada-div-btn w100">
            <span>Jornada</span>
            <div class="right__jornada df w100">
                <button class="right__jornada-btn off" id="jor-btn-mañana" type="button" value="coor">
                    <div class="right__jornada-cont df cxy"></div>
                    <div>Mañana</div>
                </button>
                <button class="right__jornada-btn off" id="jor-btn-tarde" type="button" value="aux">
                    <div class="right__jornada-cont df cxy"></div>
                    <div>Tarde<div>
                </button>
            </div>
        </div>
        <div class="right__user df w100">
            <div class="right__user-user">
                <span>Usuario</span>
                <input type="text" placeholder="Usuario" name="user" id="user">
            </div>
            <div class="right__user-pass">
                <span>Contraseña</span>
                <input type="pass" placeholder="Contraseña"  name="pass" id="pass">
            </div>
        </div>
        <div class="right__body-btn w100">
            <span>Rol</span>
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
        </div>
        <input class="right__body-btn-send create-btn-user" id="btnSubmit" type="submit" value="Crear usuario">
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