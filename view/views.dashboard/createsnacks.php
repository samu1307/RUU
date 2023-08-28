<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Refrigerio</title>
    <link rel="stylesheet" href="../css/main.css">
    <script type="module" src="../js/login.js" defer></script>
</head>
<body id="body-login">
    <header id="header-login">
        <nav class="df cxy" id="nav-login">
            <a href="../dashboard.html">
                <svg viewBox="0 0 27 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.939279 10.9393C0.353492 11.5251 0.353492 12.4749 0.939279 13.0607L10.4852 22.6066C11.071 23.1924 12.0208 23.1924 12.6065 22.6066C13.1923 22.0208 13.1923 21.0711 12.6065 20.4853L4.12126 12L12.6065 3.51472C13.1923 2.92893 13.1923 1.97918 12.6065 1.3934C12.0208 0.807612 11.071 0.807612 10.4852 1.3934L0.939279 10.9393ZM26.9999 10.5L1.99994 10.5V13.5L26.9999 13.5V10.5Z" fill="#1E222F"/>
                </svg>
            </a>
            <div class="logo-login df cxy">
                <img src="../img/escudo.png" alt="Escudo Colegio Rafael Uribe Uribe">
                <h3 class="di" >RUU</h3>
            </div>
        </nav>
    </header>
    <main id="main-login" class="cu df">
        <h2>Agregar Refrigerio</h2>
        <form id="form-create-users" >
            <div id="users-name" class="users-div df">
                <label for="users-name">Nombre</label>
                <input type="text" placeholder="Pepito" required>
            </div>
            <div id="users-lastname" class="users-div df">
                <label for="users-lastname">Apellidos</label>
                <input type="text" placeholder="Perez Mirador" required>
            </div>
            <div id="users-email" class="users-div df">
                <label for="users-email">Correo</label>
                <input type="email" placeholder="pepemira123@gmail.com" required>
            </div>
            <div id="users-pass" class="users-div df">
                <label for="users-pass">Contraseña</label>
                <input type="password" placeholder="••••••••••••••" required>
            </div>  
            <div id="users-user" class="users-div df">
                <label for="users-user">Usuario</label>
                <input type="text" placeholder="Pepemira123" required>
            </div>    
            <div id="users-number" class="users-div df">
                <label for="users-number">Telefono</label>
                <input type="number" placeholder="312 456 ** **" required>
            </div>
            <div id="users-rol" class="users-div df">
                <select name="" id="" >
                    <option  value="Coordinador">Coordinador</option>
                    <option value="Auxiliar">Auxiliar</option>
                    <option value="" hidden selected>Rol</option>
                </select>
            </div>
            <div id="users-state" class="users-div df">
                <select name="" id="">
                    <option value="A">Activo</option>
                    <option value="I">Inactivo</option>
                    <option value="" hidden selected>Estado</option>
                </select>
            </div>
            <input id="users-send" type="button" value="Crear Usuario">
        </form>
    </main>
</body>
</html>