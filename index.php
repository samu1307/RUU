<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de refrigerios</title>
    <link rel="stylesheet" href="./view/css/main.css">
    <script type="module" src="./view/js/index.js" defer></script>
    <link rel="stylesheet" defer href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>
<body id="body-index">
    <header id="header-index">
        <nav class="df w100" id="nav-index">
            <div class="nav-nav-index df w100">
                <div class="btn-menu">  
                    <i class="la la-bars vw8" ></i>
                </div>
                <a href="./index.php" class="btn-home df cxy">
                    <img class="lazy-load" src="./view/img/escudo.png" alt="Escudo Colegio Rafael Uribe Uribe">
                    <h3 class="di">RUU</h3>
                </a>
                <div class="n-n-msh">
                    <ul class="df cxy">
                        <li><a href="#header-index" data-icon="&#xf015;">Inicio</a></li>
                        <li><a href="#section-1-index" data-icon="&#xf279;">Ubicación</a></li>
                        <li><a href="#section-2-index" data-icon="&#xf500;">Nosotros</a></li>
                        <li><a href="#form-contact" data-icon="&#xf2c2;">Contactar</a></li>
                    </ul>
                </div>
                <div class="btns df h100">
                    <div class="night">
                        <div id="btn-night"></div>
                    </div>
                    <a class="btn-login df cxy" href="./view/login.php">Ingresar</a>
                </div>
            </div>
            <div class="menu-slider-header">
                <a href="#header-index" id="home" class="a-sections">
                    <img class="lazy-load" src="./view/img/iconhome.svg" alt="">
                    <span>Inicio</span>
                </a>
                <a href="#section-1-index" id="ubi" class="a-sections">
                    <img class="lazy-load" src="./view/img/iconubicacion.svg" alt="">
                    <span>Ubicación</span>
                </a>
                <a href="#section-2-index" id="about" class="a-sections">
                    <img class="lazy-load" src="./view/img/iconacercade.svg" alt="">
                    <span>Nosotros</span>
                </a>
                <a href="#form-contact" id="contact" class="a-sections">
                    <img class="lazy-load" src="./view/img/iconcontact.svg" alt="">
                    <span>Contactar</span>
                </a>
            </div>
        </nav>  
        
        <div class="main-head" >
            <div class="main-img">
                <img src="./view/img/escudobg.svg" alt=".">
            </div>
            <div class="main-main">
                <div class="main-date">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                        <path d="M8.03135 14.0439C8.60095 14.0439 9.0627 13.5864 9.0627 13.022C9.0627 12.4575 8.60095 12 8.03135 12C7.46175 12 7 12.4575 7 13.022C7 13.5864 7.46175 14.0439 8.03135 14.0439Z" fill="#1E222F"/>
                        <path d="M12 14C12.5523 14 13 13.5523 13 13C13 12.4477 12.5523 12 12 12C11.4477 12 11 12.4477 11 13C11 13.5523 11.4477 14 12 14Z" fill="#1E222F"/>
                        <path d="M16.0314 14.0439C16.601 14.0439 17.0627 13.5864 17.0627 13.022C17.0627 12.4575 16.601 12 16.0314 12C15.4618 12 15 12.4575 15 13.022C15 13.5864 15.4618 14.0439 16.0314 14.0439Z" fill="#1E222F"/>
                        <path d="M18.013 5H5.98698C4.33732 5 3 6.29322 3 7.8885V18.1115C3 19.7068 4.33732 21 5.98698 21H18.013C19.6627 21 21 19.7068 21 18.1115V7.8885C21 6.29322 19.6627 5 18.013 5Z" stroke="#1E222F" stroke-width="2" stroke-miterlimit="10"/>
                        <path d="M8 3L8 6" stroke="#1E222F" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"/>
                        <path d="M16 3L16 6" stroke="#1E222F" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"/>
                        <path d="M3 9L21 9" stroke="#1E222F" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"/>
                        <path d="M8.03135 18.0439C8.60095 18.0439 9.0627 17.5864 9.0627 17.022C9.0627 16.4575 8.60095 16 8.03135 16C7.46175 16 7 16.4575 7 17.022C7 17.5864 7.46175 18.0439 8.03135 18.0439Z" fill="#1E222F"/>
                        <path d="M12.0314 18.0439C12.601 18.0439 13.0627 17.5864 13.0627 17.022C13.0627 16.4575 12.601 16 12.0314 16C11.4618 16 11 16.4575 11 17.022C11 17.5864 11.4618 18.0439 12.0314 18.0439Z" fill="#1E222F"/>
                        <rect x="4" y="6" width="16" height="3" fill="#1E222F"/>
                    </svg>
                    <div id="main-date"></div>
                </div>
                <div class="main-p">
                    <h1>Porque la 
                        <div>
                            <span>nutrición</span>
                            es <br> importante
                        </div>
                    </h1>
                </div>
                <div class="main-line"></div>
                <div class="main-btn">
                    <a class="main-btn-ingresar di" id="ingresar" href="./view/login.php">Ingresar</a>
                    <a class="main-btn-contacto di" id="contacto" href="#form-contact">Contacto</a>
                </div>
            </div>
        </div>
    </header>
    <main id="main-index">
        <section class="section-1-index" id="section-1-index">
            <div class="map">
                <iframe class="mapIframe wh100 lazy-load" loading="lazy" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3977.261302140725!2d-74.15205568570643!3d4.5469303442389215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3fa1dfc765d443%3A0x755db7df8764399e!2sIED%20Colegio%20Rafael%20Uribe%20Uribe%20Localidad%2019!5e0!3m2!1ses!2sco!4v1669464605207!5m2!1ses!2sco" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="main-slider">
                <div class="main-img-slider">
                    <div class="img-slider df moSl1">
                        <div class="df cxy">
                            <img class="lazy-load" src="./view/img/imgslider1.jpg" data-spy="scroll" data-img="1" alt="">
                        </div>
                        <div class="df cxy" id="vertical">
                            <img class="lazy-load" src="./view/img/imgslider2.jpg" data-spy="scroll" data-img="2" alt="">
                        </div>
                        <div class="df cxy">
                            <img class="lazy-load" src="./view/img/imgslider3.jpg" data-spy="scroll" data-img="3" alt="">
                        </div>
                    </div>
                </div>
                <div class="main-btn-slider">
                    <div class="btn-slider df cxy"> 
                        <button class="di row-slider-btn" id="row-btn-l">
                            <i class="las la-arrow-left"></i>
                        </button>
                        <span class="dinamic-btn-slider" >
                            <span>
                                <button class="di" data-img="1" >01</button>
                                <button class="di" data-img="2">02</button>
                                <button class="di" data-img="3">03</button>
                            </span>
                        </span>
                        <button class="di row-slider-btn" id="row-btn-r">
                            <i class="las la-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-2-index" id="section-2-index">
            <div class="cont-about">
                <div class="video-yt"><iframe class="videoIframe lazy-load" width="560" height="315" src="https://www.youtube.com/embed/MUxwDDh-gbw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe></div>
                <div class="about">
                    <h4>¿Quiénes somos?</h4>
                    <p> <b>RUU</b> inicio en septiembre de 2022 como una idea para gestionar, mas rapida y adecuadamente, los distintos refrigerios que llegan al Colegio Rafael Uribe Uribe mediante una plataforma web. <b>RUU</b> tiene como meta, desarrollar una plataforma que sea adaptable para todos los colegios de Bogota D.C.</p>
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
                    <input type="text" placeholder="Nombre" id="name"  name="name">
                    <input type="email" placeholder="Correo" id="email"  name="email">
                    <input type="number" placeholder="Telefono" id="number"  name="number">
                    <input type="text" placeholder="Asunto" id="matter"  name="matter">
                    <textarea cols="30" rows="3" placeholder="Mensaje" id="body"  name="body"></textarea>
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