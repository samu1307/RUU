<div class="body-db-snacks body-db df cxy zi-thirth" data-id="snacksMenu">
    <header id="header-db-snacks" class="header-db">
        <div id="menu-icon-div" class="df">
            <i class="menu-icon las la-bars" id="snacks"></i>
            <a id="plus-icon-div" class="df" href="./views.dashboard/createsnacks.php">
                <i class="las la-plus" id="users-plus"></i>
            </a>
        </div>
        <div id="search" class="head-users df cxy">
            <h3>Refrigerios</h3>
            <div class="header-db-search df">
                <input type="search" id="search-element" placeholder="Busca refrigerios">
                <button class="df cxy h100">
                    <i class="las la-search c-white"></i>
                </button>
            </div>   
        </div>   
    </header>
    <main id="main-db-courses">
        <section class="section-snack">
            <?php $i = 1; if($snacksDates != false){
            foreach ($snacksDates as $date) { ?>    
                <div id="<?php echo $i; ?>" class="db-main-card user-active df" data-name="<?php echo $date['descripcion']; ?>">
                        <div class="main-card-cont">
                            <div class="main-card-cont-first df">
                                <div class="cont-main-card-img df cxy">
                                    <div class="main-card-img">
                                        <img src="./img/iconuser1.png" alt="Iconos de usuario">
                                    </div>
                                    <p><?= $date['fecha'] ?></p>
                                </div>
                                <div class="cont-main-card-descri df">
                                    <div class="main-card-descri">
                                        <div>Tipo: <?= $date['tipo'] ?></div>
                                    </div>
                                    <div class="main-card-info df" id="dn-card">
                                        <span>Cantidad:</span>
                                        <div><?= $date['cantidad'] ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-card-cont-second">
                                <div class="main-card-email df w100">
                                    <span>Descripción</span>
                                    <div><?= $date['descripcion'] ?></div>
                                </div>
                                <div class="main-card-number-user df w100">
                                    <div class="main-card-number w100">
                                        <span>Fecha</span>
                                        <div><?= $date['fecha'] ?></div>
                                    </div>
                                    <div class="main-card-user w100">
                                        <span>Hora</span>
                                        <div><?= $date['hora'] ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-card-btn df">
                                <a href="./views.dashboard/createsnacks.php?id=<?=$date[0]?>" class="card-btn-edit df cxy">
                                    <i class="las la-pen c-black"></i>
                                </a>
                                <button id="<?php echo $i; ?>" class="view-more df cxy">
                                    <i class="las la-angle-down c-black"></i>
                                </button>
                            </div>
                        </div>
                        <div class="line-active-user h100"></div>
                    </div>
            <?php $i = $i + 1;}}else echo "ERROR: No se pudo iniciar." ?>
        </section>
    </main>
</div>