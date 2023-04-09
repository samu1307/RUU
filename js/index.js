const d = document;
const head = d.querySelector('.main-head');
const main = d.querySelector('main')
const foot = d.querySelector('footer')
const map = d.querySelector('.map')
const lazyLoad = d.querySelectorAll('.lazy-load')
const btnMenu = d.querySelector('.btn-menu');
const menuHeader = d.querySelector('.menu-slider-header');
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
const videoI = d.querySelector('.videoIframe')
const mapI = d.querySelector('.mapIframe')

lazyLoad.forEach(e=>{
    console.log(e.loading)
})

//Funcion para relacion cuadrada en elemento y en Div
const cuadrado = ()=>{
    aSections.forEach(e=>{
        if(menuHeader.classList.length == 2){
            menuHeader.style.height = `${menuHeader.clientWidth}px`
        }else{
            menuHeader.style.height = '0'
        }
        e.style.height = `${e.clientWidth}px`
    })
};

//Designar alto de a-sections al redimencionar
window.addEventListener('resize', cuadrado)

const menuIndex = ()=>{
    btnMenu.addEventListener('click', ()=>{
        menuHeader.classList.toggle('menu-header-open')
        head.classList.toggle('opacity-off')
        main.classList.toggle('opacity-off')
        foot.classList.toggle('opacity-off')
        cuadrado();
    });
    
    aSections.forEach(i=>{
        i.addEventListener('click', ()=>{
            head.classList.remove('opacity-off')
            main.classList.remove('opacity-off')
            foot.classList.remove('opacity-off')
            setTimeout(()=>{
                aSections.forEach(e=>{
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
}

const navAnimated = ()=>{
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
menuIndex();
sliderL();
sliderR();

//Designar alto de a-sections al cargar
d.addEventListener('DOMContentLoaded', cuadrado)
