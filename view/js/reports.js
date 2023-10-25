let btnReport = document.querySelector('.reportBtn');
console.log(btnReport)
btnReport.addEventListener('click', e=>{
    e.preventDefault();
    html2pdf(btnReport)
})