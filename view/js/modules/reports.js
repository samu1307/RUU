import { queryFetch } from './ajax.js';
import { report } from './designReports.js';
const user = document.querySelectorAll('.db-main-card')

export function reportUsers(fun = undefined){
    let url = '../controllers/reports.controller.php?report=users';
    queryFetch(url, null, info=>{
        fun(info, report);
    })
}

