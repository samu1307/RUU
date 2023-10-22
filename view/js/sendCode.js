const d = document;

(()=>{
    if(!localStorage.getItem('email')) location.href = 'login.php';
})()

const emailDiv = d.getElementById('emailDecode');
const form = d.querySelector('form');

let email = JSON.parse(localStorage.getItem('email'));
emailDiv.innerText = email.emailEncode;

form.addEventListener('submit', e=>{
    e.preventDefault();

    let code = new FormData(form).get('code');
    if(code == email.code){
        location.href = 'newpass.php';
        localStorage.removeItem('email');
    }
    else alert('no coincide')
})

