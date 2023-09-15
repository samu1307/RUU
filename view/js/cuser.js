const d = document;

/* Functions */
import { btnSelectLeft, btnSelectRight } from './modules/validation.js';
import { queryFetch } from './modules/ajax.js';


/* URL */
const urlS = new URL(location.href);
let idUserUrl = urlS.searchParams.get('id');
let idRolUrl = urlS.searchParams.get('__');
let urlCreate = '../../controllers/dashboard.controller.php?method=create'
let urlUpdate = `../../controllers/dashboard.controller.php?method=update&idUser=${idUserUrl}&idRol=${idRolUrl}`

/* ViewPort */
const setHeightProperty = () => {
    document.documentElement.style.setProperty('--height', `${window.innerHeight}px`);
};

window.addEventListener('DOMContentLoaded', () => {
    setHeightProperty();
    window.addEventListener('resize', setHeightProperty);
});

const cardNew = d.querySelector('.userCreated');
const cardUpdate = d.querySelector('.userUpdate');
const bodyUser = d.querySelector('.body-user');

/* Form */
const form = d.getElementById('createUser');

/* Inputs */
const iName = d.getElementById('name');
const iLastName = d.getElementById('lastname');
const iNumber = d.getElementById('number');
const iEmail = d.getElementById('email');
const iUser = d.getElementById('user');
const iPass = d.getElementById('pass');
const btnSubmit = d.getElementById('btnSubmit');

/* Btn Select */
const jorM = d.getElementById('jor-btn-mañana');
const jorT = d.getElementById('jor-btn-tarde');
const rolC = d.getElementById('rol-btn-coor');
const rolA = d.getElementById('rol-btn-aux');

/* Validation Form */
(()=>{

    /* Array Inputs */
    const inputs = [iName, iLastName, iNumber, iEmail, iUser, iPass]
    const btnSelect = [jorM, jorT, rolC, rolA]

    iNumber.addEventListener('keyup', ()=>{
        if(iNumber.value.length > 10) iNumber.value = iNumber.value.substring(0, 10);
    })

    form.addEventListener('submit', e=>{
        e.preventDefault();

        let a = 0

        if(!idUserUrl){

            /* Logic */
            let validateJor = jorM.classList.length == 3 || jorT.classList.length == 3;
            let validateRol = rolC.classList.length == 3 || rolA.classList.length == 3;
            
            if(!validateJor){
                a++
                jorM.classList.add('alert');
                jorM.classList.remove('off');
                jorT.classList.add('alert');
                jorT.classList.remove('off');
            }if(!validateRol){
                a++
                rolC.classList.add('alert');
                rolC.classList.remove('off');
                rolA.classList.add('alert');
                rolA.classList.remove('off');
            }
        }

        /* Validation */
        inputs.forEach(i=>{
            if(i.value.length == 0){
                i.classList.add('alert');
                a++
            }else{
                i.classList.remove('alert')
                if(iNumber.value.length != 10){
                    iNumber.classList.add('alert');
                    a++
                }  
            }
        })
                
        let formData = new FormData(form);
        let data = {
            namee: formData.get('name'),
            lastname: formData.get('lastname'),
            number: formData.get('number'),
            email: formData.get('email'),
            jornada: (jorM.classList.length == 3)? 'M': 'T',
            user: formData.get('user'),
            pass: formData.get('pass'),
            rol: (rolC.classList.length == 3)? 'Coordinador': 'Auxiliar'
        }

        if(a==0){
            if(btnSubmit.value == "Actualizar usuario"){
                queryFetch(urlUpdate, data, (j)=>{
                    console.log(j)
                    btnSubmit.value = 'Actualizando...';
                    cardUpdate.classList.add('cardNew');
                    bodyUser.classList.add('bodyInvalid');
                    setTimeout(()=>{
                        location.href = '../dashboard.php';
                    }, 5100)
                });
            }else{
                queryFetch(urlCreate, data, (j)=>{
                    btnSubmit.value = 'Insertando...';
                    cardNew.classList.add('cardNew');
                    bodyUser.classList.add('bodyInvalid');
                    setTimeout(()=>{
                        btnSubmit.value = 'Crear usuario';
                        setTimeout(()=>{
                            cardNew.classList.remove('cardNew');
                            bodyUser.classList.remove('bodyInvalid')
                        }, 1500)
                        inputs.forEach(i=>{i.value = ''})
                        btnSelect.forEach(btn=>{btn.classList.remove('rol-btn-active')})
                    }, 3000)
                });
            }

        }
    })

})();

/* Validation Btn Select */
(()=>{
    jorM.addEventListener('click', ()=>{btnSelectLeft(jorM, jorT)})
    jorT.addEventListener('click', ()=>{btnSelectRight(jorM, jorT)})
    rolC.addEventListener('click', ()=>{btnSelectLeft(rolC, rolA)})
    rolA.addEventListener('click', ()=>{btnSelectRight(rolC, rolA)})
})();
