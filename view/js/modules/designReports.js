export function report(data){

    let coor = '';
    data.forEach((e,i)=>{
        coor += `<div class="db-main-card ${(e.estado == 'A')? 'user-active' : 'user-inactive'} df deploy" style="margin-top: 30px;">
        <div style="background: #E5E9F6;" class="main-card-cont">
            <div class="main-card-cont-first df">
                <div class="cont-main-card-img df cxy">
                    <div class="main-card-img">
                        <img src="./img/iconuser1.png" alt="Iconos de usuario">
                    </div>
                    <p>${e.rol}</p>
                </div>
                <div class="cont-main-card-descri df">
                    <div class="main-card-descri">
                        <div>${(e.rol == 'Coordinador')? e.ncoor : e.naux} ${(e.rol == 'Coordinador')? e.acoor : e.aaux}</div>
                    </div>
                    <div class="main-card-info df" id="dn-card">
                        <span>Jornada:</span>
                        <div>${(e.rol == 'Coordinador')? e.jcoor : e.jaux}</div>
                    </div>
                </div>
            </div>
            <div class="main-card-cont-second">
                <div class="main-card-email df w100">
                    <span>Correo</span>
                    <div>${(e.rol == 'Coordinador')? e.ccoor : e.caux}</div>
                </div>
                <div class="main-card-number-user df w100">
                    <div class="main-card-number w100">
                        <span>Telefono</span>
                        <div>${(e.rol == 'Coordinador')? e.tcoor : e.taux}</div>
                    </div>
                    <div class="main-card-user w100">
                        <span>Usuario</span>
                        <div>${e.usuario}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="line-active-user h100"></div>
    </div>`;
    });

    let style = `
    .cont-db-main-card{
        gap: 3%;
        width: 100%;
        flex-wrap: wrap;
        align-items: start;
        flex-direction: row;
        justify-content: start;
    }
    
    .db-main-card{
        width: 30%;
        margin-bottom: 7%;
        border-radius: 10px;
    }
    
    .main-card-cont-first{padding: 1.5vw 1.5vw 0;}
    
    .cont-main-card-img > p{font-size: 1.5vw;}
    
    .main-card-descri > div{font-size: 1.8vw;}

    .main-card-info > span{margin-right: .5vw;}

    .main-card-info > span,
    .main-card-info > div{
        font-size: 1.7vw;
    }
    
    .main-card-email,
    .main-card-number-user{
        font-size: 1.8vw;
    }
    
    .main-card-email > div,
    .main-card-number > div,
    .main-card-user > div{
        overflow: visible;
        word-wrap: break-word;
    }`

    return `<head>
                <style>
                    ${style}
                </style>
            </head>
            <body>
                <h1 style="text-align: center;">Usuarios</h1>
                <div class="cont-db-main-card df">
                    ${coor}
                </div>
            </body>`
}