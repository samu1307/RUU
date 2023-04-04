const d = document;
const btnMenu = d.querySelector('.btn-menu');
const menuHeader = d.querySelector('#menu-slider-header');
const navIndex = d.querySelector('#nav-index');
const navNavIndex = d.querySelector('.nav-nav-index');
const btnLogin = d.querySelector('.btn-login')
const aSections = d.querySelectorAll('.a-sections')
const mSlider = d.querySelector('.main-slider')
const imgSlider = d.querySelectorAll('img[data-spy="scroll"]')
const btnL = d.querySelector('#row-btn-l');
const btnR = d.querySelector('#row-btn-r');
const divSlider = d.querySelector('.img-slider');
const videoI = d.querySelector('.videoIframe')
const mapI = d.querySelector('.mapIframe')

const menuIndex = ()=>{
    btnMenu.addEventListener('click', ()=>{
        menuHeader.classList.toggle('menu-header-close')
    });
    
    aSections.forEach(e=>{
        e.addEventListener('click', ()=>{
            menuHeader.classList.add('menu-header-close')
        })
    });
}

const navAnimated = ()=>{
    document.addEventListener('scroll', ()=>{
        if(scrollY < 20){
            navIndex.classList.remove('nav-fixed')
            navNavIndex.style.padding = '5% 5% 2.5%'
            btnLogin.style.padding = '3vw 4vw'
        }else{
            navIndex.classList.add('nav-fixed')
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

scrollSpy();
navAnimated();
menuIndex();
sliderL();
sliderR();


