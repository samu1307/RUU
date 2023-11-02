import { reportUsers } from "./modules/reports.js";

const d = document;

//Deploy Users
/* Coordinador */
const divCoor = d.querySelector('.section-coor');
const btnDeploCoor = d.getElementById('deploy-coor');
/* Auxiliar */
const divAux = d.querySelector('.section-aux');
const btnDeploAux = d.getElementById('deploy-aux');

//Query card
const cards = d.querySelectorAll('.db-main-card');
const btnsViewMore = d.querySelectorAll('.view-more');

//Query bodys
let bodyDbUsers = d.querySelector('.body-db-users')
let bodyDbCourses = d.querySelector('.body-db-courses')
const bodyDbSnacks = d.querySelector('.body-db-snacks')
const bodyDbProfile = d.querySelector('.body-db-profile')
const bodyDbReport = d.querySelector('.body-db-report')
const bodys = d.querySelectorAll('.body-db')

//Query headers
const headers = d.querySelectorAll('.header-db')

//Query btnMenu
const btnMenus = d.querySelectorAll('.menu-icon');

//Query NAV
const nav = d.querySelector('.nav')

//Query HTML
const html = d.querySelector('html')

//Search
const searchs = d.querySelectorAll('#search-element');
const cardsSearch = d.querySelectorAll('.db-main-card');

//Delete Alert
const bodyDashboard = d.getElementById('body-dash');
const deleteUser = d.getElementById('delete-btn-el');
const cDeleteUser = d.getElementById('delete-btn-ca');
const btnDelete = d.querySelectorAll('.card-btn-delete');
const btnCloseDelete = d.getElementById('close-delete');

//btnSectionsMenu
const sections = d.querySelectorAll('.btn-menu-menu')

// btnMenus
const menusBtn = d.querySelectorAll('.menu-icon');

//Antes: 200Lineas
//Ahora: 48Lineas

function addPage(bodys, vari = null){
    let position = [
        'first',
        'second',
        'third',
        'fourth',
        (bodys[2] == null)? 'third' : 'fifth'
    ]
    bodys.forEach((b, i)=>{
        if(b){
            html.style.overflow = 'hidden';
            let oldClass1 = b.classList.item(5);
            b.classList.remove(oldClass1)
            b.classList.toggle(`${position[i]}-page`)
            b.style.pointerEvents = "none";
            if(vari){
                setTimeout(()=>{
                    html.style.overflow = 'auto';
                    b.style.pointerEvents = "auto";
                    b.classList.remove(`${position[i]}-page`)
                }, 1000)
            }   
        }
    })
}

function addZi(bodys){
    let position = [
        'first',
        'second',
        'third',
        'fourth',
        (bodys[2] == null)? 'third' : 'fifth'
    ]
    bodys.forEach((b, i)=>{
        if(b){
            let oldClass2 = b.classList.item(4);
            b.classList.remove(oldClass2)
            b.classList.add(`zi-${position[i]}`)
        }
    })
}

menusBtn.forEach(btn=>{
    btn.addEventListener('click', ()=>{
        bodys.forEach(b=>{b.style.height="100vh"})
        switch (btn.id){
            case 'users':
                addZi([bodyDbUsers, bodyDbCourses, bodyDbSnacks, bodyDbProfile, bodyDbReport]);    
                addPage([bodyDbUsers, bodyDbCourses, bodyDbSnacks, bodyDbProfile, bodyDbReport]);    
            break;
            case 'courses':
                addZi([bodyDbCourses, bodyDbSnacks, bodyDbProfile, bodyDbReport, bodyDbUsers]);    
                addPage([bodyDbCourses, bodyDbSnacks, bodyDbProfile, bodyDbReport, bodyDbUsers]);    
            break;
            case 'snacks':
                addZi([bodyDbSnacks, bodyDbProfile, bodyDbReport, bodyDbUsers, bodyDbCourses]);    
                addPage([bodyDbSnacks, bodyDbProfile, bodyDbReport, bodyDbUsers, bodyDbCourses]);    
            break;
            case 'profile':
                addZi([bodyDbProfile, bodyDbReport, bodyDbUsers, bodyDbCourses, bodyDbSnacks]);    
                addPage([bodyDbProfile, bodyDbReport, bodyDbUsers, bodyDbCourses, bodyDbSnacks]);    
            break;
            case 'report':
                addZi([bodyDbReport, bodyDbUsers, bodyDbCourses, bodyDbSnacks, bodyDbProfile]);    
                addPage([bodyDbReport, bodyDbUsers, bodyDbCourses, bodyDbSnacks, bodyDbProfile]);    
            break;
        }
    })
})

