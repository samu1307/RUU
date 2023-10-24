//Adecua el viewPort al tamaño de pantalla
export function heightViewport(){
    const setHeightProperty = () => {
        document.documentElement.style.setProperty('--height', `${window.innerHeight}px`);
    };

    window.addEventListener('DOMContentLoaded', () => {
        setHeightProperty();
        window.addEventListener('resize', setHeightProperty);
    });
}

//Verifica si hay un usuario en el LocalStore
export function ifUser(){
    let user = localStorage.getItem('email');
    if(!user) location.href = 'login.php';
}