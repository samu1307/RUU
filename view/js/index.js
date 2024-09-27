const d = document;
const btnMenu = d.querySelector('.btn-menu');
const navIndex = d.querySelector('#nav-index');
const aSections = d.querySelectorAll('.a-sections')
const imgSlider = d.querySelectorAll('img[data-spy="scroll"]')
const btnL = d.querySelector('#row-btn-l');
const btnR = d.querySelector('#row-btn-r');
const divSlider = d.querySelector('.img-slider');
const videoI = d.querySelector('.videoIframe');
const mapI = d.querySelector('.mapIframe');

/* Form */
const nameF = d.getElementById('name');
const emailF = d.getElementById('email');
const numberF = d.getElementById('number');
const matterF = d.getElementById('matter');
const bodyF = d.getElementById('body');
const contF = d.getElementById('form-contact');

/* Send Mail */
const contEmail = d.querySelector('.send-email');
const byEmail = d.getElementById('by-email');
const bodyEmail = d.getElementById('body-email');
const editBtn = d.getElementById('edit');
const sendBtn = d.getElementById('send');

//Oscurecer fondo
let darkBg = () => {
    d.body.classList.toggle('opacity-off');
}

let sectionOnOff = (i) => {
    darkBg();
    navIndex.classList.remove('menu-header-open')
}

//Abrir y cerrar menu movil
btnMenu.addEventListener('click', () => {
    navIndex.classList.toggle('menu-header-open');
    darkBg();
});

aSections.forEach(i => {
    i.addEventListener('click', () => { sectionOnOff(i) });
});

//Funcion para animación de nav al hacer scroll
const handleScroll = () => {
    let ifScroll = window.scrollY < (innerWidth < 1200 ? 20 : 90);
    navIndex.classList.toggle('scrollOn', !ifScroll)
};

// Asigna funcion de scroll
d.addEventListener('scroll', () => {
    handleScroll();
    let cargarRecursos = false
    while (cargarRecursos == false) {
        mapI.src = mapI.dataset.src
        videoI.src = videoI.dataset.src
        cargarRecursos = true
    }
});

/* Slider */
(() => {
    btnL.addEventListener('click', () => {
        switch (divSlider.classList.item(2)) {
            case 'moSl1':
                divSlider.classList.replace('moSl1', 'moSl3');
                break;
            case 'moSl2':
                divSlider.classList.replace('moSl2', 'moSl1');
                break;
            case 'moSl3':
                divSlider.classList.replace('moSl3', 'moSl2');
                break;
        }
    })

    btnR.addEventListener('click', () => {
        switch (divSlider.classList.item(2)) {
            case 'moSl1':
                divSlider.classList.replace('moSl1', 'moSl2');
                break;
            case 'moSl2':
                divSlider.classList.replace('moSl2', 'moSl3');
                break;
            case 'moSl3':
                divSlider.classList.replace('moSl3', 'moSl1');
                break;
        }
    })

    let cb = (entries) => {
        entries.forEach(i => {
            let di = i.target.dataset.img;
            let elem = d.querySelector(`button[data-img="${di}"]`).classList;
            if (i.isIntersecting) {
                elem.add('btn-active');
                i.target.style.scale = '1.1';
            } else {
                elem.remove('btn-active');
                i.target.style.scale = '1';
            }
        })
    }

    let observer = new IntersectionObserver(cb, { threshold: 0.8 });

    imgSlider.forEach(e => observer.observe(e));
})();

(() => {
    contF.addEventListener('submit', e => {
        e.preventDefault();

        let i = 0;

        /* Logica */
        let validateName = nameF.value.length != 0;
        let validateEmail = emailF.value.length != 0;
        let validateNumber = numberF.value.length != 0;
        let validateMatter = matterF.value.length != 0;
        let validateBody = bodyF.value.length != 0;

        /* Validaciones */

        /* Name */
        if (!validateName) {
            nameF.placeholder = "Falta el nombre";
            nameF.classList.add('alert-index');
            i++
        } else {
            nameF.placeholder = "Nombre";
            nameF.classList.remove('alert-index');
        }

        /* Email */
        if (!validateEmail) {
            emailF.placeholder = "Falta el correo";
            emailF.classList.add('alert-index');
            i++
        } else {
            emailF.placeholder = "Correo";
            emailF.classList.remove('alert-index');
        }

        /* Number */
        if (!validateNumber) {
            numberF.placeholder = "Falta el numero";
            numberF.classList.add('alert-index');
            i++
        } else {
            numberF.placeholder = "Telefono";
            numberF.classList.remove('alert-index');
        }

        /* Affair */
        if (!validateMatter) {
            matterF.placeholder = "Falta el asunto";
            matterF.classList.add('alert-index');
            i++
        } else {
            matterF.placeholder = "Asunto";
            matterF.classList.remove('alert-index');
        }

        /* Bpdy */
        if (!validateBody) {
            bodyF.placeholder = "Falta el mensaje";
            bodyF.classList.add('alert-index');
            i++
        } else {
            bodyF.placeholder = "Mensaje";
            bodyF.classList.remove('alert-index');
        }

        /* Get dates form */
        let data = new FormData(contF);

        /* Mesage VAR */
        let msg = `¡Buen dia! <br><br>
        ${data.get('body')} <br><br>
        ${data.get('name')} <br>
        ${data.get('number')}`;

        /* Data */
        let formData = {
            email: data.get('email'),
            matter: data.get('matter'),
            body: msg
        }

        /* Submit */
        if (i == 0) {
            byEmail.innerHTML = formData.email;
            matterEmail.innerHTML = formData.matter;
            bodyEmail.innerHTML = msg;
            sendEmail(formData)
        };
    })
})();

const sendEmail = (formData) => {

    contEmail.classList.add('email-active');
    darkBg();

    //Events for send email
    editBtn.addEventListener('click', () => {
        darkBg();
        contEmail.classList.remove('email-active');
    })

    sendBtn.addEventListener('click', () => {
        fetchSendEmail(formData)
    })
}
