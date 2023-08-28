<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario</title>
    <link rel="stylesheet" href="../css/main.css">
    <script type="module" src="../js/login.js" defer></script>
    <link rel="stylesheet" defer href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<body id="body-create">
    <div class="left__head" id="headLeft">
        <div class="left__head-logo">
            <img src="../img/escudo.png">
            <h3>RUU</h3>
        </div>
        <div class="left__head-arrow">
            <div><a class="df cxy" href="../dashboard.php">
                <i class="las la-arrow-left c-black"></i>
            </a></div>
        </div>
    </div>
    <div class="right__text w100 df">
        <h1>Crear Usuario</h1>
        <p>
            Como coordinador, podrás crear, editar
            y eliminar usuarios, además de realizar
            una variedad de funciones más
        </p>
    </div>
    <form id="createUser" class="right__body w100 df" >
        <div class="right__names df w100">
            <div class="right__name-name">
                <span>Nombres</span>
                <input type="text" placeholder="Nombres" name="name">
            </div>
            <div class="right__name-lastname">
                <span>Apellidos</span>
                <input type="text" placeholder="Apellidos" name="lastname">
            </div>
        </div>
        <div class="right__info df w100">
            <div class="right__info-number">
                <span>Telefono</span>
                <input type="number" placeholder="Telefono" name="number">
            </div>
            <div class="right__info-email">
                <span>Correo</span>
                <input type="email" placeholder="Correo" name="email">
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
            <div class="alertRol">Falta especificar la jornada</div>
        </div>
        <div class="right__user df w100">
            <div class="right__user-user">
                <span>Usuario</span>
                <input type="text" placeholder="Usuario" name="number">
            </div>
            <div class="right__user-pass">
                <span>Contraseña</span>
                <input type="pass" placeholder="Contraseña" name="pass">
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
            <div class="alertRol">Falta especificar el rol</div>
        </div>
        <div class="alertLogin w100 df cxy"></div>
        <input class="right__body-btn-send" id="btnSubmit" type="submit" value="Ingresar">
    </form>
</body>
</html>