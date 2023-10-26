import { queryFetch } from './ajax.js';
import { report } from './designReports.js';
const user = document.querySelectorAll('.db-main-card')

export function reportUsers(){
    let url = '../controllers/reports.controller.php?report=users';
    queryFetch(url, null, info=>{
        let data = JSON.parse(info)
        const opciones = {
            margin: 10,
            filename: 'reporte_usuarios.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2},
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'landscape' }
        };
        html2pdf(report(data), opciones);
    })
}

