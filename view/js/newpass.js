import { queryFetch } from './modules/ajax.js'
import { heightViewport, ifUser } from './modules/validations.js'

ifUser()
heightViewport();

const d = document;
const inputOne = d.getElementById('passone');
const inputTwo = d.getElementById('passverify');
const view = d.getElementById('view');
const form = d.querySelector('form');
const passLenght = d.querySelector('.pass-lenght');
const passEqual = d.querySelector('.pass-equal');
const parentDiv = d.querySelector('.div-form-email');
const cardUpdate = d.querySelector('.userUpdate');
const btn = d.getElementById('btnSubmit')

view.addEventListener('change', ({ target }) => {
    inputOne.type = inputTwo.type = target.checked ? 'text' : 'password';
});

function validatePass(){
    let valInputOne = inputOne.value.trim();
    let valInputTwo = inputTwo.value.trim();
    let ifPassLenght = valInputOne.length >= 6 && valInputTwo.length >= 6 
    let ifPassEqual = valInputOne === valInputTwo
    let ifInputOne = !valInputOne || valInputOne.length >= 6 && !ifPassEqual;
    let ifInputTwo = !valInputTwo || valInputTwo.length >= 6 && !ifPassEqual;
    

    inputOne.classList.toggle('alert', ifInputOne);
    inputTwo.classList.toggle('alert', ifInputTwo);
    passEqual.classList.toggle('db', ifPassLenght && !ifPassEqual);
    passLenght.classList.toggle('db', !ifPassLenght);
    
    let ifReturn = ifPassLenght && ifPassEqual && (valInputOne && valInputTwo)

    if(ifReturn) return true
    return false
}

d.addEventListener('keyup', validatePass)

form.addEventListener('submit', e => {
    e.preventDefault();
    if(validatePass()){
        const email = JSON.parse(localStorage.getItem('email'));
        let data = { email: email.email, passNew: inputOne.value };
    
        queryFetch('../controllers/updatePass.php?method=updatePass', data, res=>{
            if(res == 1){
                btn.value = 'Actualizando...'
                cardUpdate.classList.add('cardNew')
                parentDiv.classList.add('bodyInvalid')
                setTimeout(()=>{
                    btn.value = 'Enviar'
                    parentDiv.classList.remove('bodyInvalid')
                    cardUpdate.classList.remove('cardNew')
                    location.href = "login.php";
                }, 5100)
            }
        });
    }else{
        inputOne.classList.add('alert');
        inputTwo.classList.add('alert');
    }
    
});