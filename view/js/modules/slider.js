export function btnSelectLeft(inputLeft, inputRight){
    
    let btnLeftClass = inputLeft.classList;
    let btnRightClass = inputRight.classList;

    /* Logica */
    let validateOff = btnLeftClass.length == 2 && btnRightClass.length == 2;
    let validateOn = btnLeftClass.length == 2 && btnRightClass.length == 3;
    
    /* Validaciones */
    if (validateOff){
        btnLeftClass.add('off')
        btnRightClass.add('off')
        btnLeftClass.remove('alert')
        btnRightClass.remove('alert')
        btnLeftClass.add('rol-btn-active')
    }else if(validateOn){
        btnLeftClass.add('off')
        btnLeftClass.remove('alert')
        btnLeftClass.add('rol-btn-active')
        btnRightClass.remove('rol-btn-active')
    }else{
        btnLeftClass.remove('rol-btn-active')
    }

}

export function btnSelectRight(inputLeft, inputRight){

    let btnLeftClass = inputLeft.classList;
    let btnRightClass = inputRight.classList;

    /* Logica */
    let validateOff = btnLeftClass.length == 2 && btnRightClass.length == 2;
    let validateOn = btnLeftClass.length == 3 && btnRightClass.length == 2;
    
    /* Validaciones */
    if (validateOff){
        btnLeftClass.add('off')
        btnRightClass.add('off')
        btnLeftClass.remove('alert')
        btnRightClass.remove('alert')
        btnRightClass.add('rol-btn-active')
    }else if(validateOn){
        btnRightClass.add('off')
        btnRightClass.add('rol-btn-active')
        btnRightClass.remove('alert')
        btnLeftClass.remove('rol-btn-active')
    }else{
        btnRightClass.remove('rol-btn-active')
    }
}