const d = document;
const head = d.querySelector('.main-head');
const main = d.querySelector('main')
const foot = d.querySelector('footer')
const map = d.querySelector('.map')
const btnNight = d.querySelector('#btn-night');
const lazyLoad = d.querySelectorAll('.lazy-load')
const btnMenu = d.querySelector('.btn-menu');
const mH = d.querySelector('.menu-slider-header');
const navIndex = d.querySelector('#nav-index');
const navNavIndex = d.querySelector('.nav-nav-index');
const btnLogin = d.querySelector('.btn-login')
const aSections = d.querySelectorAll('.a-sections')
const mSlider = d.querySelector('.main-slider')
const MainISlider = d.querySelector('.main-img-slider') 
const imgSlider = d.querySelectorAll('img[data-spy="scroll"]')
const btnL = d.querySelector('#row-btn-l');
const btnR = d.querySelector('#row-btn-r');
const divSlider = d.querySelector('.img-slider');
const videoI = d.querySelector('.videoIframe');
const mapI = d.querySelector('.mapIframe');
const dateH4 = d.querySelector('#main-date');

//Preparados
const menuHeaderS = mH.style;
const menuHeaderC = mH.classList;

(function (){
    btnNight.addEventListener('click', ()=>{
        if(btnNight.style.marginLeft != '50%'){
            btnNight.style.marginLeft = '50%'
        }else btnNight.style.marginLeft = '0'
    })
})()

//Creación de arrays para fecha

    //Mes
    let months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']

    //Dia
    const days = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo']

//Colocar fecha index
const date = new Date();
let dateToday = date.toDateString();
dateH4.innerHTML = `${days[date.getDay() - 1]}, ${date.getDate()} de ${months[date.getMonth()]} de ${date.getUTCFullYear()}`


//Funcion para relacion cuadrada en elemento y en Div
const cuadrado = ()=>{
    aSections.forEach(e=>{
        e.style.height = `${e.clientWidth}px`;
        return e.clientWidth;
    })
};

//Designar alto de a-sections al redimencionar
window.addEventListener('resize', cuadrado);

//
let darkBg = ()=>{
    head.classList.toggle('opacity-off');
    main.classList.toggle('opacity-off');
    foot.classList.toggle('opacity-off');
}

//
(()=>{
    btnMenu.addEventListener('click', ()=>{
        let heighNav = navIndex.clientHeight + mH.clientWidth;
        menuHeaderC.toggle('menu-header-open');
        navIndex.style.height = `${heighNav}px`;
        menuHeaderS.height = `${}px`;
        darkBg();
    });
    
    aSections.forEach(i=>{
        i.addEventListener('click', ()=>{
            console.log(i)
            console.log('______')
            darkBg();
            setTimeout(()=>{
                aSections.forEach(e=>{
                    console.log(e)
                    if(e.id != i.id){
                        e.style.opacity = '0.5'
                        e.style.scale = '1'
                    } 
                    else{
                        i.style.opacity = '1'
                        i.style.scale = '1.1'
                    } 
                })
            },600)
            setTimeout(()=>{
                menuHeader.style.height = '0'
                menuHeader.classList.remove('menu-header-open')
            }, 1000)
        })
    });
})();

const navAnimated = ()=>{
    if(innerWidth <= 480){
        document.addEventListener('scroll', ()=>{
            if(scrollY < 20){
                navNavIndex.style.boxShadow = ''
                navNavIndex.style.padding = '5% 5% 2.5%'
                btnLogin.style.padding = '3vw 4vw'
            }else{
                navNavIndex.style.boxShadow = '0 2px 15px rgba(0, 0, 0, .3)'
                navNavIndex.style.padding = '2.5% 5%'
                btnLogin.style.padding = '2.5vw 3.5vw'
            }
        })
    }
}

const sliderL = ()=>{
    btnL.addEventListener('click', ()=>{
        if(divSlider.style.marginLeft == ''){
            divSlider.style.marginLeft = '-99%'
        }else if(divSlider.style.marginLeft == '-99%'){
            divSlider.style.marginLeft = '-48.5%'
        }else if(divSlider.style.marginLeft == '-48.5%'){
            divSlider.style.marginLeft = ''

        }
    })
}

const sliderR = ()=>{
    btnR.addEventListener('click', ()=>{
        if(divSlider.style.marginLeft == ''){
            divSlider.style.marginLeft = '-48.5%'
        }else if(divSlider.style.marginLeft == '-48.5%'){
            divSlider.style.marginLeft = '-99%'
        }else if(divSlider.style.marginLeft == '-99%'){
            divSlider.style.marginLeft = ''
        }
    })
}

const scrollSpy = ()=>{

    const cb = (entries)=>{

        entries.forEach(i => {
            let di = i.target.dataset.img;
            if(i.isIntersecting){
                d.querySelector(`button[data-img="${di}"]`)
                .classList.add('btn-active')
                i.target.style.scale = '1.1'
            }else{
                d.querySelector(`button[data-img="${di}"]`)
                .classList.remove('btn-active')
                i.target.style.scale = '1'
            }
        })
    }

    const observer = new IntersectionObserver(cb, {
        threshold: 0.8
    })

    imgSlider.forEach(e => observer.observe(e))
}

const lazyLoading = ()=>{

    const cb = (entrys)=>{
        entrys.forEach(i=>{
            if(i.isIntersecting){
                console.log(i)
            }
        })
    }

    const observe = new IntersectionObserver(cb, {
        threshold: 0.1,
        root: d
    })

    lazyLoad.forEach(e=> observe.observe(e))

}

scrollSpy();
lazyLoading();
navAnimated();
sliderL();
sliderR();

//Designar alto de a-sections al cargar
d.addEventListener('DOMContentLoaded', cuadrado)
