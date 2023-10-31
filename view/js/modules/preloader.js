const d = document;
const spinner = d.querySelector('.spinner');

function preloaderOff(){
    spinner.classList.add('loadDiv');
    d.body.classList.remove('loadBody')
}

window.addEventListener('load', ()=>{

    setTimeout(preloaderOff, 1000)
})