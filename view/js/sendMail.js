import { queryFetch } from "./modules/ajax.js";

const d = document;
const form = d.querySelector('form');
const parentDiv = d.querySelector('.div-form-email');
const validateEmail =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;

/* ViewPort */
const setHeightProperty = () => {
    document.documentElement.style.setProperty('--height', `${window.innerHeight}px`);
};

window.addEventListener('DOMContentLoaded', () => {
    setHeightProperty();
    window.addEventListener('resize', setHeightProperty);
});

form.addEventListener('submit', e=>{
    e.preventDefault();

    localStorage.clear();
    let email = new FormData(form).get('email');
    let url = `../helpers/sendMail.php?to=${email}&method=send`;
    let numEma = email.indexOf('@');
    let arrDecode = email.split('');
    for (let i = 3; i < numEma; i++) {
        arrDecode.splice(i, 1, '*')
    }
    let emailEncode = arrDecode.join('');
    
    queryFetch(url, null, code=>{
        if(code){
            let emailStorage = {email, emailEncode, code}
            localStorage.setItem('email', JSON.stringify(emailStorage));
            location.href = "recucode.php";
        }
    })
})

