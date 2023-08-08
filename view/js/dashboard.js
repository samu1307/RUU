const d = document;

//Query bodys
const bodyDbUsers = d.querySelector('.body-db-users')
const bodyDbCourses = d.querySelector('.body-db-courses')
const bodyDbSnacks = d.querySelector('.body-db-snacks')
const bodyDbProfile = d.querySelector('.body-db-profile')
const bodyDbReport = d.querySelector('.body-db-report')
const bodys = d.querySelectorAll('.body-db')

//Query headers
const headers = d.querySelectorAll('.header-db')
const hUsers = d.querySelector('.header-db-users')
const hCourses = d.querySelector('.header-db-courses')
const hSnacks = d.querySelector('.header-db-snacks')
const hProfile = d.querySelector('.header-db-profile')
const hReport = d.querySelector('.header-db-report')

//Query btnMenu
const btnMenus = d.querySelectorAll('.menu-icon')

//Query NAV
const nav = d.querySelector('.nav')
const jc = d.querySelectorAll('.jc-s')
const iconImg = d.querySelectorAll('.icon-img')
const svgIcon = d.querySelectorAll('.svg-icon')

//Query HTML
const html = d.querySelector('html')

//Click btn menu
btnMenus.forEach(m=>{
    m.addEventListener('click', ()=>{

        headers.forEach(h=>{
            h.style.position = 'absolute'
        })
        
        const pBodys = (
            uT, 
            uL,
            uI,
            cT,
            cL,
            cI,
            sT,
            sL,
            sI,
            pT,
            pL,
            pI,
            rT,
            rL,
            rI
        )=>{
            let rootSet = d.documentElement.style

            rootSet.setProperty('--uTop', uT)
            rootSet.setProperty('--uLeft', uL)
            rootSet.setProperty('--uIndex', uI)
            rootSet.setProperty('--cTop', cT)
            rootSet.setProperty('--cLeft', cL)
            rootSet.setProperty('--cIndex', cI)
            rootSet.setProperty('--sTop', sT)
            rootSet.setProperty('--sLeft', sL)
            rootSet.setProperty('--sIndex', sI)
            rootSet.setProperty('--pTop', pT)
            rootSet.setProperty('--pLeft', pL)
            rootSet.setProperty('--pIndex', pI)
            rootSet.setProperty('--rTop', rT)
            rootSet.setProperty('--rLeft', rL)
            rootSet.setProperty('--rIndex', rI)

        }

        html.style.overflow = 'hidden'

        switch (m.id) {
            case 'users':
                
                let ifUsers = bodyDbUsers.classList.length

                if(ifUsers == 4 || ifUsers == 5 ){

                    pBodys('27vh', '70vw', '60',
                            '24vh', '65vw', '50',
                            '21vh', '60vw', '40',
                            '18vh', '55vw', '30',
                            '15vh', '50vw', '20')
                    
                    bodyDbUsers.classList.add('body-view-menu-users')
                    bodyDbCourses.classList.add('body-view-menu-courses')
                    bodyDbSnacks.classList.add('body-view-menu-snacks')
                    bodyDbProfile.classList.add('body-view-menu-profile')
                    bodyDbReport.classList.add('body-view-menu-report')
                    bodyDbUsers.classList.remove('load-profile')
            
                }else{
                    bodyDbUsers.classList.remove('body-view-menu-users')
                    bodyDbCourses.classList.remove('body-view-menu-courses')
                    bodyDbSnacks.classList.remove('body-view-menu-snacks')
                    bodyDbProfile.classList.remove('body-view-menu-profile')
                    bodyDbReport.classList.remove('body-view-menu-report')
            
                    headers.forEach(h=>{
                        setTimeout(()=>{
                            h.style.position = 'fixed'
                        }, 500)
                    })
            
                    html.style.overflow = 'auto'
                }

            break;
            case 'courses':
                
                let ifCourses = bodyDbCourses.classList.length 
                
                if(ifCourses == 5){

                    pBodys('24vh', '65vw', '50',
                            '27vh', '70vw', '60',
                            '21vh', '60vw', '40',
                            '18vh', '55vw', '30',
                            '15vh', '50vw', '20')
                                
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
            
                    headers.forEach(h=>{
                        setTimeout(()=>{
                            h.style.position = 'fixed'
                        }, 500)
                    })
            
                    html.style.overflow = 'auto'
                }

            break;
            case 'snacks':
            
                let ifSnacks = bodyDbSnacks.classList.length

                if(ifSnacks == 5 ){
            
                    pBodys('21vh', '60vw', '40',
                            '24vh', '65vw', '50',
                            '27vh', '70vw', '60',
                            '18vh', '55vw', '30',
                            '15vh', '50vw', '20')

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
            
                    headers.forEach(h=>{
                        setTimeout(()=>{
                            h.style.position = 'fixed'
                        }, 500)
                    })
            
                    html.style.overflow = 'auto'
                }

            break;
            case 'profile':
                
                if(bodyDbProfile.classList.length == 5 ){
            
                    pBodys('18vh', '55vw', '30',
                            '21vh', '60vw', '40',
                            '24vh', '65vw', '50',
                            '27vh', '70vw', '60',
                            '15vh', '50vw', '20')

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
            
                    headers.forEach(h=>{
                        setTimeout(()=>{
                            h.style.position = 'fixed'
                        }, 500)
                    })
            
                    html.style.overflow = 'auto'
                }

            break;
            case 'report':
                
                if(bodyDbReport.classList.length == 4 ){
            
                    pBodys('15vh', '50vw', '20',
                            '18vh', '55vw', '30',
                            '21vh', '60vw', '40',
                            '24vh', '65vw', '50',
                            '27vh', '70vw', '60')

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
            
                    headers.forEach(h=>{
                        setTimeout(()=>{
                            h.style.position = 'fixed'
                        }, 500)
                    })
            
                    html.style.overflow = 'auto'
                }

            break;
        }
    })
})


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
            case 'profile':

                //Llama funcion de posición de body para perfil
                setValue('15vh', '50vw', '30', '-10vh', '-45vw', '80')
                //Añade clase para ejecutar animacion
                bodyDbProfile.classList.add('load-profile')

            break;

        // + + Se ejecuta si se quiere entrar a los cursos + + //
            case 'course':

                //Llama funcion de posición de body para curso
                setValue('21vh', '60vw', '50', '-10vh', '-35vw', '80')
                //Añade clase para ejecutar animacion
                bodyDbCourses.classList.add('load-profile')
            break;

        // + + Se ejecuta si se quiere entrar a los usuarios + + //
            case 'user':

                if(bodyDbUsers.clientTop != '27vh'){
                    // Llama funcion de posición de body para usuario
                    setValue('21vh', '60vw', '50', '-10vh', '-35vw', '80')
                }

                bodyDbUsers.classList.add('load-profile')
            break;

        // + + Se ejecuta si se quiere entrar a los refrigerios + + //
            case 'snack':

                //Llama funcion de posición de body para refrigerio
                setValue('18vh', '55vw', '40', '-10vh', '-40vw', '80')
                //Añade clase para ejecutar animacion
                bodyDbSnacks.classList.add('load-profile')
            break;

        // + + Se ejecuta si se quiere hacer un reporte + + //
            case 'report':

                //Llama funcion de posición de body para reporte
                setValue('12vh', '45vw', '20', '-10vh', '-50vw', '80')
                //Añade clase para ejecutar animacion
                bodyDbReport.classList.add('load-profile')
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

//heightHover
const heightHover = ()=>{
    iconImg.forEach(e=>{
        svgIcon.forEach(i=>{
            let heightI = i.clientHeight
            e.style.height = `${heightI}px`
        })
    })
}

document.addEventListener('DOMContentLoaded', ()=>{
    heightHover();
})
window.addEventListener('resize', ()=>{
    heightHover();
})
