import { queryFetch } from "./modules/ajax.js";
import { heightViewport } from "./modules/validations.js";

heightViewport();

const d = document;
const form = d.querySelector('form');
const input = d.querySelector('.normal');
const alert = d.querySelector('.alertUser');
const noUser = d.querySelector('.userUndefined')
const reggex =  /^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/;
const parentDiv = d.querySelector('.div-form-email');
const cardUpdate = d.querySelector('.userUpdate');
const btn = d.getElementById('btnSubmit')

// Limpiar localStorage
localStorage.removeItem('email');

function validateEmail(){
    let email = input.value
    let emailWrong = !email || !reggex.test(email)
    
    input.classList.toggle('alert', emailWrong) 
    alert.classList.toggle('db', emailWrong)
    noUser.classList.remove('db')

    if(!emailWrong) return true
    return false
}

input.addEventListener('keyup', validateEmail)

form.addEventListener('submit', e=>{
    e.preventDefault();

    let email = input.value;
    
    if(validateEmail()){
        alert.style.display = 'none'
        let url = `../helpers/sendMail.php?to=${email}&method=send`;
        let numEma = email.indexOf('@');
        let arrDecode = email.split('');
        for (let i = 3; i < numEma; i++) arrDecode.splice(i, 1, '*')
        let emailEncode = arrDecode.join('');

        queryFetch(url, null, code=>{
            if(code != 0){
                let emailStorage = {email, emailEncode, code}
                localStorage.setItem('email', JSON.stringify(emailStorage));
                btn.value = 'Enviando...'
                cardUpdate.classList.add('cardNew')
                parentDiv.classList.add('bodyInvalid')
                setTimeout(()=>{
                    btn.value = 'Enviar'
                    parentDiv.classList.remove('bodyInvalid')
                    cardUpdate.classList.remove('cardNew')
                    location.href = "recucode.php";
                }, 5100)
            }else{
                input.classList.add('alert')
                noUser.classList.add('db')
            }
        })
    }else alert.style.display = 'flex'
})

