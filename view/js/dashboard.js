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
console.log(btnMenus)

//Query NAV
const nav = d.querySelector('.nav')
const jc = d.querySelectorAll('.jc-s')

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

//Click btn menu
btnMenus.forEach(m=>{
    m.addEventListener('click', ()=>{
        
        const pBodys = (uT, uL,uI,uH,
                        cT,cL,cI,cH,
                        sT,sL,sI,sH,
                        pT,pL,pI,pH,
                        rT,rL,rI,rH
        )=>{
            let rootSet = d.documentElement.style

            rootSet.setProperty('--uTop', uT)
            rootSet.setProperty('--uLeft', uL)
            rootSet.setProperty('--uIndex', uI)
            rootSet.setProperty('--uHeight', uH)
            rootSet.setProperty('--cTop', cT)
            rootSet.setProperty('--cLeft', cL)
            rootSet.setProperty('--cIndex', cI)
            rootSet.setProperty('--cHeight', cH)
            rootSet.setProperty('--sTop', sT)
            rootSet.setProperty('--sLeft', sL)
            rootSet.setProperty('--sIndex', sI)
            rootSet.setProperty('--sHeight', sH)
            rootSet.setProperty('--pTop', pT)
            rootSet.setProperty('--pLeft', pL)
            rootSet.setProperty('--pIndex', pI)
            rootSet.setProperty('--pHeight', pH)
            rootSet.setProperty('--rTop', rT)
            rootSet.setProperty('--rLeft', rL)
            rootSet.setProperty('--rIndex', rI)
            rootSet.setProperty('--rHeight', rH)
        }

        html.style.overflow = 'hidden'

        switch (m.id) {
            case 'users':
            
                alert('users')
                console.log('users')

                let ifUsers = bodyDbUsers.classList.length

                if(ifUsers == 4 || ifUsers == 5 ){

                    pBodys('27vh', '70vw', '60', `${h}px`,
                            '24vh', '65vw', '50', `${h}px`,
                            '21vh', '60vw', '40', `${h}px`,
                            '18vh', '55vw', '30', `${h}px`,
                            '15vh', '50vw', '20', `${h}px`)
                    
                    bodyDbUsers.classList.add('body-view-menu-users')
                    bodyDbCourses.classList.add('body-view-menu-courses')
                    bodyDbSnacks.classList.add('body-view-menu-snacks')
                    bodyDbProfile.classList.add('body-view-menu-profile')
                    bodyDbReport.classList.add('body-view-menu-report')
                    bodyDbUsers.classList.remove('load-profile')
                    bodyDbCourses.style.display = "none"
            
                }else{
                    bodyDbUsers.classList.remove('body-view-menu-users')
                    bodyDbCourses.classList.remove('body-view-menu-courses')
                    bodyDbSnacks.classList.remove('body-view-menu-snacks')
                    bodyDbProfile.classList.remove('body-view-menu-profile')
                    bodyDbReport.classList.remove('body-view-menu-report')
            
                    headers.forEach(h=>{
                        setTimeout(()=>{
                            bodyDbSnacks.style.display = "none"
                            bodyDbProfile.style.display = "none"
                            bodyDbReport.style.display = "none"
                            h.style.position = 'fixed'
                        }, 500)
                    })
            
                    html.style.overflow = 'auto'
                }

            break;
            case 'courses':
               
                alert('courses')


                let ifCourses = bodyDbCourses.classList.length 
                
                if(ifCourses == 5){
                    
                    pBodys('24vh', '65vw', '50', `${h}px`,
                            '27vh', '70vw', '60', `${h}px`,
                            '21vh', '60vw', '40', `${h}px`,
                            '18vh', '55vw', '30', `${h}px`,
                            '15vh', '50vw', '20', `${h}px`)
                                
                    bodyDbCourses.classList.remove('load-profile')
                    bodyDbCourses.classList.add('body-view-menu-courses')
                    bodyDbUsers.classList.add('body-view-menu-users')
                    bodyDbSnacks.classList.add('body-view-menu-snacks')
                    bodyDbProfile.classList.add('body-view-menu-profile')
                    bodyDbReport.classList.add('body-view-menu-report')
                    
            
                }else{
                        
                    bodyDbUsers.classList.remove('body-view-menu-users1')
                    bodyDbCourses.classList.remove('body-view-menu-courses1')
                    bodyDbSnacks.classList.remove('body-view-menu-snacks1')
                    bodyDbProfile.classList.remove('body-view-menu-profile1')
                    bodyDbReport.classList.remove('body-view-menu-report1')
            
                    html.style.overflow = 'auto'
                }

            break;
            case 'snacks':
            
                alert('Snacks')

                let ifSnacks = bodyDbSnacks.classList.length

                if(ifSnacks == 5 ){
            
                    pBodys('21vh', '60vw', '40', `${h}px`,
                            '24vh', '65vw', '50', `${h}px`,
                            '27vh', '70vw', '60', `${h}px`,
                            '18vh', '55vw', '30', `${h}px`,
                            '15vh', '50vw', '20', `${h}px`)

                    bodyDbSnacks.classList.remove('load-profile')
                    bodyDbUsers.classList.add('body-view-menu-users')
                    bodyDbCourses.classList.add('body-view-menu-courses')
                    bodyDbSnacks.classList.add('body-view-menu-snacks')
                    bodyDbProfile.classList.add('body-view-menu-profile')
                    bodyDbReport.classList.add('body-view-menu-report')
            
                }else{
                    bodyDbUsers.classList.remove('body-view-menu-users')
                    bodyDbCourses.classList.remove('body-view-menu-courses')
                    bodyDbSnacks.classList.remove('body-view-menu-snacks')
                    bodyDbProfile.classList.remove('body-view-menu-profile')
                    bodyDbReport.classList.remove('body-view-menu-report')
            
                    html.style.overflow = 'auto'
                }

            break;
            case 'profile':
                
                alert('Snacks')

                if(bodyDbProfile.classList.length == 5 ){
            
                    pBodys('18vh', '55vw', '30', `${h}px`,
                            '21vh', '60vw', '40', `${h}px`,
                            '24vh', '65vw', '50', `${h}px`,
                            '27vh', '70vw', '60', `${h}px`,
                            '15vh', '50vw', '20', `${h}px`)

                    bodyDbUsers.classList.add('body-view-menu-users')
                    bodyDbCourses.classList.add('body-view-menu-courses')
                    bodyDbSnacks.classList.add('body-view-menu-snacks')
                    bodyDbProfile.classList.add('body-view-menu-profile')
                    bodyDbProfile.classList.remove('load-profile')
                    bodyDbReport.classList.add('body-view-menu-report')
            
                }else{
                    bodyDbUsers.classList.remove('body-view-menu-users')
                    bodyDbCourses.classList.remove('body-view-menu-courses')
                    bodyDbSnacks.classList.remove('body-view-menu-snacks')
                    bodyDbProfile.classList.remove('body-view-menu-profile')
                    bodyDbReport.classList.remove('body-view-menu-report')
            
                    html.style.overflow = 'auto'
                }

            break;
            case 'report':
                
                alert('Snacks')

                if(bodyDbReport.classList.length == 4 ){
            
                    pBodys('15vh', '50vw', '20', `${h}px`,
                            '18vh', '55vw', '30', `${h}px`,
                            '21vh', '60vw', '40', `${h}px`,
                            '24vh', '65vw', '50', `${h}px`,
                            '27vh', '70vw', '60', `${h}px`)

                    bodyDbReport.classList.remove('load-profile')
                    bodyDbUsers.classList.add('body-view-menu-users')
                    bodyDbCourses.classList.add('body-view-menu-courses')
                    bodyDbSnacks.classList.add('body-view-menu-snacks')
                    bodyDbProfile.classList.add('body-view-menu-profile')
                    bodyDbReport.classList.add('body-view-menu-report')
            
                }else{
                    bodyDbUsers.classList.remove('body-view-menu-users')
                    bodyDbCourses.classList.remove('body-view-menu-courses')
                    bodyDbSnacks.classList.remove('body-view-menu-snacks')
                    bodyDbProfile.classList.remove('body-view-menu-profile')
                    bodyDbReport.classList.remove('body-view-menu-report')
            
                    html.style.overflow = 'auto'
                }

            break;
        }
    })
});

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

