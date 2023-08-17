<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de refrigerios</title>
    <link rel="stylesheet" href="./view/css/main.css">
    <script src="./view/js/index.js" defer></script>
</head>
<body id="body-index">
    <header id="header-index">
        <nav class="df w100" id="nav-index">
            <div class="nav-nav-index df w100">
                <div class="btn-menu">
                    <svg viewBox="0 0 32 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line y1="1.5" x2="30" y2="1.5" stroke="#1E222F" stroke-width="3"/>
                        <line y1="7.5" x2="30" y2="7.5" stroke="#1E222F" stroke-width="3"/>
                        <line y1="13.5" x2="30" y2="13.5" stroke="#1E222F" stroke-width="3"/>
                    </svg>
                </div>
                <a href="./index.html" class="btn-home df cxy">
                    <img class="lazy-load" src="./view/img/escudo.png" alt="Escudo Colegio Rafael Uribe Uribe">
                    <h3 class="di">RUU</h3>
                </a>
                <div class="n-n-msh">
                    <ul class="df cxy">
                        <li><a href="#header-index">Inicio</a></li>
                        <li><a href="#section-1-index">Ubicación</a></li>
                        <li><a href="#section-2-index">Nosotros</a></li>
                        <li><a href="#form-contact">Contactar</a></li>
                    </ul>
                </div>
                <div class="btns df h100">
                    <div class="night">
                        <div id="btn-night"></div>
                    </div>
                    <a class="btn-login df cxy h100" href="./view/login.php">Ingresar</a>
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
                <img class="lazy-load" loading="none" src="./view/img/escudo3d.png" alt=".">
            </div>
            <div class="main-main">
                <div class="main-date df">
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
                    <a class="main-btn-contacto di" id="contacto" href="#">Contacto</a>
                </div>
            </div>
        </div>
    </header>
    <main id="main-index">
        <section class="section-1-index" id="section-1-index">
            <div class="map">
                <!-- <iframe class="mapIframe lazy-load" loading="lazy" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3977.261302140725!2d-74.15205568570643!3d4.5469303442389215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3fa1dfc765d443%3A0x755db7df8764399e!2sIED%20Colegio%20Rafael%20Uribe%20Uribe%20Localidad%2019!5e0!3m2!1ses!2sco!4v1669464605207!5m2!1ses!2sco" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
            </div>
            <div class="main-slider">
                <div class="main-img-slider">
                    <div class="img-slider df">
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
                            <svg viewBox="0 0 27 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.939279 10.9393C0.353492 11.5251 0.353492 12.4749 0.939279 13.0607L10.4852 22.6066C11.071 23.1924 12.0208 23.1924 12.6065 22.6066C13.1923 22.0208 13.1923 21.0711 12.6065 20.4853L4.12126 12L12.6065 3.51472C13.1923 2.92893 13.1923 1.97918 12.6065 1.3934C12.0208 0.807612 11.071 0.807612 10.4852 1.3934L0.939279 10.9393ZM26.9999 10.5L1.99994 10.5V13.5L26.9999 13.5V10.5Z" fill="#fff"/>
                            </svg>
                        </button>
                        <span class="dinamic-btn-slider" >
                            <span>
                                <button class="di" data-img="1" >01</button>
                                <button class="di" data-img="2">02</button>
                                <button class="di" data-img="3">03</button>
                            </span>
                        </span>
                        <button class="di row-slider-btn" id="row-btn-r">
                            <svg viewBox="0 0 27 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.939279 10.9393C0.353492 11.5251 0.353492 12.4749 0.939279 13.0607L10.4852 22.6066C11.071 23.1924 12.0208 23.1924 12.6065 22.6066C13.1923 22.0208 13.1923 21.0711 12.6065 20.4853L4.12126 12L12.6065 3.51472C13.1923 2.92893 13.1923 1.97918 12.6065 1.3934C12.0208 0.807612 11.071 0.807612 10.4852 1.3934L0.939279 10.9393ZM26.9999 10.5L1.99994 10.5V13.5L26.9999 13.5V10.5Z" fill="#fff"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-2-index" id="section-2-index">
            <!-- <div class="video-yt"><iframe class="videoIframe lazy-load" width="560" height="315" src="https://www.youtube.com/embed/MUxwDDh-gbw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy"></iframe></div> -->
            <div class="about">
                <h4>¿Quiénes Somos?</h4>
                <p> <b>RUU</b> inicio en septiembre de 2022 como una idea para gestionar, mas rapida y adecuadamente, los distintos refrigerios que llegan al Colegio Rafael Uribe Uribe mediante una plataforma web. <b>RUU</b> tiene como meta, desarrollar una plataforma que sea adaptable para todos los colegios de Bogota D.C.</p>
            </div>
            <div class="lema">
                <div class="lema-img"><img class="lazy-load" src="./view/img/escudo.png" alt=""></div>
                <h4>“ Buscamos la calidad con amor y exigencia ”</h4>
            </div>
        </section>
    </main>
    <footer>
        <div class="main-form">
            <h4>Contactar</h4>
            <form class="form" id="form-contact">
                <input type="text" placeholder="Nombre*" required>
                <input type="email" placeholder="Correo*" required>
                <input type="number" placeholder="Telefono*" required>
                <textarea name="" id="" cols="30" rows="3" placeholder="Asunto"></textarea>
                <button type="submit">Enviar</button>
            </form>
        </div>
        <div class="main-rs">
            <a href="#" class="di">
                <svg enable-background="new 0 0 512 512" fill="#fff" id="Layer_1" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M308.3,508.5c-2.5,0.1-4.1,0.3-5.7,0.3c-34.2,0-68.3-0.1-102.5,0.1c-4.8,0-6.1-1.3-6.1-6.1c0.1-79.6,0.1-159.3,0.1-238.9   c0-2.1,0-4.2,0-6.9c-18.6,0-36.7,0-55.1,0c0-28.4,0-56.3,0-85c1.9,0,3.7,0,5.4,0c15,0,30-0.1,45,0.1c3.8,0,4.8-1.1,4.8-4.8   c-0.2-22.3-0.2-44.7,0-67c0.1-15.6,2.6-30.8,9.8-44.9c10.3-19.9,26.6-32.8,47.2-40.8c16.8-6.6,34.5-9,52.3-9.3   c29-0.4,58-0.2,87-0.3c2.7,0,4.9-0.1,4.9,3.7c-0.1,27.5-0.1,55-0.1,82.5c0,0.3-0.1,0.6-0.5,1.9c-1.7,0-3.6,0-5.5,0   c-18,0-36-0.1-54,0c-10.4,0-18.8,4.2-24.1,13.3c-1.6,2.7-2.6,6.2-2.6,9.4c-0.3,17,0,34-0.2,51c0,4,1.2,5.1,5.1,5.1   c25-0.2,50-0.1,75-0.1c2,0,3.9,0,7.3,0c-3.5,28.6-6.9,56.6-10.4,84.9c-26,0-51.3,0-77.1,0C308.3,340.8,308.3,424.4,308.3,508.5z"/></g></svg>
            </a>
            <a href="#" class="di">
                <svg enable-background="new 0 0 512 512" fill="#fff" id="Layer_1" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M10.8,507.9c6.9-20.7,13.4-40.1,19.9-59.5c6.5-19.2,12.3-38.7,19.7-57.6c3.8-9.6,2.6-16.8-2.2-25.8   c-26.2-48.6-34-100.7-24.9-154.9c7.7-45.9,27.2-86.5,58.7-121C133.9,32.4,198.7,5.2,275.3,8.4c56.1,2.3,105.7,22.8,148,59.9   c39.4,34.5,65.1,77.4,77,128.4c9.6,41.1,8.5,82-3.3,122.5c-15,51.3-43.7,93.6-86.4,125.8c-59.3,44.8-125.8,58.7-198.3,44.6   c-21.8-4.2-42.6-12-62.2-22.6c-3.2-1.7-5.9-2.1-9.4-0.9c-37.2,12-74.5,23.9-111.7,35.8C23.4,503.7,17.7,505.6,10.8,507.9z    M74.1,445.2c2-0.5,2.9-0.7,3.8-1c23.3-7.4,46.6-14.9,70-22.1c2.2-0.7,5.2-0.1,7.3,0.9c10.1,5,19.8,11,30.2,15.4   c42.8,18.1,86.9,21,131.5,8.6c53.2-14.9,94-46.6,121.9-94.5c23.9-41,32.1-85.3,24.7-131.9c-9.4-59.3-39.8-105.9-90.1-139   C329.8,53,281.8,43.3,230.6,51.4c-44.1,7-81.8,27.1-112.9,59.3c-26.7,27.6-44.6,60.2-52.4,97.7c-11.1,53.7-2.9,104.5,26.9,150.8   c6,9.3,5.8,16.4,2.2,25.9C87.1,404.6,81,424.5,74.1,445.2z"/><path d="M389.3,321.8c-0.3,19.3-9.4,34-27.8,43.2c-18.1,9-36.5,11.3-55.4,3.9c-17-6.7-34.2-13.2-50.6-21.3   c-21.6-10.7-39.3-26.7-55.5-44.4c-17.9-19.6-33.1-41.4-45.6-64.7c-8.9-16.5-14.3-34-12.4-53.2c2-20.4,11.5-36.7,27.5-49   c3.2-2.4,8-3.5,12.1-3.9c5.3-0.4,10.6,0.4,15.9,0.8c4.4,0.4,6.8,3.5,8.3,7.1c3.9,9.6,7.4,19.2,11.1,28.9c2.5,6.5,4.4,13.3,7.4,19.6   c3.7,7.8,1.4,14.3-3.4,20.3c-4.1,5.1-8.4,10-13.1,14.4c-3.9,3.7-4.6,7.5-2,12c11.5,20.5,25.5,38.9,44,53.8   c12.2,9.8,25.7,17.1,39.7,23.9c4.1,2,8.1,1.7,11.3-2c6.9-7.9,13.9-15.7,20.7-23.7c4.4-5.1,6.6-6.1,12.5-3.1   c17.1,8.6,34,17.5,51,26.4C389,313,390,316.6,389.3,321.8z"/></g></svg>
            </a>
            <a href="#" class="di">
                <svg enable-background="new 0 0 512 512" fill="#fff" id="Layer_1" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M260.4,449c-57.1-1.8-111.4-3.2-165.7-5.3c-11.7-0.5-23.6-2.3-35-5c-21.4-5-36.2-17.9-43.8-39c-6.1-17-8.3-34.5-9.9-52.3   C2.5,305.6,2.5,263.8,4.2,222c1-23.6,1.6-47.4,7.9-70.3c3.8-13.7,8.4-27.1,19.5-37c11.7-10.5,25.4-16.8,41-17.5   c42.8-2.1,85.5-4.7,128.3-5.1c57.6-0.6,115.3,0.2,172.9,1.3c24.9,0.5,50,1.8,74.7,5c22.6,3,39.5,15.6,48.5,37.6   c6.9,16.9,9.5,34.6,11,52.6c3.9,45.1,4,90.2,1.8,135.3c-1.1,22.9-2.2,45.9-8.7,68.2c-7.4,25.6-23.1,42.5-49.3,48.3   c-10.2,2.2-20.8,3-31.2,3.4C366.2,445.7,311.9,447.4,260.4,449z M205.1,335.3c45.6-23.6,90.7-47,136.7-70.9   c-45.9-24-91-47.5-136.7-71.4C205.1,240.7,205.1,287.6,205.1,335.3z"/></g></svg>
            </a>
        </div>
        <div class="main-contact">
            <div>
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" fill="#4AA163" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"width="15" height="15" viewBox="0 0 477.156 477.156" style="enable-background:new 0 0 477.156 477.156;"xml:space="preserve"><g><path d="M475.009,380.316l-2.375-7.156c-5.625-16.719-24.062-34.156-41-38.75l-62.688-17.125c-17-4.625-41.25,1.594-53.688,14.031l-22.688,22.688c-82.453-22.28-147.109-86.938-169.359-169.375L145.9,161.94c12.438-12.438,18.656-36.656,14.031-53.656l-17.094-62.719c-4.625-16.969-22.094-35.406-38.781-40.969L96.9,2.19c-16.719-5.563-40.563,0.063-53,12.5L9.962,48.659C3.899,54.69,0.024,71.94,0.024,72.003c-1.187,107.75,41.063,211.562,117.281,287.781c76.031,76.031,179.454,118.219,286.891,117.313c0.562,0,18.312-3.813,24.375-9.845l33.938-33.938C474.946,420.878,480.571,397.035,475.009,380.316z"/></g></svg>
                <p>300 206 71 34</p>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="18" viewBox="0 0 12 15"><path fill="#4AA163" fill-rule="evenodd" d="M574,120 C575.324428,120 580,114.054994 580,110.833333 C580,107.611672 577.313708,105 574,105 C570.686292,105 568,107.611672 568,110.833333 C568,114.054994 572.675572,120 574,120 Z M574,113.333333 C575.420161,113.333333 576.571429,112.214045 576.571429,110.833333 C576.571429,109.452621 575.420161,108.333333 574,108.333333 C572.579839,108.333333 571.428571,109.452621 571.428571,110.833333 C571.428571,112.214045 572.579839,113.333333 574,113.333333 Z" transform="translate(-568 -105)"/></svg>
                <p>Diagonal 71 B sur N.° 18 i - 20</p>
            </div>
            <div>
                <svg enable-background="new 0 0 64 64" width="16" height="15" version="1.1" fill="#4AA163" viewBox="0 0 64 64" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Glyph_copy_2"><path d="M63.125,9.977c-0.902-1.321-2.419-2.194-4.131-2.194H5.006c-1.676,0-3.158,0.842-4.067,2.117l31.16,25.982L63.125,9.977z"/><path d="M0.006,14.328v36.889c0,2.75,2.25,5,5,5h53.988c2.75,0,5-2.25,5-5V14.461L32.099,41.09L0.006,14.328z"/></g></svg>
                <p>escdirafaeluribeur19@educacionbogota.edu.co</p>
            </div>
        </div>
        <div class="copyright">©️ Todos los derechos reservados</div>
    </footer>
</body>
</html>