const d = document;

/* Functions */
import { btnSelectLeft, btnSelectRight } from './modules/slider.js';
import { queryFetch } from './modules/ajax.js';
import { heightViewport } from './modules/validations.js';

const urlS = new URL(location.href);
let idSnackUrl = urlS.searchParams.get('id');
let urlCreate = '../../controllers/dashboard.controller.php?method=create&create=snack'
let urlUpdate = `../../controllers/dashboard.controller.php?method=update&create=snack&id=${idSnackUrl}`

/* ViewPort */
heightViewport()

const form = d.querySelector('form')
const leftBtn = d.getElementById('type-btn-a');
const rightBtn = d.getElementById('type-btn-b');

const snackCant = d.getElementById('snackCant');
const refriDescri = d.getElementById('refriDecription');

/* Validation Form */
(()=>{

    /* Array Inputs */
    const inputs = [snackCant, refriDescri]
    const btnSelect = [leftBtn, rightBtn]

    form.addEventListener('submit', e=>{
        e.preventDefault();

        let a = 0

        /* Logic */
        let validateType = leftBtn.classList.length == 3 || rightBtn.classList.length == 3;
        
        if(!validateType){
            a++
            leftBtn.classList.add('alert');
            leftBtn.classList.remove('off');
            rightBtn.classList.add('alert');
            rightBtn.classList.remove('off');
        }

        /* Validation */
        inputs.forEach(i=>{
            if(i.value.length == 0){
                i.classList.add('alert');
                a++
            }else{
                i.classList.remove('alert')
            }
        })

        let formData = new FormData(form);
        let data = {
            type: formData.get('name'),
            cant: formData.get('lastname'),
            descri: formData.get('number'),
            
        }

        if(a==0){
            if(btnSubmit.value == "Actualizar usuario"){
                queryFetch(urlUpdate, data, (j)=>{
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
    leftBtn.addEventListener('click', ()=>{btnSelectLeft(leftBtn, rightBtn)})
    rightBtn.addEventListener('click', ()=>{btnSelectRight(leftBtn, rightBtn)})
})();
