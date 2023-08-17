const d = document;

/* Body */
const body = d.getElementById('body-login');

/* Body left */
const bodySlider = d.querySelector('.left__body-slider');
const bodyStyle = bodySlider.style;


/* Box input */
const boxRols = d.querySelector('.alertRol').style;
const boxUser = d.querySelector('.alertUser').style;
const boxPass = d.querySelector('.alertPass').style;
const boxLogin = d.querySelector('.alertLogin');

/* Colors */
let redAlert = "#ff5959bb";

/* Form */ 
const form = d.getElementById('form');
const user = d.getElementById('user');
const pass = d.getElementById('pass');
const btnSend = d.getElementById('btnSubmit');
const rolAux = d.getElementById('rol-btn-aux');
const rolCoor = d.getElementById('rol-btn-coor');

/* * Btns Rol * */
let rolCoorClass = rolCoor.classList;
let rolAuxClass = rolAux.classList;

/* Coordinador */
(()=>{
    rolCoor.addEventListener('click', ()=>{

        /* Logica */
        let validateOff = rolCoorClass.length == 2 && rolAuxClass.length == 2;
        let validateOne = rolCoorClass.length == 2 && rolAuxClass.length == 3;

        /* Validaciones */
        if (validateOff){
            rolCoorClass.add('rol-btn-active')
            rolCoorClass.add('off')
            rolCoorClass.remove('alert')
        }else if(validateOne){
            rolCoorClass.add('rol-btn-active')
            rolCoorClass.remove('alert')
            rolAuxClass.remove('rol-btn-active')
        }else{
            rolCoorClass.remove('rol-btn-active')
        }
    })
})();

/* Auxiliar */
(()=>{
    rolAux.addEventListener('click', ()=>{

        /* Logica */
        let validateOff = rolCoorClass.length == 2 && rolAuxClass.length == 2;
        let validateOne = rolCoorClass.length == 3 && rolAuxClass.length == 2;

        /* Validaciones */
        if (validateOff){
            rolAuxClass.add('rol-btn-active')
            rolAuxClass.add('off')
            rolAuxClass.remove('alert')
        }else if(validateOne){
            rolAuxClass.add('rol-btn-active')
            rolAuxClass.remove('alert')
            rolCoorClass.remove('rol-btn-active')
        }else{
            rolAuxClass.remove('rol-btn-active')
        }
    })
})();

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
            rol: (rolCoorClass.length == 3)? 'coor': 'aux',
            user: data.get('user'),
            pass: data.get('pass')
        }
        console.log(formData)
        /* Submit */
        if (i == 0) queryFetch(formData);
    })
})();

/* * Petición AJAX * */
let queryFetch = (data)=>{

    let url = "http://localhost/ruu/controllers/login.controller.php";
    let op = {
        method: "POST",
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }

    fetch(url, op)
    .then(res=> res.text())
    .then(json=>{
        if(json == 1){
            body.classList.add('bodyLoad')
            setTimeout(() => {
                location.href = 'dashboard.php'
            }, 3000);
        }
        else {
            boxLogin.innerHTML = "Usuario invalido";
            user.classList.add('alert');
            pass.classList.add('alert');
            form.addEventListener('keydown', ()=>{
                boxLogin.innerHTML = "";
                user.classList.remove('alert');
                pass.classList.remove('alert');
            })
        }
    })
    .catch(err=>console.error(err))
}
