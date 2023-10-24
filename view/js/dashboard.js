import { queryFetch } from "./modules/ajax.js";

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
const bodyDbUsers = d.querySelector('.body-db-users')
const bodyDbCourses = d.querySelector('.body-db-courses')
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
let h = bodyDbUsers.clientHeight;

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
    let position = ['first', 'second', 'third', 'fourth', 'fifth']
    bodys.forEach((b, i)=>{
        let oldClass1 = b.classList.item(5);
        b.classList.remove(oldClass1)
        b.classList.add(`${position[i]}-page`)
        if(vari){
            setTimeout(()=>{
                b.classList.remove(`${position[i]}-page`)
            }, 1000)
        }
    })
}

function addZi(bodys){
    let position = ['first', 'second', 'third', 'fourth', 'fifth']
    bodys.forEach((b, i)=>{
        let oldClass2 = b.classList.item(4);
        b.classList.remove(oldClass2)
        b.classList.toggle(`zi-${position[i]}`)
    })
}

menusBtn.forEach(btn=>{
    btn.addEventListener('click', ()=>{
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

//Antes: 100Lineas
//Ahora: 28Lineas

sections.forEach(sec=>{
    sec.addEventListener('click', ()=>{
        sections.forEach(s=>{
            switch (sec.id){
                case 'userMenu':
                    addZi([bodyDbUsers, bodyDbCourses, bodyDbSnacks, bodyDbProfile, bodyDbReport]);    
                    addPage([bodyDbUsers, bodyDbCourses, bodyDbSnacks, bodyDbProfile, bodyDbReport], 1);    
                break;
                case 'courseMenu':
                    addZi([bodyDbCourses, bodyDbSnacks, bodyDbProfile, bodyDbReport, bodyDbUsers]);    
                    addPage([bodyDbCourses, bodyDbSnacks, bodyDbProfile, bodyDbReport, bodyDbUsers], 1);    
                break;
                case 'snackMenu':
                    addZi([bodyDbSnacks, bodyDbProfile, bodyDbReport, bodyDbUsers, bodyDbCourses]);    
                    addPage([bodyDbSnacks, bodyDbProfile, bodyDbReport, bodyDbUsers, bodyDbCourses], 1);    
                break;
                case 'profileMenu':
                    addZi([bodyDbProfile, bodyDbReport, bodyDbUsers, bodyDbCourses, bodyDbSnacks]);    
                    addPage([bodyDbProfile, bodyDbReport, bodyDbUsers, bodyDbCourses, bodyDbSnacks], 1);    
                break;
                case 'reportMenu':
                    addZi([bodyDbReport, bodyDbUsers, bodyDbCourses, bodyDbSnacks, bodyDbProfile]);    
                    addPage([bodyDbReport, bodyDbUsers, bodyDbCourses, bodyDbSnacks, bodyDbProfile], 1);    
                break;
            }
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