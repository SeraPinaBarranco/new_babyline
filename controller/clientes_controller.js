import { requestText } from "./operaciones_clientes.js"

let form = document.forms[0]
let btnRegistrar = document.querySelector('#btnRegistrar')

// window.addEventListener("load", (event) => {
//     console.log("page is fully loaded");
// });

form.addEventListener('submit', async (e)=>{
    e.preventDefault()
    let inputCliente = document.querySelector('#cliente')

    let uri = "./model/class_registrar_cliente.php"
    let campos = `cliente=${inputCliente.value}`

    
    const res = requestText(uri,campos) 

    console.log(res)

      
    
})





