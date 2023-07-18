const d = document;
const bodySlider = d.querySelector('.left__body-slider');

(function (){
    let marginLeft = bodySlider.style.marginLeft;
    console.log(bodySlider.style.marginLeft)
    setInterval(()=>{
        switch (marginLeft) {
            case '':
                console.log()   
                marginLeft = '-100%'    
                break;
            case '-100%':
                console.log(marginLeft)
                marginLeft = '-200%'    
                break;        
            case '-200%':
                console.log(marginLeft)
                marginLeft = '0px'    
                break;
        }
    }, 3000)
})()