import { btnSelectLeft, btnSelectRight } from './modules/slider.js';
import { heightViewport } from './modules/validations.js';
import { queryFetch } from './modules/ajax.js';

heightViewport();

const d = document;

/* Body */
const body = d.getElementById('body-login');
const btnViewPass = d.getElementById('viewPass')
const iViewPass = d.querySelector('#viewPass > i')

/* Body left */
const bodySlider = d.querySelector('.left__body-slider');
const bodyStyle = bodySlider.style;


/* Box input */
const boxRols = d.querySelector('.alertRol').style;
const boxUser = d.querySelector('.alertUser').style;
const boxPass = d.querySelector('.alertPass').style;
const boxLogin = d.querySelector('.alertLogin');

/* Form */ 
const form = d.getElementById('form');
const user = d.getElementById('userLogin');
const pass = d.getElementById('passLogin');
const btnSend = d.getElementById('btnSubmit');
const rolAux = d.getElementById('rol-btn-aux');
const rolCoor = d.getElementById('rol-btn-coor');

/* * Btns Rol * */
let rolCoorClass = rolCoor.classList;
let rolAuxClass = rolAux.classList;

/* Coordinador */
(()=>{
    rolCoor.addEventListener('click', ()=>{
        btnSelectLeft(rolCoor, rolAux);
    })
})();

/* Auxiliar */
(()=>{
    rolAux.addEventListener('click', ()=>{
        btnSelectRight(rolCoor, rolAux)
    })
})();

function viewPass(){
    const isPassword = pass.type === 'password';
    pass.type = isPassword ? 'text' : 'password';
    iViewPass.classList.replace(isPassword ? 'la-eye-slash' : 'la-eye', isPassword ? 'la-eye' : 'la-eye-slash');
    if (isPassword) {
        setTimeout(() => {
            pass.type = 'password';
            iViewPass.classList.replace('la-eye', 'la-eye-slash');
        }, 3000);
    }
}

btnViewPass.addEventListener('click', viewPass);

localStorage.removeItem('email')

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

    const observer = new IntersectionObserver(cb, {threshold: 0.8})

    secCard.forEach(e => observer.observe(e))
})();


/* * VALIDACION  * */
(()=>{
    form.addEventListener('submit', (e)=>{
        e.preventDefault();
        
        let i = 0;

        /* Logica */
        let validateRol = rolCoorClass.length == 3 || rolAuxClass.length == 3;
        let validateUser = user.value.length != 0;
        let validatePass = pass.value.length != 0;

        /* Validaciones */
        
        /* Roles */
        if(!validateRol){
            boxRols.display = "block";
            rolCoorClass.remove('off');
            rolAuxClass.remove('off');
            rolCoorClass.add('alert');
            rolAuxClass.add('alert');
            i++
        }else{
            boxRols.display = 'none';
            rolCoorClass.add('off');
            rolAuxClass.add('off');
            rolCoorClass.remove('alert');
            rolAuxClass.remove('alert');
        }

        /* User */
        if(!validateUser){
            boxUser.display = "block";
            user.classList.add('alert');
            i++
        }else{
            boxUser.display = 'none';
            user.classList.remove('alert');
            user.classList.add('normal');
        }

        /* Pass */
        if(!validatePass){
            boxPass.display = "block";
            pass.classList.add('alert');
            i++
        }else{
            boxPass.display = 'none';
            pass.classList.remove('alert');
            pass.classList.add('normal');
        } 
        
        /* Get dates form */
        let data = new FormData(form);
        
        /* Data */
        let formData = {
            rol: (rolCoorClass.length == 3)? 'Coordinador': 'Auxiliar',
            user: data.get('user'),
            pass: data.get('pass'),
            record: (data.get('record') == 'on')? 'active' : 'inactive'
        }

        let url = '../controllers/login.controller.php';

        /* Submit */
        if (i == 0) queryFetch(url, formData, (json)=>{
            console.log(json)
            if(json == 1){
                btnSend.value = 'Validando...';
                body.classList.add('bodyLoad')
                body.classList.add('bodyInvalid')
                setTimeout(() => {
                    location.href = 'dashboard.php'
                    setTimeout(()=>{
                        btnSend.value = 'Ingresar';
                        body.classList.remove('bodyLoad')
                        body.classList.remove('bodyInvalid')
                    }, 5000)
                }, 3000);
            }else{
                boxLogin.innerHTML = "Usuario incorrecto";
                user.classList.add('alert');
                pass.classList.add('alert');
                form.addEventListener('keydown', ()=>{
                    boxLogin.innerHTML = "";
                    user.classList.remove('alert');
                    pass.classList.remove('alert');
                })
            }
        });
    })
})();
