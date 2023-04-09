const d = document;

//Query bodys
const bodyDbUsers = d.querySelector('.body-db-users')
const bodyDbCourses = d.querySelector('.body-db-courses')
const bodyDbSnacks = d.querySelector('.body-db-snacks')
const bodyDbProfile = d.querySelector('.body-db-profile')
const bodyDbReport = d.querySelector('.body-db-report')

//Query headers
const headers = d.querySelectorAll('.header-db')
const hUsers = d.querySelector('.header-db-users')
const hCourses = d.querySelector('.header-db-courses')
const hSnacks = d.querySelector('.header-db-snacks')
const hProfile = d.querySelector('.header-db-profile')
const hReport = d.querySelector('.header-db-report')

//Query btnMenu
const btnMenuUsers = d.querySelector('#menu-icon-users')
const btnMenuCourses = d.querySelector('#menu-icon-courses')

//Query NAV
const nav = d.querySelector('.nav')
const jc = d.querySelectorAll('.jc-s')
const iconImg = d.querySelectorAll('.icon-img')
const svgIcon = d.querySelectorAll('.svg-icon')

//Query HTML
const html = d.querySelector('html')




//heightHover
const heightHover = ()=>{
    iconImg.forEach(e=>{
        svgIcon.forEach(i=>{
            let heightI = i.clientHeight
            e.style.height = `${heightI}px`
        })
    })
}

//Menu users
btnMenuUsers.addEventListener('click', ()=>{
    if(bodyDbUsers.classList.length == 4 ){

        headers.forEach(h=>{
            h.style.position = 'absolute'
        })

        bodyDbUsers.classList.add('body-view-menu-users')
        bodyDbCourses.classList.add('body-view-menu-courses')
        bodyDbSnacks.classList.add('body-view-menu-snacks')
        bodyDbProfile.classList.add('body-view-menu-profile')
        bodyDbReport.classList.add('body-view-menu-report')

        html.style.overflow = 'hidden'
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
})

//Menu Courses
btnMenuCourses.addEventListener('click', ()=>{

    let ifCourses = bodyDbCourses.classList.value 
    let classCourses = 'body-db-courses body-db df cxy'
    
    if(ifCourses == classCourses){

        bodyDbCourses.classList.remove('load-profile')
        
        headers.forEach(h=>{
            h.style.position = 'absolute'
        })
        
        bodyDbCourses.classList.add('body-view-menu-courses1')
        bodyDbUsers.classList.add('body-view-menu-users1')
        bodyDbSnacks.classList.add('body-view-menu-snacks1')
        bodyDbProfile.classList.add('body-view-menu-profile1')
        bodyDbReport.classList.add('body-view-menu-report1')
        
        html.style.overflow = 'hidden'

    }else{

        // bodyDbCourses.classList.add('load-profile')

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
})

jc.forEach(e=>{
    e.addEventListener('click', ()=>{

        e.classList.add('click-sections')
        html.style.overflow = 'auto'
        
        if(e.id == 'profile'){
            bodyDbProfile.classList.add('load-profile')
            setTimeout(()=>{
                bodyDbProfile.style.zIndex = '70'
            }, 2000)
        }else if(e.id == 'course'){
            
        }else if(e.id == 'user'){

        }else if(e.id == 'snack'){

        }else if(e.id == 'report'){

        }

        
        setTimeout(()=>{
            bodyDbUsers.classList.remove('body-view-menu-users')
            bodyDbCourses.classList.remove('body-view-menu-courses')
            bodyDbSnacks.classList.remove('body-view-menu-snacks')
            bodyDbProfile.classList.remove('body-view-menu-profile')
            bodyDbReport.classList.remove('body-view-menu-report')
            bodyDbCourses.classList.remove('load-profile')
        }, 2000)
    })
})

document.addEventListener('DOMContentLoaded', ()=>{
    heightHover();
})
window.addEventListener('resize', ()=>{
    heightHover();
})
