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