const d = document;
const bodySlider = d.querySelector('.left__body-slider');
const bodyStyle = bodySlider.style;

/* Secciones */
  //Card
  const secCard = d.querySelectorAll('.left__body-slider-sec');
  //Btn
  const secBtn = d.querySelectorAll('.login-sec-btn');


//Slider Animation
setInterval(()=>{
    switch (bodyStyle.marginLeft) {
        case '0px':
            setTimeout(()=>{
                bodyStyle.marginLeft = '-100%'
            }, 1000)
        break;
        case '-100%':
            setTimeout(()=>{
                bodyStyle.marginLeft = '-200%'
            }, 1000)
        break;
        case '-200%':
            setTimeout(()=>{
                bodyStyle.marginLeft = '0px'
            }, 1000)
        break;
    }
}, 10000);

//Scroll Spy for Btn
(()=>{

    const cb = (entries)=>{

        entries.forEach(i => {
            let di = i.target.dataset.slider;
            if(i.isIntersecting){
                d.querySelector(`button[data-slider="${di}"]`)
                .classList.add('login-btn-active');
                i.target.classList.add('login-sec-active');
            }else{
                d.querySelector(`button[data-slider="${di}"]`)
                .classList.remove('login-btn-active');
                i.target.classList.remove('login-sec-active');
            }
        })
    }

    const observer = new IntersectionObserver(cb, {
        threshold: 0.8
    })

    secCard.forEach(e => observer.observe(e))
})()