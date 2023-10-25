<?php 
    $rol = $_SESSION["rol"];
    if(trim($rol) !== 'Auxiliar'){
?>
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
                        <a href="./views.dashboard/createcourse.php?id=<?=$date[0];?>" class="card-btn-edit df cxy">
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
<?php } ?>