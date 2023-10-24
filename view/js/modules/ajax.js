export function queryFetch(url, data, funct = undefined){

    let op = {
        method: "POST",
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'enctype': 'multipart/form-data'
        },
        body: JSON.stringify(data)
    }

    fetch(url, op)
    .then(res=> res.text())
    .then(json=>{funct(json);})
    .catch(err=>console.error(err))
}