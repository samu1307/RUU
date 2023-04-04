const d = document;
const inputPass = d.querySelector('#inputPass');
const btnPass = d.querySelector('#btnPass');
const hidden = d.querySelector('.hidden')
const visible = d.querySelector('.visible')

const viewPass = ()=>{
    btnPass.addEventListener('click', ()=>{
        hidden.style.opacity = '0'
        visible.style.opacity = '1'
        inputPass.type = 'text';
        setTimeout(()=>{
            hidden.style.opacity = '1'
            visible.style.opacity = '0'
            inputPass.type = 'password';
        },2500)
    })
}

viewPass();