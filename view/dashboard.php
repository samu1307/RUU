<?php

    require_once('../models/login.model.php');
    require_once('../controllers/dashboard.controller.php');

    $query = new ControllerCRUD();
    $coorDates = $query->show("v_userCoordinador");
    $auxDates = $query->show("v_userAuxiliar");
    $snacksDates = $query->show("refrigerio");
    $coursesDates = $query->show("curso");

    $mLogin = new LoginModel();
    $mLogin->validateSession();

    /* Incluir Head */
    $tittle =  'Panel de control';
    $urlJs =  './js/dashboard.js';
    $urlCss =  './css/main.css';
    $icon = 1;
    include('./templates.php/head-page.php'); 

?>
<body id="body-dash">
    <div class="body-db-users body-db df cxy" data-id="userMenu">
        <header id="header-db-users" class="header-db">
            <div id="menu-icon-div" class="df">
                <i id="users" class='menu-icon la la-bars' ></i>
                <a id="plus-icon-div" class="df cxy" href="./views.dashboard/createusers.php">
                    <i class="las la-plus c-white"></i>
                </a>
            </div>
            <div id="search" class="head-users df cxy">
                <h3>Usuarios</h3>
                <div class="header-db-search df">
                    <input type="search" id="search-element" placeholder="Busca usuarios">
                    <button class="df cxy h100">
                        <i class="las la-search c-white"></i>
                    </button>
                </div>   
            </div>   
        </header>
        <main id="main-db-users">
            <section class="section-user">
                <div class="section-coor deploy-coors df">
                    <div class="section-coor-btn w100 df">
                        <span>Coordinadores</span>
                        <div></div>
                        <button id="deploy-coor" class="df cxy">
                            <i class="las la-chevron-right c-black"></i>
                        </button>
                    </div>
                    <div class="cont-db-main-card df">
                    <?php $i = 1;
                    if($coorDates != false){
                    foreach ($coorDates as $date) {;
                        if($date['nombre'] != 'ADMIN'){?>
                        <div id="<?php echo $i; ?>" class="db-main-card df" data-name="<?php echo $date['nombre']." ".$date['apellido']; ?>">
                            <div class="main-card-cont">
                                <div class="main-card-cont-first df">
                                    <div class="cont-main-card-img df cxy">
                                        <div class="main-card-img">
                                            <img src="./img/iconuser1.png" alt="Iconos de usuario">
                                        </div>
                                        <p><?= $date['rol'] ?></p>
                                    </div>
                                    <div class="cont-main-card-descri df">
                                        <div class="main-card-descri">
                                            <div><?= $date['nombre'] ?> <?= $date['apellido'] ?></div>
                                        </div>
                                        <div class="main-card-info df" id="dn-card">
                                            <span>Jornada:</span>
                                            <div><?= ($date['jornada'] == 'M')? 'Mañana': 'Tarde'; ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-card-cont-second">
                                    <div class="main-card-email df w100">
                                        <span>Correo</span>
                                        <div><?= $date['correo'] ?></div>
                                    </div>
                                    <div class="main-card-number-user df w100">
                                        <div class="main-card-number w100">
                                            <span>Telefono</span>
                                            <div><?= $date['telefono'] ?></div>
                                        </div>
                                        <div class="main-card-user w100">
                                            <span>Usuario</span>
                                            <div><?= $date['user'] ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-card-btn df">
                                    <a href="./views.dashboard/createusers.php?id=<?= $date[0] ?>" class="card-btn-edit df cxy">
                                        <i class="las la-pen c-black"></i>
                                    </a>
                                    <button id="<?php echo $i; ?>" class="view-more df cxy">
                                        <i class="las la-angle-down c-black"></i>
                                    </button>
                                    <button class="card-btn-delete df cxy">
                                        <i class="las la-times c-black"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="line-active-user <?= ($date['estado'] == 'A')? 'user-active': 'user-inactive';?> h100"></div>
                        </div>
                        <?php $i = $i + 1; }}}else echo "ERROR: No se pudo iniciar." ?>
                    </div>
                </div>
                <div class="section-aux df">
                    <div class="section-aux-btn w100 df">
                        <span>Auxiliares</span>
                        <div></div>
                        <button id="deploy-aux" class="df cxy">
                            <i class="las la-chevron-right c-black"></i>
                        </button>
                    </div>
                    <div class="cont-db-main-card df">
                    <?php $i = 1.1; 
                    if($auxDates != false){
                    foreach ($auxDates as $date) { ?>
                        <div id="<?php echo $i; ?>" class="db-main-card df" data-name="<?php echo $date['nombre']." ".$date['apellido']; ?>">
                            <div class="main-card-cont">
                                <div class="main-card-cont-first df">
                                    <div class="cont-main-card-img df cxy">
                                        <div class="main-card-img">
                                            <img src="./img/iconuser1.png" alt="Iconos de usuario">
                                        </div>
                                        <p><?= $date['rol'] ?></p>
                                    </div>
                                    <div class="cont-main-card-descri df">
                                        <div class="main-card-descri">
                                            <div><?= $date['nombre'] ?><br><?= $date['apellido'] ?></div>
                                        </div>
                                        <div class="main-card-info df" id="dn-card">
                                            <span>Jornada:</span>
                                            <div><?= ($date['jornada'] == 'M')? 'Mañana': 'Tarde'; ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-card-cont-second">
                                    <div class="main-card-email df w100">
                                        <span>Correo:</span>
                                        <div><?= $date['correo'] ?></div>
                                    </div>
                                    <div class="main-card-number-user df w100">
                                        <div class="main-card-number w100">
                                            <span>Telefono</span>
                                            <div><?= $date['telefono'] ?></div>
                                        </div>
                                        <div class="main-card-user w100">
                                            <span>Usuario</span>
                                            <div><?= $date['user'] ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-card-btn df">
                                    <a href="./views.dashboard/createusers.php?id=<?= $date[0] ?>" class="card-btn-edit df cxy">
                                        <i class="las la-pen c-black"></i>
                                    </a>
                                    <button id="<?php echo $i; ?>" class="view-more df cxy">
                                        <i class="las la-angle-down c-black"></i>
                                    </button>
                                    <button class="card-btn-delete df cxy">
                                        <i class="las la-times c-black"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="line-active-user <?= ($date['estado'] == 'A')? 'user-active': 'user-inactive';?> h100"></div>
                        </div>
                    <?php $i = $i + 1; }}else echo "ERROR: No se pudo iniciar." ?>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <div class="body-db-courses body-db df cxy" data-id="coursesMenu">
        <header id="header-db-courses" class="header-db">
            <div id="menu-icon-div" class="df">
                <i class="menu-icon las la-bars" id="courses"></i>
                <a id="plus-icon-div" class="df" href="./views.dashboard/createcourses.php">
                    <i class="las la-plus"></i>
                </a>
            </div>
            <div id="search" class="head-courses df cxy">
                <h3>Cursos</h3>
                <div class="header-db-search df">
                <input type="text" placeholder="Busca cursos">
                <button class="df cxy">
                    <i class="las la-search"></i>
                </button>
            </div>   
        </header>
        <main id="main-db-users">
            <section class="section-user">
                <?php if($coursesDates != false){
                foreach ($coursesDates as $date) { ?>
                    <div class="db-main-card df cxy">
                        <div class="main-card-img">
                            <img src="./img/iconuser1.png" alt="Iconos de usuario">
                        </div>
                        <div class="main-card-descri">
                            <h3><?= $date["grado"]; ?>-<?= $date["curso"]; ?></h3>
                            <p>Jornada <?= $date["jornada"]; ?></p>
                        </div>
                        <div class="switch-button" id="dn-card">
                            <input type="checkbox" name="switch-button" id="switch-label" class="switch-button__checkbox">
                            <label for="switch-label" class="switch-button__label"></label>
                        </div>
                        <div class="main-card-info" id="dn-card">
                            <h5><?= $date["cantAlumnos"];?> Alumnos</h5>
                            <p><?= $date["profesor"]; ?></p>
                        </div>
                        <div class="main-card-btn df">
                            <a href="./views.dashboard/createcourse.php?id=<?= $date[0]; ?>" class="card-btn-edit df cxy">
                                <i class="las la-pen"></i>
                            </a>
                            <div class="card-btn-delete df cxy">
                                <i class="las la-times"></i>
                            </div>
                        </div>
                    </div>
                <?php }}else echo "ERROR: No se pudo iniciar." ?>
            </section>
        </main>
    </div>
    <div class="body-db-snacks body-db df cxy" data-id="snacksMenu">
        <header id="header-db-snacks" class="header-db">
            <div id="menu-icon-div" class="df">
                <i class="menu-icon las la-bars" id="snacks"></i>
                <a id="plus-icon-div" class="df" href="./views.dashboard/createsnacks.php">
                    <i class="las la-plus" id="users-plus"></i>
                </a>
            </div>
            <div id="search" class="head-snacks df cxy">
                <h3>Refrigerios</h3>
                <div class="header-db-search df">
                <input type="text" placeholder="Busca refrigerios">
                <button class="df cxy">
                    <i class="las la-search"></i>
                </button>
            </div>   
        </header>
        <main id="main-db-courses">
            <section class="section-user">
                <?php if($snacksDates != false){
                foreach ($snacksDates as $date) { ?>
                    <div class="db-main-card df cxy">
                        <div class="main-card-descri m10">
                            <h3>Tipo <?= $date["tipo"] ?></h3>
                            <p><?= $date["descripcion"] ?></p>
                        </div>
                        <div class="switch-button">
                            <input type="checkbox" name="switch-button" id="switch-label" class="switch-button__checkbox">
                            <label for="switch-label" class="switch-button__label"></label>
                        </div>
                        <div class="main-card-info">
                            <h5><?= $date["fecha"];?></h5>
                            <p><?= $date["hora"];?></p>
                        </div>
                        <div class="main-card-btn m-10 df">
                            <a href="./views.dashboard/createsnacks.php?id=<?= $date[0]; ?>" class="card-btn-edit df cxy">
                                <i class="las la-pen"></i>
                            </a>
                            <div class="card-btn-delete df cxy">
                                <i class="las la-pen"></i>
                            </div>
                        </div>
                    </div>
                <?php }}else echo "ERROR: No se pudo iniciar." ?>
            </section>
        </main>
    </div>
    <div class="body-db-profile body-db df cxy" data-id="profileMenu">
        <header id="header-db-profile" class="header-db">
            <div id="menu-icon-div" class="df">
                <i class="menu-icon las la-bars" id="profile"></i>
                <a id="plus-icon-div" class="df" href="./views.dashboard/createsnacks.php">
                    <i class="las la-plus" id="users-plus"></i>
                </a>
            </div>
            <div id="search" class="head-profile df cxy">
                <h3>Perfil</h3>
                <div class="header-db-search df">
                <input type="text" placeholder="Busca usuarios, refrigerios y cursos...">
                <button class="df cxy">
                    <i class="las la-search"></i>
                </button>
            </div>   
        </header>
        <main id="main-db-users">
            <section class="section-user">
                <div class="db-main-card card-close df cxy">
                    <div class="main-card-img">
                        <img src="./img/iconuser1.png" alt="Iconos de usuario">
                    </div>
                    <div class="main-card-descri">
                        <h3>Juan Carlos</h3>
                        <p>Coordinador</p>
                    </div>
                    <div class="switch-button" id="dn-card">
                        <input type="checkbox" name="switch-button" id="switch-label" class="switch-button__checkbox">
                        <label for="switch-label" class="switch-button__label"></label>
                    </div>
                    <div class="main-card-info" id="dn-card">
                        <h5>juancan@gmail.com</h5>
                        <p>3126473935</p>
                    </div>
                    <div class="main-card-btn df">
                        <div class="card-btn-edit df cxy">
                            <i class="las la-plus"></i>
                        </div>
                        <div class="card-btn-delete df cxy">
                            <i class="las la-plus"></i>
                        </div>
                    </div>
                </div>
                <div class="db-main-card df cxy">
                    <div class="main-card-img">
                        <img src="./img/iconuser1.png" alt="Iconos de usuario">
                    </div>
                    <div class="main-card-descri">
                        <h3>Juan Carlos</h3>
                        <p>Coordinador</p>
                    </div>
                    <div class="switch-button" id="dn-card">
                        <input type="checkbox" name="switch-button" id="switch-label" class="switch-button__checkbox">
                        <label for="switch-label" class="switch-button__label"></label>
                    </div>
                    <div class="main-card-info" id="dn-card">
                        <h5>juancan@gmail.com</h5>
                        <p>3126473935</p>
                    </div>
                    <div class="main-card-btn df">
                        <div class="card-btn-edit df cxy">
                            <svg width="25" heigth="25" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <style>.cls-1{fill:#1E222F;}</style>
                                </defs>
                                <g data-name="Layer 42" id="Layer_42">
                                    <path class="cls-1" d="M2,29a1,1,0,0,1-1-1.11l.77-7a1,1,0,0,1,.29-.59L18.42,3.94a3.2,3.2,0,0,1,4.53,0l3.11,3.11a3.2,3.2,0,0,1,0,4.53L9.71,27.93a1,1,0,0,1-.59.29l-7,.77Zm7-1.78H9ZM3.73,21.45l-.6,5.42,5.42-.6,16.1-16.1a1.2,1.2,0,0,0,0-1.7L21.53,5.35a1.2,1.2,0,0,0-1.7,0Z"/>
                                    <path class="cls-1" d="M23,14.21a1,1,0,0,1-.71-.29L16.08,7.69A1,1,0,0,1,17.5,6.27l6.23,6.23a1,1,0,0,1,0,1.42A1,1,0,0,1,23,14.21Z"/>
                                    <rect class="cls-1" height="2" transform="translate(-8.31 14.13) rotate(-45)" width="11.01" x="7.39" y="16.1"/>
                                </g>
                            </svg>
                        </div>
                        <div class="card-btn-delete df cxy">
                            <svg width="30" heigth="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="22.4247" y1="21.7174" x2="8.28256" y2="7.57526" stroke="#1E222F" stroke-width="3"/>
                                <line x1="8.2826" y1="22.4247" x2="22.4247" y2="8.28256" stroke="#1E222F" stroke-width="3"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="db-main-card card-close df cxy">
                    <div class="main-card-img">
                        <img src="./img/iconuser1.png" alt="Iconos de usuario">
                    </div>
                    <div class="main-card-descri">
                        <h3>Juan Carlos</h3>
                        <p>Coordinador</p>
                    </div>
                    <div class="switch-button" id="dn-card">
                        <input type="checkbox" name="switch-button" id="switch-label" class="switch-button__checkbox">
                        <label for="switch-label" class="switch-button__label"></label>
                    </div>
                    <div class="main-card-info" id="dn-card">
                        <h5>juancan@gmail.com</h5>
                        <p>3126473935</p>
                    </div>
                    <div class="main-card-btn df">
                        <div class="card-btn-edit df cxy">
                            <svg width="25" heigth="25" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <style>.cls-1{fill:#1E222F;}</style>
                                </defs>
                                <g data-name="Layer 42" id="Layer_42">
                                    <path class="cls-1" d="M2,29a1,1,0,0,1-1-1.11l.77-7a1,1,0,0,1,.29-.59L18.42,3.94a3.2,3.2,0,0,1,4.53,0l3.11,3.11a3.2,3.2,0,0,1,0,4.53L9.71,27.93a1,1,0,0,1-.59.29l-7,.77Zm7-1.78H9ZM3.73,21.45l-.6,5.42,5.42-.6,16.1-16.1a1.2,1.2,0,0,0,0-1.7L21.53,5.35a1.2,1.2,0,0,0-1.7,0Z"/>
                                    <path class="cls-1" d="M23,14.21a1,1,0,0,1-.71-.29L16.08,7.69A1,1,0,0,1,17.5,6.27l6.23,6.23a1,1,0,0,1,0,1.42A1,1,0,0,1,23,14.21Z"/>
                                    <rect class="cls-1" height="2" transform="translate(-8.31 14.13) rotate(-45)" width="11.01" x="7.39" y="16.1"/>
                                </g>
                            </svg>
                        </div>
                        <div class="card-btn-delete df cxy">
                            <svg width="30" heigth="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="22.4247" y1="21.7174" x2="8.28256" y2="7.57526" stroke="#1E222F" stroke-width="3"/>
                                <line x1="8.2826" y1="22.4247" x2="22.4247" y2="8.28256" stroke="#1E222F" stroke-width="3"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="db-main-card card-close df cxy">
                    <div class="main-card-img">
                        <img src="./img/iconuser1.png" alt="Iconos de usuario">
                    </div>
                    <div class="main-card-descri">
                        <h3>Juan Carlos</h3>
                        <p>Coordinador</p>
                    </div>
                    <div class="switch-button" id="dn-card">
                        <input type="checkbox" name="switch-button" id="switch-label" class="switch-button__checkbox">
                        <label for="switch-label" class="switch-button__label"></label>
                    </div>
                    <div class="main-card-info" id="dn-card">
                        <h5>juancan@gmail.com</h5>
                        <p>3126473935</p>
                    </div>
                    <div class="main-card-btn df">
                        <div class="card-btn-edit df cxy">
                            <svg width="25" heigth="25" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <style>.cls-1{fill:#1E222F;}</style>
                                </defs>
                                <g data-name="Layer 42" id="Layer_42">
                                    <path class="cls-1" d="M2,29a1,1,0,0,1-1-1.11l.77-7a1,1,0,0,1,.29-.59L18.42,3.94a3.2,3.2,0,0,1,4.53,0l3.11,3.11a3.2,3.2,0,0,1,0,4.53L9.71,27.93a1,1,0,0,1-.59.29l-7,.77Zm7-1.78H9ZM3.73,21.45l-.6,5.42,5.42-.6,16.1-16.1a1.2,1.2,0,0,0,0-1.7L21.53,5.35a1.2,1.2,0,0,0-1.7,0Z"/>
                                    <path class="cls-1" d="M23,14.21a1,1,0,0,1-.71-.29L16.08,7.69A1,1,0,0,1,17.5,6.27l6.23,6.23a1,1,0,0,1,0,1.42A1,1,0,0,1,23,14.21Z"/>
                                    <rect class="cls-1" height="2" transform="translate(-8.31 14.13) rotate(-45)" width="11.01" x="7.39" y="16.1"/>
                                </g>
                            </svg>
                        </div>
                        <div class="card-btn-delete df cxy">
                            <svg width="30" heigth="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="22.4247" y1="21.7174" x2="8.28256" y2="7.57526" stroke="#1E222F" stroke-width="3"/>
                                <line x1="8.2826" y1="22.4247" x2="22.4247" y2="8.28256" stroke="#1E222F" stroke-width="3"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="db-main-card card-close df cxy">
                    <div class="main-card-img">
                        <img src="./img/iconuser1.png" alt="Iconos de usuario">
                    </div>
                    <div class="main-card-descri">
                        <h3>Juan Carlos</h3>
                        <p>Coordinador</p>
                    </div>
                    <div class="switch-button" id="dn-card">
                        <input type="checkbox" name="switch-button" id="switch-label" class="switch-button__checkbox">
                        <label for="switch-label" class="switch-button__label"></label>
                    </div>
                    <div class="main-card-info" id="dn-card">
                        <h5>juancan@gmail.com</h5>
                        <p>3126473935</p>
                    </div>
                    <div class="main-card-btn df">
                        <div class="card-btn-edit df cxy">
                            <svg width="25" heigth="25" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <style>.cls-1{fill:#1E222F;}</style>
                                </defs>
                                <g data-name="Layer 42" id="Layer_42">
                                    <path class="cls-1" d="M2,29a1,1,0,0,1-1-1.11l.77-7a1,1,0,0,1,.29-.59L18.42,3.94a3.2,3.2,0,0,1,4.53,0l3.11,3.11a3.2,3.2,0,0,1,0,4.53L9.71,27.93a1,1,0,0,1-.59.29l-7,.77Zm7-1.78H9ZM3.73,21.45l-.6,5.42,5.42-.6,16.1-16.1a1.2,1.2,0,0,0,0-1.7L21.53,5.35a1.2,1.2,0,0,0-1.7,0Z"/>
                                    <path class="cls-1" d="M23,14.21a1,1,0,0,1-.71-.29L16.08,7.69A1,1,0,0,1,17.5,6.27l6.23,6.23a1,1,0,0,1,0,1.42A1,1,0,0,1,23,14.21Z"/>
                                    <rect class="cls-1" height="2" transform="translate(-8.31 14.13) rotate(-45)" width="11.01" x="7.39" y="16.1"/>
                                </g>
                            </svg>
                        </div>
                        <div class="card-btn-delete df cxy">
                            <svg width="30" heigth="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="22.4247" y1="21.7174" x2="8.28256" y2="7.57526" stroke="#1E222F" stroke-width="3"/>
                                <line x1="8.2826" y1="22.4247" x2="22.4247" y2="8.28256" stroke="#1E222F" stroke-width="3"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section-refri">
                <div class="db-main-card card-close df cxy">
                    <div class="main-card-descri m10">
                        <h3>Tipo A</h3>
                        <p>Jugo, pan, banano, granola</p>
                    </div>
                    <div class="switch-button" id="dn-card">
                        <input type="checkbox" name="switch-button" id="switch-label" class="switch-button__checkbox">
                        <label for="switch-label" class="switch-button__label"></label>
                    </div>
                    <div class="main-card-info" id="dn-card">
                        <h5>22-04-2022</h5>
                        <p>13:06</p>
                    </div>
                    <div class="main-card-btn df m-10">
                        <div class="card-btn-edit df cxy">
                            <svg width="25" heigth="25" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <style>.cls-1{fill:#1E222F;}</style>
                                </defs>
                                <g data-name="Layer 42" id="Layer_42">
                                    <path class="cls-1" d="M2,29a1,1,0,0,1-1-1.11l.77-7a1,1,0,0,1,.29-.59L18.42,3.94a3.2,3.2,0,0,1,4.53,0l3.11,3.11a3.2,3.2,0,0,1,0,4.53L9.71,27.93a1,1,0,0,1-.59.29l-7,.77Zm7-1.78H9ZM3.73,21.45l-.6,5.42,5.42-.6,16.1-16.1a1.2,1.2,0,0,0,0-1.7L21.53,5.35a1.2,1.2,0,0,0-1.7,0Z"/>
                                    <path class="cls-1" d="M23,14.21a1,1,0,0,1-.71-.29L16.08,7.69A1,1,0,0,1,17.5,6.27l6.23,6.23a1,1,0,0,1,0,1.42A1,1,0,0,1,23,14.21Z"/>
                                    <rect class="cls-1" height="2" transform="translate(-8.31 14.13) rotate(-45)" width="11.01" x="7.39" y="16.1"/>
                                </g>
                            </svg>
                        </div>
                        <div class="card-btn-delete df cxy">
                            <svg width="30" heigth="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="22.4247" y1="21.7174" x2="8.28256" y2="7.57526" stroke="#1E222F" stroke-width="3"/>
                                <line x1="8.2826" y1="22.4247" x2="22.4247" y2="8.28256" stroke="#1E222F" stroke-width="3"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="db-main-card df cxy">
                    <div class="main-card-descri m10">
                        <h3>Tipo A</h3>
                        <p>Jugo, pan, banano, granola</p>
                    </div>
                    <div class="switch-button">
                        <input type="checkbox" name="switch-button" id="switch-label" class="switch-button__checkbox">
                        <label for="switch-label" class="switch-button__label"></label>
                    </div>
                    <div class="main-card-info">
                        <h5>22-04-2022</h5>
                        <p>13:06</p>
                    </div>
                    <div class="main-card-btn m-10 df">
                        <div class="card-btn-edit df cxy">
                            <svg width="25" heigth="25" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <style>.cls-1{fill:#1E222F;}</style>
                                </defs>
                                <g data-name="Layer 42" id="Layer_42">
                                    <path class="cls-1" d="M2,29a1,1,0,0,1-1-1.11l.77-7a1,1,0,0,1,.29-.59L18.42,3.94a3.2,3.2,0,0,1,4.53,0l3.11,3.11a3.2,3.2,0,0,1,0,4.53L9.71,27.93a1,1,0,0,1-.59.29l-7,.77Zm7-1.78H9ZM3.73,21.45l-.6,5.42,5.42-.6,16.1-16.1a1.2,1.2,0,0,0,0-1.7L21.53,5.35a1.2,1.2,0,0,0-1.7,0Z"/>
                                    <path class="cls-1" d="M23,14.21a1,1,0,0,1-.71-.29L16.08,7.69A1,1,0,0,1,17.5,6.27l6.23,6.23a1,1,0,0,1,0,1.42A1,1,0,0,1,23,14.21Z"/>
                                    <rect class="cls-1" height="2" transform="translate(-8.31 14.13) rotate(-45)" width="11.01" x="7.39" y="16.1"/>
                                </g>
                            </svg>
                        </div>
                        <div class="card-btn-delete df cxy">
                            <svg width="30" heigth="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="22.4247" y1="21.7174" x2="8.28256" y2="7.57526" stroke="#1E222F" stroke-width="3"/>
                                <line x1="8.2826" y1="22.4247" x2="22.4247" y2="8.28256" stroke="#1E222F" stroke-width="3"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="db-main-card card-close df cxy">
                    <div class="main-card-descri m10">
                        <h3>Tipo A</h3>
                        <p>Jugo, pan, banano, granola</p>
                    </div>
                    <div class="switch-button" id="dn-card">
                        <input type="checkbox" name="switch-button" id="switch-label" class="switch-button__checkbox">
                        <label for="switch-label" class="switch-button__label"></label>
                    </div>
                    <div class="main-card-info" id="dn-card">
                        <h5>22-04-2022</h5>
                        <p>13:06</p>
                    </div>
                    <div class="main-card-btn df m-10">
                        <div class="card-btn-edit df cxy">
                            <svg width="25" heigth="25" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <style>.cls-1{fill:#1E222F;}</style>
                                </defs>
                                <g data-name="Layer 42" id="Layer_42">
                                    <path class="cls-1" d="M2,29a1,1,0,0,1-1-1.11l.77-7a1,1,0,0,1,.29-.59L18.42,3.94a3.2,3.2,0,0,1,4.53,0l3.11,3.11a3.2,3.2,0,0,1,0,4.53L9.71,27.93a1,1,0,0,1-.59.29l-7,.77Zm7-1.78H9ZM3.73,21.45l-.6,5.42,5.42-.6,16.1-16.1a1.2,1.2,0,0,0,0-1.7L21.53,5.35a1.2,1.2,0,0,0-1.7,0Z"/>
                                    <path class="cls-1" d="M23,14.21a1,1,0,0,1-.71-.29L16.08,7.69A1,1,0,0,1,17.5,6.27l6.23,6.23a1,1,0,0,1,0,1.42A1,1,0,0,1,23,14.21Z"/>
                                    <rect class="cls-1" height="2" transform="translate(-8.31 14.13) rotate(-45)" width="11.01" x="7.39" y="16.1"/>
                                </g>
                            </svg>
                        </div>
                        <div class="card-btn-delete df cxy">
                            <svg width="30" heigth="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="22.4247" y1="21.7174" x2="8.28256" y2="7.57526" stroke="#1E222F" stroke-width="3"/>
                                <line x1="8.2826" y1="22.4247" x2="22.4247" y2="8.28256" stroke="#1E222F" stroke-width="3"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="db-main-card card-close df cxy">
                    <div class="main-card-descri m10">
                        <h3>Tipo A</h3>
                        <p>Jugo, pan, banano, granola</p>
                    </div>
                    <div class="switch-button" id="dn-card">
                        <input type="checkbox" name="switch-button" id="switch-label" class="switch-button__checkbox">
                        <label for="switch-label" class="switch-button__label"></label>
                    </div>
                    <div class="main-card-info" id="dn-card">
                        <h5>22-04-2022</h5>
                        <p>13:06</p>
                    </div>
                    <div class="main-card-btn df m-10">
                        <div class="card-btn-edit df cxy">
                            <svg width="25" heigth="25" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <style>.cls-1{fill:#1E222F;}</style>
                                </defs>
                                <g data-name="Layer 42" id="Layer_42">
                                    <path class="cls-1" d="M2,29a1,1,0,0,1-1-1.11l.77-7a1,1,0,0,1,.29-.59L18.42,3.94a3.2,3.2,0,0,1,4.53,0l3.11,3.11a3.2,3.2,0,0,1,0,4.53L9.71,27.93a1,1,0,0,1-.59.29l-7,.77Zm7-1.78H9ZM3.73,21.45l-.6,5.42,5.42-.6,16.1-16.1a1.2,1.2,0,0,0,0-1.7L21.53,5.35a1.2,1.2,0,0,0-1.7,0Z"/>
                                    <path class="cls-1" d="M23,14.21a1,1,0,0,1-.71-.29L16.08,7.69A1,1,0,0,1,17.5,6.27l6.23,6.23a1,1,0,0,1,0,1.42A1,1,0,0,1,23,14.21Z"/>
                                    <rect class="cls-1" height="2" transform="translate(-8.31 14.13) rotate(-45)" width="11.01" x="7.39" y="16.1"/>
                                </g>
                            </svg>
                        </div>
                        <div class="card-btn-delete df cxy">
                            <svg width="30" heigth="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="22.4247" y1="21.7174" x2="8.28256" y2="7.57526" stroke="#1E222F" stroke-width="3"/>
                                <line x1="8.2826" y1="22.4247" x2="22.4247" y2="8.28256" stroke="#1E222F" stroke-width="3"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <div class="body-db-report body-db df cxy" data-id="reportMenu">
        <header id="header-db-report" class="header-db">
            <div id="menu-icon-div" class="df">
                <i class="menu-icon las la-bars" id="report"></i>
                <a id="plus-icon-div" class="df" href="./views.dashboard/createsnacks.php">
                    <i class="las la-plus" id="users-plus"></i>
                </a>
            </div>
            <div id="search" class="head-report df cxy">
                <h3>Reporte</h3>
                <div class="header-db-search df">
                <input type="text" placeholder="Busca usuarios, refrigerios y cursos...">
                <button class="df cxy">
                    <i class="las la-search"></i>
                </button>
            </div>   
        </header>
        <main id="main-db-users">
            <section class="section-user">
                <div class="db-main-card card-close df cxy">
                    <div class="main-card-img">
                        <img src="./img/iconuser1.png" alt="Iconos de usuario">
                    </div>
                    <div class="main-card-descri">
                        <h3>Juan Carlos</h3>
                        <p>Coordinador</p>
                    </div>
                    <div class="switch-button" id="dn-card">
                        <input type="checkbox" name="switch-button" id="switch-label" class="switch-button__checkbox">
                        <label for="switch-label" class="switch-button__label"></label>
                    </div>
                    <div class="main-card-info" id="dn-card">
                        <h5>juancan@gmail.com</h5>
                        <p>3126473935</p>
                    </div>
                    <div class="main-card-btn df">
                        <div class="card-btn-edit df cxy">
                            <svg width="25" heigth="25" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <style>.cls-1{fill:#1E222F;}</style>
                                </defs>
                                <g data-name="Layer 42" id="Layer_42">
                                    <path class="cls-1" d="M2,29a1,1,0,0,1-1-1.11l.77-7a1,1,0,0,1,.29-.59L18.42,3.94a3.2,3.2,0,0,1,4.53,0l3.11,3.11a3.2,3.2,0,0,1,0,4.53L9.71,27.93a1,1,0,0,1-.59.29l-7,.77Zm7-1.78H9ZM3.73,21.45l-.6,5.42,5.42-.6,16.1-16.1a1.2,1.2,0,0,0,0-1.7L21.53,5.35a1.2,1.2,0,0,0-1.7,0Z"/>
                                    <path class="cls-1" d="M23,14.21a1,1,0,0,1-.71-.29L16.08,7.69A1,1,0,0,1,17.5,6.27l6.23,6.23a1,1,0,0,1,0,1.42A1,1,0,0,1,23,14.21Z"/>
                                    <rect class="cls-1" height="2" transform="translate(-8.31 14.13) rotate(-45)" width="11.01" x="7.39" y="16.1"/>
                                </g>
                            </svg>
                        </div>
                        <div class="card-btn-delete df cxy">
                            <svg width="30" heigth="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="22.4247" y1="21.7174" x2="8.28256" y2="7.57526" stroke="#1E222F" stroke-width="3"/>
                                <line x1="8.2826" y1="22.4247" x2="22.4247" y2="8.28256" stroke="#1E222F" stroke-width="3"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="db-main-card df cxy">
                    <div class="main-card-img">
                        <img src="./img/iconuser1.png" alt="Iconos de usuario">
                    </div>
                    <div class="main-card-descri">
                        <h3>Juan Carlos</h3>
                        <p>Coordinador</p>
                    </div>
                    <div class="switch-button" id="dn-card">
                        <input type="checkbox" name="switch-button" id="switch-label" class="switch-button__checkbox">
                        <label for="switch-label" class="switch-button__label"></label>
                    </div>
                    <div class="main-card-info" id="dn-card">
                        <h5>juancan@gmail.com</h5>
                        <p>3126473935</p>
                    </div>
                    <div class="main-card-btn df">
                        <div class="card-btn-edit df cxy">
                            <svg width="25" heigth="25" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <style>.cls-1{fill:#1E222F;}</style>
                                </defs>
                                <g data-name="Layer 42" id="Layer_42">
                                    <path class="cls-1" d="M2,29a1,1,0,0,1-1-1.11l.77-7a1,1,0,0,1,.29-.59L18.42,3.94a3.2,3.2,0,0,1,4.53,0l3.11,3.11a3.2,3.2,0,0,1,0,4.53L9.71,27.93a1,1,0,0,1-.59.29l-7,.77Zm7-1.78H9ZM3.73,21.45l-.6,5.42,5.42-.6,16.1-16.1a1.2,1.2,0,0,0,0-1.7L21.53,5.35a1.2,1.2,0,0,0-1.7,0Z"/>
                                    <path class="cls-1" d="M23,14.21a1,1,0,0,1-.71-.29L16.08,7.69A1,1,0,0,1,17.5,6.27l6.23,6.23a1,1,0,0,1,0,1.42A1,1,0,0,1,23,14.21Z"/>
                                    <rect class="cls-1" height="2" transform="translate(-8.31 14.13) rotate(-45)" width="11.01" x="7.39" y="16.1"/>
                                </g>
                            </svg>
                        </div>
                        <div class="card-btn-delete df cxy">
                            <svg width="30" heigth="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="22.4247" y1="21.7174" x2="8.28256" y2="7.57526" stroke="#1E222F" stroke-width="3"/>
                                <line x1="8.2826" y1="22.4247" x2="22.4247" y2="8.28256" stroke="#1E222F" stroke-width="3"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="db-main-card card-close df cxy">
                    <div class="main-card-img">
                        <img src="./img/iconuser1.png" alt="Iconos de usuario">
                    </div>
                    <div class="main-card-descri">
                        <h3>Juan Carlos</h3>
                        <p>Coordinador</p>
                    </div>
                    <div class="switch-button" id="dn-card">
                        <input type="checkbox" name="switch-button" id="switch-label" class="switch-button__checkbox">
                        <label for="switch-label" class="switch-button__label"></label>
                    </div>
                    <div class="main-card-info" id="dn-card">
                        <h5>juancan@gmail.com</h5>
                        <p>3126473935</p>
                    </div>
                    <div class="main-card-btn df">
                        <div class="card-btn-edit df cxy">
                            <svg width="25" heigth="25" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <style>.cls-1{fill:#1E222F;}</style>
                                </defs>
                                <g data-name="Layer 42" id="Layer_42">
                                    <path class="cls-1" d="M2,29a1,1,0,0,1-1-1.11l.77-7a1,1,0,0,1,.29-.59L18.42,3.94a3.2,3.2,0,0,1,4.53,0l3.11,3.11a3.2,3.2,0,0,1,0,4.53L9.71,27.93a1,1,0,0,1-.59.29l-7,.77Zm7-1.78H9ZM3.73,21.45l-.6,5.42,5.42-.6,16.1-16.1a1.2,1.2,0,0,0,0-1.7L21.53,5.35a1.2,1.2,0,0,0-1.7,0Z"/>
                                    <path class="cls-1" d="M23,14.21a1,1,0,0,1-.71-.29L16.08,7.69A1,1,0,0,1,17.5,6.27l6.23,6.23a1,1,0,0,1,0,1.42A1,1,0,0,1,23,14.21Z"/>
                                    <rect class="cls-1" height="2" transform="translate(-8.31 14.13) rotate(-45)" width="11.01" x="7.39" y="16.1"/>
                                </g>
                            </svg>
                        </div>
                        <div class="card-btn-delete df cxy">
                            <svg width="30" heigth="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="22.4247" y1="21.7174" x2="8.28256" y2="7.57526" stroke="#1E222F" stroke-width="3"/>
                                <line x1="8.2826" y1="22.4247" x2="22.4247" y2="8.28256" stroke="#1E222F" stroke-width="3"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="db-main-card card-close df cxy">
                    <div class="main-card-img">
                        <img src="./img/iconuser1.png" alt="Iconos de usuario">
                    </div>
                    <div class="main-card-descri">
                        <h3>Juan Carlos</h3>
                        <p>Coordinador</p>
                    </div>
                    <div class="switch-button" id="dn-card">
                        <input type="checkbox" name="switch-button" id="switch-label" class="switch-button__checkbox">
                        <label for="switch-label" class="switch-button__label"></label>
                    </div>
                    <div class="main-card-info" id="dn-card">
                        <h5>juancan@gmail.com</h5>
                        <p>3126473935</p>
                    </div>
                    <div class="main-card-btn df">
                        <div class="card-btn-edit df cxy">
                            <svg width="25" heigth="25" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <style>.cls-1{fill:#1E222F;}</style>
                                </defs>
                                <g data-name="Layer 42" id="Layer_42">
                                    <path class="cls-1" d="M2,29a1,1,0,0,1-1-1.11l.77-7a1,1,0,0,1,.29-.59L18.42,3.94a3.2,3.2,0,0,1,4.53,0l3.11,3.11a3.2,3.2,0,0,1,0,4.53L9.71,27.93a1,1,0,0,1-.59.29l-7,.77Zm7-1.78H9ZM3.73,21.45l-.6,5.42,5.42-.6,16.1-16.1a1.2,1.2,0,0,0,0-1.7L21.53,5.35a1.2,1.2,0,0,0-1.7,0Z"/>
                                    <path class="cls-1" d="M23,14.21a1,1,0,0,1-.71-.29L16.08,7.69A1,1,0,0,1,17.5,6.27l6.23,6.23a1,1,0,0,1,0,1.42A1,1,0,0,1,23,14.21Z"/>
                                    <rect class="cls-1" height="2" transform="translate(-8.31 14.13) rotate(-45)" width="11.01" x="7.39" y="16.1"/>
                                </g>
                            </svg>
                        </div>
                        <div class="card-btn-delete df cxy">
                            <svg width="30" heigth="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="22.4247" y1="21.7174" x2="8.28256" y2="7.57526" stroke="#1E222F" stroke-width="3"/>
                                <line x1="8.2826" y1="22.4247" x2="22.4247" y2="8.28256" stroke="#1E222F" stroke-width="3"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="db-main-card card-close df cxy">
                    <div class="main-card-img">
                        <img src="./img/iconuser1.png" alt="Iconos de usuario">
                    </div>
                    <div class="main-card-descri">
                        <h3>Juan Carlos</h3>
                        <p>Coordinador</p>
                    </div>
                    <div class="switch-button" id="dn-card">
                        <input type="checkbox" name="switch-button" id="switch-label" class="switch-button__checkbox">
                        <label for="switch-label" class="switch-button__label"></label>
                    </div>
                    <div class="main-card-info" id="dn-card">
                        <h5>juancan@gmail.com</h5>
                        <p>3126473935</p>
                    </div>
                    <div class="main-card-btn df">
                        <div class="card-btn-edit df cxy">
                            <svg width="25" heigth="25" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <style>.cls-1{fill:#1E222F;}</style>
                                </defs>
                                <g data-name="Layer 42" id="Layer_42">
                                    <path class="cls-1" d="M2,29a1,1,0,0,1-1-1.11l.77-7a1,1,0,0,1,.29-.59L18.42,3.94a3.2,3.2,0,0,1,4.53,0l3.11,3.11a3.2,3.2,0,0,1,0,4.53L9.71,27.93a1,1,0,0,1-.59.29l-7,.77Zm7-1.78H9ZM3.73,21.45l-.6,5.42,5.42-.6,16.1-16.1a1.2,1.2,0,0,0,0-1.7L21.53,5.35a1.2,1.2,0,0,0-1.7,0Z"/>
                                    <path class="cls-1" d="M23,14.21a1,1,0,0,1-.71-.29L16.08,7.69A1,1,0,0,1,17.5,6.27l6.23,6.23a1,1,0,0,1,0,1.42A1,1,0,0,1,23,14.21Z"/>
                                    <rect class="cls-1" height="2" transform="translate(-8.31 14.13) rotate(-45)" width="11.01" x="7.39" y="16.1"/>
                                </g>
                            </svg>
                        </div>
                        <div class="card-btn-delete df cxy">
                            <svg width="30" heigth="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="22.4247" y1="21.7174" x2="8.28256" y2="7.57526" stroke="#1E222F" stroke-width="3"/>
                                <line x1="8.2826" y1="22.4247" x2="22.4247" y2="8.28256" stroke="#1E222F" stroke-width="3"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section-refri">
                <div class="db-main-card card-close df cxy">
                    <div class="main-card-descri m10">
                        <h3>Tipo A</h3>
                        <p>Jugo, pan, banano, granola</p>
                    </div>
                    <div class="switch-button" id="dn-card">
                        <input type="checkbox" name="switch-button" id="switch-label" class="switch-button__checkbox">
                        <label for="switch-label" class="switch-button__label"></label>
                    </div>
                    <div class="main-card-info" id="dn-card">
                        <h5>22-04-2022</h5>
                        <p>13:06</p>
                    </div>
                    <div class="main-card-btn df m-10">
                        <div class="card-btn-edit df cxy">
                            <svg width="25" heigth="25" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <style>.cls-1{fill:#1E222F;}</style>
                                </defs>
                                <g data-name="Layer 42" id="Layer_42">
                                    <path class="cls-1" d="M2,29a1,1,0,0,1-1-1.11l.77-7a1,1,0,0,1,.29-.59L18.42,3.94a3.2,3.2,0,0,1,4.53,0l3.11,3.11a3.2,3.2,0,0,1,0,4.53L9.71,27.93a1,1,0,0,1-.59.29l-7,.77Zm7-1.78H9ZM3.73,21.45l-.6,5.42,5.42-.6,16.1-16.1a1.2,1.2,0,0,0,0-1.7L21.53,5.35a1.2,1.2,0,0,0-1.7,0Z"/>
                                    <path class="cls-1" d="M23,14.21a1,1,0,0,1-.71-.29L16.08,7.69A1,1,0,0,1,17.5,6.27l6.23,6.23a1,1,0,0,1,0,1.42A1,1,0,0,1,23,14.21Z"/>
                                    <rect class="cls-1" height="2" transform="translate(-8.31 14.13) rotate(-45)" width="11.01" x="7.39" y="16.1"/>
                                </g>
                            </svg>
                        </div>
                        <div class="card-btn-delete df cxy">
                            <svg width="30" heigth="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="22.4247" y1="21.7174" x2="8.28256" y2="7.57526" stroke="#1E222F" stroke-width="3"/>
                                <line x1="8.2826" y1="22.4247" x2="22.4247" y2="8.28256" stroke="#1E222F" stroke-width="3"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="db-main-card df cxy">
                    <div class="main-card-descri m10">
                        <h3>Tipo A</h3>
                        <p>Jugo, pan, banano, granola</p>
                    </div>
                    <div class="switch-button">
                        <input type="checkbox" name="switch-button" id="switch-label" class="switch-button__checkbox">
                        <label for="switch-label" class="switch-button__label"></label>
                    </div>
                    <div class="main-card-info">
                        <h5>22-04-2022</h5>
                        <p>13:06</p>
                    </div>
                    <div class="main-card-btn m-10 df">
                        <div class="card-btn-edit df cxy">
                            <svg width="25" heigth="25" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <style>.cls-1{fill:#1E222F;}</style>
                                </defs>
                                <g data-name="Layer 42" id="Layer_42">
                                    <path class="cls-1" d="M2,29a1,1,0,0,1-1-1.11l.77-7a1,1,0,0,1,.29-.59L18.42,3.94a3.2,3.2,0,0,1,4.53,0l3.11,3.11a3.2,3.2,0,0,1,0,4.53L9.71,27.93a1,1,0,0,1-.59.29l-7,.77Zm7-1.78H9ZM3.73,21.45l-.6,5.42,5.42-.6,16.1-16.1a1.2,1.2,0,0,0,0-1.7L21.53,5.35a1.2,1.2,0,0,0-1.7,0Z"/>
                                    <path class="cls-1" d="M23,14.21a1,1,0,0,1-.71-.29L16.08,7.69A1,1,0,0,1,17.5,6.27l6.23,6.23a1,1,0,0,1,0,1.42A1,1,0,0,1,23,14.21Z"/>
                                    <rect class="cls-1" height="2" transform="translate(-8.31 14.13) rotate(-45)" width="11.01" x="7.39" y="16.1"/>
                                </g>
                            </svg>
                        </div>
                        <div class="card-btn-delete df cxy">
                            <svg width="30" heigth="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="22.4247" y1="21.7174" x2="8.28256" y2="7.57526" stroke="#1E222F" stroke-width="3"/>
                                <line x1="8.2826" y1="22.4247" x2="22.4247" y2="8.28256" stroke="#1E222F" stroke-width="3"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="db-main-card card-close df cxy">
                    <div class="main-card-descri m10">
                        <h3>Tipo A</h3>
                        <p>Jugo, pan, banano, granola</p>
                    </div>
                    <div class="switch-button" id="dn-card">
                        <input type="checkbox" name="switch-button" id="switch-label" class="switch-button__checkbox">
                        <label for="switch-label" class="switch-button__label"></label>
                    </div>
                    <div class="main-card-info" id="dn-card">
                        <h5>22-04-2022</h5>
                        <p>13:06</p>
                    </div>
                    <div class="main-card-btn df m-10">
                        <div class="card-btn-edit df cxy">
                            <svg width="25" heigth="25" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <style>.cls-1{fill:#1E222F;}</style>
                                </defs>
                                <g data-name="Layer 42" id="Layer_42">
                                    <path class="cls-1" d="M2,29a1,1,0,0,1-1-1.11l.77-7a1,1,0,0,1,.29-.59L18.42,3.94a3.2,3.2,0,0,1,4.53,0l3.11,3.11a3.2,3.2,0,0,1,0,4.53L9.71,27.93a1,1,0,0,1-.59.29l-7,.77Zm7-1.78H9ZM3.73,21.45l-.6,5.42,5.42-.6,16.1-16.1a1.2,1.2,0,0,0,0-1.7L21.53,5.35a1.2,1.2,0,0,0-1.7,0Z"/>
                                    <path class="cls-1" d="M23,14.21a1,1,0,0,1-.71-.29L16.08,7.69A1,1,0,0,1,17.5,6.27l6.23,6.23a1,1,0,0,1,0,1.42A1,1,0,0,1,23,14.21Z"/>
                                    <rect class="cls-1" height="2" transform="translate(-8.31 14.13) rotate(-45)" width="11.01" x="7.39" y="16.1"/>
                                </g>
                            </svg>
                        </div>
                        <div class="card-btn-delete df cxy">
                            <svg width="30" heigth="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="22.4247" y1="21.7174" x2="8.28256" y2="7.57526" stroke="#1E222F" stroke-width="3"/>
                                <line x1="8.2826" y1="22.4247" x2="22.4247" y2="8.28256" stroke="#1E222F" stroke-width="3"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="db-main-card card-close df cxy">
                    <div class="main-card-descri m10">
                        <h3>Tipo A</h3>
                        <p>Jugo, pan, banano, granola</p>
                    </div>
                    <div class="switch-button" id="dn-card">
                        <input type="checkbox" name="switch-button" id="switch-label" class="switch-button__checkbox">
                        <label for="switch-label" class="switch-button__label"></label>
                    </div>
                    <div class="main-card-info" id="dn-card">
                        <h5>22-04-2022</h5>
                        <p>13:06</p>
                    </div>
                    <div class="main-card-btn df m-10">
                        <div class="card-btn-edit df cxy">
                            <svg width="25" heigth="25" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <style>.cls-1{fill:#1E222F;}</style>
                                </defs>
                                <g data-name="Layer 42" id="Layer_42">
                                    <path class="cls-1" d="M2,29a1,1,0,0,1-1-1.11l.77-7a1,1,0,0,1,.29-.59L18.42,3.94a3.2,3.2,0,0,1,4.53,0l3.11,3.11a3.2,3.2,0,0,1,0,4.53L9.71,27.93a1,1,0,0,1-.59.29l-7,.77Zm7-1.78H9ZM3.73,21.45l-.6,5.42,5.42-.6,16.1-16.1a1.2,1.2,0,0,0,0-1.7L21.53,5.35a1.2,1.2,0,0,0-1.7,0Z"/>
                                    <path class="cls-1" d="M23,14.21a1,1,0,0,1-.71-.29L16.08,7.69A1,1,0,0,1,17.5,6.27l6.23,6.23a1,1,0,0,1,0,1.42A1,1,0,0,1,23,14.21Z"/>
                                    <rect class="cls-1" height="2" transform="translate(-8.31 14.13) rotate(-45)" width="11.01" x="7.39" y="16.1"/>
                                </g>
                            </svg>
                        </div>
                        <div class="card-btn-delete df cxy">
                            <svg width="30" heigth="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="22.4247" y1="21.7174" x2="8.28256" y2="7.57526" stroke="#1E222F" stroke-width="3"/>
                                <line x1="8.2826" y1="22.4247" x2="22.4247" y2="8.28256" stroke="#1E222F" stroke-width="3"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
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
            <div class="df jc-s btn-menu-menu" id="courseMenu"  data-id="courseMenu">
                <div class="icon-img" id="w100">
                    <i class="las la-id-card"></i>
                </div>
                <div class="icon-text" id="dn">
                    <h4>Perfil</h4>
                </div>
            </div>
            <div id="line"></div>
            <div class="df jc-s btn-menu-menu" id="courseMenu" data-id="courseMenu">
                <div class="icon-img" id="w100">
                    <i class="las la-atlas"></i>
                </div>
                <div class="icon-text" id="dn">
                    <h4>Cursos</h4>
                </div>
            </div>
            <div class="df jc-s btn-menu-menu click-sections" id="userMenu" data-id="userMenu">
                <div class="icon-img" id="w100">
                    <i class="las la-users"></i>
                </div>
                <div class="icon-text" id="dn">
                    <h4>Usuarios</h4>
                </div>
            </div>
            <div class="df jc-s btn-menu-menu" id="snackMenu" data-id="snackMenu">
                <div class="icon-img" id="w100">
                    <i class="las la-utensils"></i>
                </div>
                <div class="icon-text" id="dn">
                    <h4>Refrigerios</h4>
                </div>
            </div>
            <div id="line"></div>
            <div class="df jc-s btn-menu-menu" id="reportMenu" data-id="reportMenu">
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