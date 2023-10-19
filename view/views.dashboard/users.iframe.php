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
                    <div id="<?php echo $i; ?>" class="db-main-card df <?php echo $date['estado']?>" data-name="<?php echo $date['nombre']." ".$date['apellido']; ?>">
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
                                <a href="./views.dashboard/createusers.php?id=<?=$date[0]?>&r_0=<?=$date['rol']?>&__=<?=$date[1]?>" class="card-btn-edit df cxy">
                                    <i class="las la-pen c-black"></i>
                                </a>
                                <button id="<?php echo $i; ?>" class="view-more df cxy">
                                    <i class="las la-angle-down c-black"></i>
                                </button>
                                <button class="card-btn-delete df cxy" data-deleteid="<?=$date[0]?>">
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
                                <a href="./views.dashboard/createusers.php?id=<?=$date[0]?>&r_0=<?=$date['rol']?>&__=<?=$date[1]?>" class="card-btn-edit df cxy">
                                    <i class="las la-pen c-black"></i>
                                </a>        
                                <button id="<?php echo $i; ?>" class="view-more df cxy">
                                    <i class="las la-angle-down c-black"></i>
                                </button>
                                <button class="card-btn-delete df cxy" data-deleteId="<?=$date[0]?>" data-deleterol="<?=$date['rol']?>" data-deleterolid="<?=$date[1]?>">
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