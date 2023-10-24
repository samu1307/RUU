import { heightViewport, ifUser } from './modules/validations.js';

ifUser();
heightViewport();

const d = document;
const form = d.querySelector('form');
const input = d.querySelector('.normal');
const emailDiv = d.getElementById('emailDecode');

let email = JSON.parse(localStorage.getItem('email'));
emailDiv.innerText = email.emailEncode;

form.addEventListener('submit', e=>{
    e.preventDefault();
    let code = new FormData(form).get('code');
    if(code == email.code){
        location.href = 'newpass.php';
    }
    else{
        let alert = d.querySelector('.alertUser');
        input.classList.add('alert');
        alert.style.display = 'flex';
    }
})