jc.forEach(e=>{
    e.addEventListener('click', ()=>{
        
        //Añade animacion a las etiquetas de menu
        jc.forEach(s=>{

            let classE = e.classList.value
            let active = 'df jc-s click-sections'
            
            if(classE != active & s.id == e.id){
                e.classList.add('click-sections')
            }else{
                e.classList.add('click-sections')
                s.classList.remove('click-sections')
            }
        })
        
        //Permite el scroll en el html
        html.style.overflow = 'auto'

        //Funcion para posicion de body
        const setValue = (t, l, z, tA, lA, zA)=>{

            let rootSet = d.documentElement.style
            
            rootSet.setProperty('--top', `${t}`)
            rootSet.setProperty('--left', `${l}`)
            rootSet.setProperty('--zIndex', `${z}`)
            rootSet.setProperty('--topA', `${tA}`)
            rootSet.setProperty('--leftA', `${lA}`)
            rootSet.setProperty('--zIndexA', `${zA}`)

        }

        //Ejecuta un bloque de acuerdo a la seccion elegida
        switch (e.id) {

        // + + Se ejecuta si se quiere entrar al perfil + + //
            case 'profileMenu':

                //Llama funcion de posición de body para perfil
                setValue('15vh', '50vw', '30', '-10vh', '-45vw', '80')
                //Añade clase para ejecutar animacion
                bodyDbProfile.classList.add('load-profile')
                
                setTimeout(()=>{
                    bodyDbProfile.style.zIndex = "100"
                    bodyDbProfile.classList.remove('load-profile')
                },2000)
            break;

        // + + Se ejecuta si se quiere entrar a los cursos + + //
            case 'courseMenu':

                //Llama funcion de posición de body para curso
                setValue('21vh', '60vw', '50', '-10vh', '-35vw', '80')
                //Añade clase para ejecutar animacion
                bodyDbCourses.classList.add('load-profile')

                setTimeout(()=>{
                    bodyDbCourses.style.zIndex = "100"
                    bodyDbCourses.classList.remove('load-profile')
                },2000)
            break;

        // + + Se ejecuta si se quiere entrar a los usuarios + + //
            case 'userMenu':

                if(bodyDbUsers.clientTop != '27vh'){
                    // Llama funcion de posición de body para usuario
                    setValue('21vh', '60vw', '50', '-10vh', '-35vw', '80')
                }

                bodyDbUsers.classList.add('load-profile')
            break;

        // + + Se ejecuta si se quiere entrar a los refrigerios + + //
            case 'snackMenu':

                //Llama funcion de posición de body para refrigerio
                setValue('18vh', '55vw', '40', '-10vh', '-40vw', '80')
                //Añade clase para ejecutar animacion
                bodyDbSnacks.classList.add('load-profile')

                setTimeout(()=>{
                    bodyDbSnacks.classList.remove('load-profile')
                    bodyDbSnacks.style.zIndex = "100"
                },2000)
            break;

        // + + Se ejecuta si se quiere hacer un reporte + + //
            case 'reportMenu':

                //Llama funcion de posición de body para reporte
                setValue('12vh', '45vw', '20', '-10vh', '-50vw', '80')
                //Añade clase para ejecutar animacion
                bodyDbReport.classList.add('load-profile')

                setTimeout(()=>{
                    bodyDbReport.style.zIndex = "100"
                    bodyDbReport.classList.remove('load-profile')
                },2000)
            break;
        }
        
        setTimeout(()=>{
            bodyDbUsers.classList.remove('body-view-menu-users')
            bodyDbCourses.classList.remove('body-view-menu-courses')
            bodyDbSnacks.classList.remove('body-view-menu-snacks')
            bodyDbProfile.classList.remove('body-view-menu-profile')
            bodyDbReport.classList.remove('body-view-menu-report')

            // bodys.forEach(b=>{
            //     b.classList.remove('load-profile')
            // })

        }, 2000)
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