<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperacion de la cuenta</title>
    <link rel="stylesheet" href="./css/main.css">
    <script type="module" src="./js/recu.js" defer></script>
</head>
<body>
    <header id="header-login">
        <nav class="df" id="nav-login">
            <a href="./login.html">
                <svg width="20" height="20" viewBox="0 0 27 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.939279 10.9393C0.353492 11.5251 0.353492 12.4749 0.939279 13.0607L10.4852 22.6066C11.071 23.1924 12.0208 23.1924 12.6065 22.6066C13.1923 22.0208 13.1923 21.0711 12.6065 20.4853L4.12126 12L12.6065 3.51472C13.1923 2.92893 13.1923 1.97918 12.6065 1.3934C12.0208 0.807612 11.071 0.807612 10.4852 1.3934L0.939279 10.9393ZM26.9999 10.5L1.99994 10.5V13.5L26.9999 13.5V10.5Z" fill="#1E222F"/>
                </svg>
            </a>
            <div class="logo-login df cxy">
                <img src="./img/escudo.png" alt="Escudo Colegio Rafael Uribe Uribe">
                <h3 class="di" >RUU</h3>
            </div>
        </nav>
    </header>
    <main id="main-login" class="df cxy">
        <section class="section-login">
            <h3 class="h3-login">Recuperación de la cuenta</h3>
            <div class="emailInvalid">
                <h5>El usuario <b>juanca@gmail.com</b>, no esta registrado</h5>
            </div>
            <p class="p-login">Ingresa tu correo electronico para enviarte un codigo de verificación</p>
            <form class="form-login">
                <div class="correo-in">
                    <label>Correo</label>
                    <input type="email" id="recuemail" name="e" placeholder="Ingresa tu correo" required>
                </div>
                <div class="ingresar-in">
                    <button id="subSend" type="submit">Enviar</button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>