//Search
searchs.forEach(i=> {
    cardsSearch.forEach(c=>{
        i.addEventListener('keyup', ()=>{
            divCoor.classList.add('deploy-coors');
            divAux.classList.add('deploy-auxs');

            if(c.dataset.name){
                let name = c.dataset.name;
                
                if(i.value != ''){
                    
                    let logicName = name.toLowerCase().indexOf(i.value.toLowerCase()) > -1;
                    
                    if(logicName) c.style.display = 'flex'
                    else c.style.display = 'none'
                    
                }else{
                    c.style.display = "flex";
                    divAux.classList.remove('deploy-auxs');
                }
            }
        })
    })
});

//Desplegar card
(()=>{
    btnsViewMore.forEach(btn=>{
        btn.addEventListener('click', ()=>{
            cards.forEach(card=>{
                if(btn.id == card.id) card.classList.toggle('deploy');
                else card.classList.remove('deploy');
            })
        })
    })}
)();

if(bodyDbUsers && bodyDbCourses){
    //Desplegar Coordinadores
    (()=>{
        btnDeploCoor.addEventListener('click', ()=>{
            divCoor.classList.toggle('deploy-coors');
        })
    })();

    //Desplegar Auxiliares
    (()=>{
        btnDeploAux.addEventListener('click', ()=>{
            divAux.classList.toggle('deploy-auxs');
        })
    })();
}

//Antes: 100Lineas
//Ahora: 28Lineas

sections.forEach(sec=>{
    sec.addEventListener('click', ()=>{
        switch (sec.id){
            case 'userMenu':
                bodyDbUsers.style.height="auto"
                addPage([bodyDbUsers, bodyDbCourses, bodyDbSnacks, bodyDbProfile, bodyDbReport], 1);    
                addZi([bodyDbUsers, bodyDbCourses, bodyDbSnacks, bodyDbProfile, bodyDbReport]);    
            break;
            case 'courseMenu':
                bodyDbCourses.style.height="auto"
                addPage([bodyDbCourses, bodyDbSnacks, bodyDbProfile, bodyDbReport, bodyDbUsers], 1);    
                addZi([bodyDbCourses, bodyDbSnacks, bodyDbProfile, bodyDbReport, bodyDbUsers]);    
            break;
            case 'snackMenu':
                bodyDbSnacks.style.height="auto"
                addPage([bodyDbSnacks, bodyDbProfile, bodyDbReport, bodyDbUsers, bodyDbCourses], 1);    
                addZi([bodyDbSnacks, bodyDbProfile, bodyDbReport, bodyDbUsers, bodyDbCourses]);    
            break;
            case 'profileMenu':
                bodyDbProfile.style.height="auto"
                addPage([bodyDbProfile, bodyDbReport, bodyDbUsers, bodyDbCourses, bodyDbSnacks], 1);    
                addZi([bodyDbProfile, bodyDbReport, bodyDbUsers, bodyDbCourses, bodyDbSnacks]);    
            break;
            case 'reportMenu':
                bodyDbReport.style.height="auto"
                addPage([bodyDbReport, bodyDbUsers, bodyDbCourses, bodyDbSnacks, bodyDbProfile], 1);    
                addZi([bodyDbReport, bodyDbUsers, bodyDbCourses, bodyDbSnacks, bodyDbProfile]);    
            break;
        }
        sections.forEach((s, i)=>{
            s.classList.toggle('click-sections', sec.id == s.id)
        })
    })
})

btnDelete.forEach(btn=>{
    btn.addEventListener('click', ()=>{
        let id = btn.dataset.deleteid;
        deleteUser.href = `../controllers/dashboard.controller.php?method=delete&id=${id}`
        bodyDashboard.classList.add('activeDeleteDiv');
    })
})

let closeDeleteDiv = [cDeleteUser, btnCloseDelete]
closeDeleteDiv.forEach(btn=>{
    btn.addEventListener('click', ()=>{
        bodyDashboard.classList.remove('activeDeleteDiv');
    })
})


/* GENERAR REPORTES */

let btnReport = document.getElementById('report-btn-user');
btnReport.addEventListener('click', e=>{
    btnReport.innerHTML = '<img id="gift-load-report" src="./img/loading.gif">';
    reportUsers((info, report)=>{
        const load = d.getElementById('gift-load-report'); 
        setTimeout(()=>{
            load.parentNode.removeChild(load)
            btnReport.innerHTML = 'Generar<br>reporte<br>usuarios';
        }, 4000)
        let data = JSON.parse(info)
        const opciones = {
            margin: 10,
            filename: 'reporte_usuarios.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2},
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'landscape' }
        };
        html2pdf(report(data), opciones);
    });
})