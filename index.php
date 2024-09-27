<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RUU I Sistema de información para el control y entrega de refrigerios</title>
    <link rel="stylesheet" href="./view/css/main.css">
    <script type="module" src="./view/js/index.js" defer></script>
    <link rel="stylesheet" defer
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>

<body id="body-index" class="loadBody">
    <?php
    // $jsPath = './view/js/modules/preloader.js';
    // include_once'./view/templates.php/preloader.php';
    ?>
    <header id="header-index">
        <nav class="df w100" id="nav-index">
            <?php $class = 'btn-menu';
            $size = '2rem';
            include_once './view/svg/menu.php'; ?>
            <a href="./index.php" class="btn-home df cxy">
                <img class="lazy-load" src="./view/img/escudo.png" alt="Escudo Colegio Rafael Uribe Uribe">
                <span>RUU</span>
            </a>
            <ul class="menu-slider-header cxy">
                <li>
                    <a href="#header-index" id="home" class="a-sections">
                        <i class="las la-home"></i>
                        <span>Inicio</span>
                    </a>
                </li>
                <li>
                    <a href="#section-1-index" id="ubi" class="a-sections">
                        <i class="las la-map-marker"></i>
                        <span>Ubicación</span>
                    </a>
                </li>
                <li>
                    <a href="#section-2-index" id="about" class="a-sections">
                        <i class="las la-users-cog"></i>
                        <span>Nosotros</span>
                    </a>
                </li>
                <li>
                    <a href="#form-contact" id="contact" class="a-sections">
                        <i class="las la-id-car"></i>
                        <span>Contactar</span>
                    </a>
                </li>
            </ul>
            <a class="btn-login" href="./view/login.php">Ingresar</a>
        </nav>
    </header>
    <main id="main-index">
        <section class="main-head w100">
            <picture class="main-img df cxy">
                <img src="./view/img/escudobg.svg" alt="Escudo editado del Colegio Rafael Uribe Uribe">
            </picture>
            <div class="main-main">
                <h1>Porque la
                    <div>
                        <span>nutrición</span>
                        es <br> importante
                    </div>
                </h1>
                <div class="main-line"></div>
                <div class="main-btn df w100">
                    <a class="main-btn-ingresar di" id="ingresar" href="./view/login.php">Ingresar</a>
                    <a class="main-btn-contacto di" id="contacto" href="#form-contact">Contacto</a>
                </div>
            </div>
        </section>
        <section class="section-2-map" id="section-2-map">
            <iframe class="mapIframe w100 "
                data-src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3977.261302140725!2d-74.15205568570643!3d4.5469303442389215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3fa1dfc765d443%3A0x755db7df8764399e!2sIED%20Colegio%20Rafael%20Uribe%20Uribe%20Localidad%2019!5e0!3m2!1ses!2sco!4v1669464605207!5m2!1ses!2sco"
                width="400" height="300" style="border:0;" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
            <article class="main-slider">
                <div class="main-img-slider">
                    <div class="img-slider df moSl1">
                        <img style="aspect-ratio: 4 / 3;" src="./view/img/imgslider1.jpg" data-spy="scroll" data-img="1"
                            alt="Fotografía de baile en el Colegio Rafal Uribe Uribe">
                        <img style="aspect-ratio: 3 / 4;" src="./view/img/imgslider2.jpg" data-spy="scroll" data-img="2"
                            alt="">
                        <img style="aspect-ratio: 4 / 3;" src="./view/img/imgslider3.jpg" data-spy="scroll" data-img="3"
                            alt="">
                    </div>
                </div>
                <div class="main-btn-slider">
                    <div class="btn-slider df cxy">
                        <button class="di row-slider-btn" id="row-btn-l">
                            <i class="las la-arrow-left"></i>
                        </button>
                        <span class="dinamic-btn-slider">
                            <span>
                                <button class="di" data-img="1">01</button>
                                <button class="di" data-img="2">02</button>
                                <button class="di" data-img="3">03</button>
                            </span>
                        </span>
                        <button class="di row-slider-btn" id="row-btn-r">
                            <i class="las la-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </article>
        </section>
        <section class="section-2-index" id="section-2-index">
            <div class="cont-about">
                <div class="video-yt"><iframe class="videoIframe lazy-load" width="560" height="315"
                        data-src="https://www.youtube.com/embed/MUxwDDh-gbw" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                </div>
                <div class="about">
                    <h4>¿Quiénes somos?</h4>
                    <p> <b>RUU</b> inicio en septiembre de 2022 como una idea para gestionar, mas rapida y
                        adecuadamente, los distintos refrigerios que llegan al Colegio Rafael Uribe Uribe mediante una
                        plataforma web. <b>RUU</b> tiene como meta, desarrollar una plataforma que sea adaptable para
                        todos los colegios de Bogota D.C.</p>
                </div>
            </div>
            <div class="lema">
                <div class="lema-img"><img class="lazy-load" src="./view/img/escudo.png" alt=""></div>
                <h4>“ Buscamos la calidad con amor y exigencia ”</h4>
            </div>
        </section>
    </main>
    <footer>
        <div class="cont-form">
            <div class="main-form">
                <h4>Contactar</h4>
                <form class="form" id="form-contact">
                    <input type="text" placeholder="Nombre" id="name" name="name">
                    <input type="email" placeholder="Correo" id="email" name="email">
                    <input type="number" placeholder="Telefono" id="number" name="number">
                    <input type="text" placeholder="Asunto" id="matter" name="matter">
                    <textarea cols="30" rows="3" placeholder="Mensaje" id="body" name="body"></textarea>
                    <button type="submit">Enviar</button>
                </form>
            </div>
            <div class="main-rs">
                <a href="#" class="di"><i class="lab la-facebook"></i></a>
                <a href="#" class="di"><i class="lab la-whatsapp"></i></a>
                <a href="#" class="di"><i class="lab la-youtube"></i></a>
            </div>
        </div>
        <div class="copyright">©️ Todos los derechos reservados</div>
    </footer>
    <div class="send-email df">
        <div class="by-email df w100">
            <span>De:</span>
            <div class="cont-find-mail">
                <div class="find-mail">
                    <p id="by-email">Samito34@gmail.com</p>
                </div>
            </div>
        </div>
        <div class="for-email df w100">
            <span>Para: </span>
            <div class="cont-find-mail">
                <div class="find-mail">
                    <p id="for-email">colegiorafaeluribeuribe19@gmail.com</p>
                </div>
            </div>
        </div>
        <div class="matter-email w100">
            <span>Asunto:</span>
            <p id="matter-email">No lo se bro</p>
        </div>
        <div class="body-email w100">
            <span>Cuerpo:</span>
            <p id="body-email">Lorem ipsum dolor,
                sit amet consectetur adipisicing
                elit. Expedita, fuga?</p>
        </div>
        <div class="btn-email w100 df">
            <i id="close-email" class="las la-times"></i>
            <div id="send-edit">
                <i id="edit" class="las la-edit"></i>
                <i id="send" class="las la-paper-plane"></i>
            </div>
        </div>
    </div>
</body>

</html>