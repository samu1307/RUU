const d = document;

/* Functions */
import { btnSelectLeft, btnSelectRight } from './modules/slider.js';
import { queryFetch } from './modules/ajax.js';
import { heightViewport } from './modules/validations.js';


/* URL */
const urlS = new URL(location.href);
let idCourseUrl = urlS.searchParams.get('id');
let urlCreate = '../../controllers/dashboard.controller.php?method=create&create=course'
let urlUpdate = `../../controllers/dashboard.controller.php?method=update&create=course&id=${idCourseUrl}`

/* ViewPort */
heightViewport()

const cardNew = d.querySelector('.userCreated');
const cardUpdate = d.querySelector('.userUpdate');
const bodyCourse = d.querySelector('.body-course');

/* Form */
const form = d.getElementById('createCourse');

/* Inputs */
const iName = d.getElementById('name');
const iLastName = d.getElementById('lastname');
const iNumber = d.getElementById('number');
const iEmail = d.getElementById('email');
const btnSubmit = d.getElementById('btnSubmit');

/* Btn Select */
const jorM = d.getElementById('jor-btn-mañana');
const jorT = d.getElementById('jor-btn-tarde');
const corA = d.getElementById('course-active');
const corI = d.getElementById('course-inactive');

/* Validation Form */
(()=>{

    /* Array Inputs */
    const inputs = [iName, iLastName, iNumber, iEmail]
    
    form.addEventListener('submit', e=>{
        e.preventDefault();
        let a = 0


        /* Logic */
        let validateJor = jorM.classList.length == 3 || jorT.classList.length == 3;
        
        if(!validateJor){
            a++
            jorM.classList.add('alert');
            jorM.classList.remove('off');
            jorT.classList.add('alert');
            jorT.classList.remove('off');
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
            grado: formData.get('name'),
            curso: formData.get('lastname').toUpperCase(),
            jornada: (jorM.classList.length == 3)? 'M': 'T',
            alumnos: formData.get('number'),
            director: formData.get('email'),
            estado: (corA.classList.length == 3)? 'A': 'I'
        }

        console.log(data)
        

        if(a==0){
            if(btnSubmit.value == "Actualizar curso" && idCourseUrl){
                queryFetch(urlUpdate, data, (j)=>{
                    btnSubmit.value = 'Actualizando...';
                    cardUpdate.classList.add('cardNew');
                    bodyCourse.classList.add('bodyInvalid');
                    setTimeout(()=>{
                        location.href = '../dashboard.php';
                    }, 5100)
                });
            }else{
                queryFetch(urlCreate, data, (j)=>{  
                    btnSubmit.value = 'Insertando...';
                    cardNew.classList.add('cardNew');
                    bodyCourse.classList.add('bodyInvalid');
                    setTimeout(()=>{
                        location.href = '../dashboard.php';
                    }, 5100)
                });
            }

        }
    })

})();

/* Validation Btn Select */
(()=>{
    jorM.addEventListener('click', ()=>{btnSelectLeft(jorM, jorT)})
    jorT.addEventListener('click', ()=>{btnSelectRight(jorM, jorT)})
    if(idCourseUrl){
        corA.addEventListener('click', ()=>{btnSelectLeft(corA, corI)})
        corI.addEventListener('click', ()=>{btnSelectRight(corA, corI)})
    }
})();