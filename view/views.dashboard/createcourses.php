<?php

require('../../models/crud.model.php');
$model = new ModelCRUD();

$tittle =  'Crear Curso';
$urlJs =  '../js/ccourse.js';
$urlCss =  '../css/main.css';
$icon = 1;
include('../templates.php/head-page.php');

if ($_GET) {
    $idSnack = $_GET['id'];
    $res = $model->getDataCourse($idSnack);
    if (!$res) header('Location: ../dashboard.php');
}

?>

<body id="body-create">
    <?php
    $jsPath = '../js/modules/preloader.js';
    include_once('../templates.php/preloader.php')
    ?>
    <div class="userCreated">
        <div class="uc-p df">Curso creado</div>
        <div class="uc-line"></div>
    </div>
    <div class="userUpdate">
        <div class="uc-p df">Curso actualizado</div>
        <div class="uc-line"></div>
    </div>
    <div id="body-login" class="body-course">
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
            <?php if (isset($res)) {
                foreach ($res as $data) { ?>
                    <div class="right__text info-create w100 df">
                        <h1>Actualizar curso</h1>
                        <p>
                            Como coordinador , podrás crear, editar
                            y eliminar cursos, además de realizar
                            una variedad de funciones más
                        </p>
                    </div>
                    <form id="createCourse" class="right__body form-user w100 df">
                        <div class="right__names df w100">
                            <div class="right__name-name">
                                <span>Grado</span>
                                <input type="text" value="<?php echo $data['grado'] ?>" placeholder="Grado Ej: 10" name="name" id="name">
                            </div>
                            <div class="right__name-lastname">
                                <span>Curso</span>
                                <input type="text" value="<?php echo $data['curso'] ?>" placeholder="Curso Ej: A" name="lastname" id="lastname">
                            </div>
                        </div>
                        <div class="right__names df w100">
                            <div class="right__jornada-div-btn w100">
                                <span>Jornada</span>
                                <div class="right__jornada df w100" style="margin-bottom: 0;">
                                    <button class="right__jornada-btn off <?php if ($data['jornada'] == 'M') echo 'rol-btn-active' ?>" style="padding: 1.4vh 3.5vw;" id="jor-btn-mañana" type="button" value="coor">
                                        <div class="right__jornada-cont df cxy"></div>
                                        <div>Mañana</div>
                                    </button>
                                    <button class="right__jornada-btn off <?php if ($data['jornada'] == 'T') echo 'rol-btn-active' ?>" style=" padding: 1.4vh 3.5vw;" id="jor-btn-tarde" type="button" value="aux">
                                        <div class="right__jornada-cont df cxy"></div>
                                        <div>Tarde<div>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="right__info df w100">
                            <div class="right__info-number">
                                <span>Alumnos</span>
                                <input type="number" value="<?= $data['cantAlumnos'] ?>" placeholder="Alumnos" name="number" id="number">
                            </div>
                            <div class="right__info-email">
                                <span>Director</span>
                                <input type="text" value="<?= $data['profesor'] ?>" placeholder="Nombre del director" name="email" id="email">
                            </div>
                        </div>
                        <div class="right__body-btn w100">
                            <span>Estado</span>
                            <div class="right__body-btn-rols w100">
                                <button class="right__body-btn-rol off <?php if($data['estado'] == 'A') echo 'rol-btn-active' ?>" style="width: 49%; padding: 1.4vh 3.5vw;" id="course-active" type="button" value="coor">
                                    <div class="right__body-cont df cxy"></div>
                                    <div>Activo</div>
                                </button>
                                <button class="right__body-btn-rol off <?php if($data['estado'] == 'I') echo 'rol-btn-active' ?>" style="width: 49%; padding: 1.4vh 3.5vw;" id="course-inactive" type="button" value="aux">
                                    <div class="right__body-cont df cxy"></div>
                                    <div>Inactivo<div>
                                </button>
                            </div>
                        </div>
                        <input class="right__body-btn-send create-btn-user" id="btnSubmit" type="submit" value="Actualizar curso">
                    </form>
                <?php }
            } else { ?>
                <div class="right__text info-create w100 df">
                    <h1>Crear curso</h1>
                    <p>
                        Como coordinador , podrás crear, editar
                        y eliminar cursos, además de realizar
                        una variedad de funciones más
                    </p>
                </div>
                <form id="createCourse" class="right__body form-user w100 df">
                    <div class="right__names df w100">
                        <div class="right__name-name">
                            <span>Grado</span>
                            <input type="text" placeholder="Grado Ej: 10" name="name" id="name">
                        </div>
                        <div class="right__name-lastname">
                            <span>Curso</span>
                            <input type="text" placeholder="Curso Ej: A" name="lastname" id="lastname">
                        </div>
                    </div>
                    <div class="right__names df w100">
                        <div class="right__jornada-div-btn w100">
                            <span>Jornada</span>
                            <div class="right__jornada df w100" style="margin-bottom: 0;">
                                <button class="right__jornada-btn off" style="padding: 1.4vh 3.5vw;" id="jor-btn-mañana" type="button" value="coor">
                                    <div class="right__jornada-cont df cxy"></div>
                                    <div>Mañana</div>
                                </button>
                                <button class="right__jornada-btn off" style="padding: 1.4vh 3.5vw;" id="jor-btn-tarde" type="button" value="aux">
                                    <div class="right__jornada-cont df cxy"></div>
                                    <div>Tarde<div>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="right__info df w100">
                        <div class="right__info-number">
                            <span>Alumnos</span>
                            <input type="number" maxlength="10" placeholder="Alumnos" name="number" id="number">
                        </div>
                        <div class="right__info-email">
                            <span>Director</span>
                            <input type="text" placeholder="Nombre del director" name="email" id="email">
                        </div>
                    </div>
                    <input class="right__body-btn-send create-btn-user" id="btnSubmit" type="submit" value="Crear curso">
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