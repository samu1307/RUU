<?php 
    $rol = $_SESSION["rol"];
    if(trim($rol) !== 'Auxiliar'){
?>
<div class="body-db-courses body-db df cxy zi-second" data-id="coursesMenu">
    <header id="header-db-courses" class="header-db">
        <div id="menu-icon-div" class="df">
            <i class="menu-icon las la-bars" id="courses"></i>
            <a id="plus-icon-div" class="df" href="./views.dashboard/createcourses.php">
                <i class="las la-plus"></i>
            </a>
        </div>
        <div id="search" class="head-users df cxy">
            <h3>Cursos</h3>
            <div class="header-db-search df">
                <input type="search" id="search-element" placeholder="Busca cursos">
                <button class="df cxy h100">
                    <i class="las la-search c-white"></i>
                </button>
            </div>   
        </div>   
    </header>
    <main id="main-db-courses">
        <section class="section-snack">
            <?php $i = 1; if($coursesDates){
            foreach ($coursesDates as $date) { ?>
                <div id="<?php echo $i; ?>" class="db-main-card user-active df" data-name="<?=$date['grado'];?><?=$date['curso'];?>">
                    <div class="main-card-cont">
                        <div class="main-card-cont-first df">
                            <div class="cont-main-card-img df cxy">
                                <div class="main-card-img">
                                    <img src="./img/iconuser1.png" alt="Iconos de usuario">
                                </div>
                                <p><?= $date['profesor'] ?></p>
                            </div>
                            <div class="cont-main-card-descri df">
                                <div class="main-card-descri">
                                    <div>Curso: <?=$date['grado'];?>-<?=$date['curso'];?></div>
                                </div>
                                <div class="main-card-info df" id="dn-card">
                                    <span>Jornada:</span>
                                    <div><?php if($date['jornada'] == 'M') echo 'Mañana'; else echo 'Tarde'; ?></div>
                                </div>
                                <div class="main-card-info df" style="margin-top: 0;" id="dn-card">
                                    <span>Alumnos:</span>
                                    <div><?= $date['cantAlumnos'] ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="main-card-btn df">
                            <a href="./views.dashboard/createcourses.php?id=<?=$date[0]?>" class="card-btn-edit df cxy">
                                <i class="las la-pen c-black"></i>
                            </a>        
                            <button class="card-btn-delete df cxy" data-deleteId="<?=$date[0]?>">
                                <i class="las la-times c-black"></i>
                            </button>
                        </div>
                    </div>
                    <div class="line-active-user h100"></div>
                </div>
            <?php $i = $i + 1; }}else echo "ERROR: No se pudo iniciar." ?>
        </section>
    </main>
</div>
<?php } ?>