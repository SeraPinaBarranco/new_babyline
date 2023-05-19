import { requestText, mostarMensaje } from "./operaciones_clientes.js"

let form = document.forms[0]

form.addEventListener('submit', async (e)=>{
    e.preventDefault()
    let inputCliente = document.querySelector('#categoria')

    
    let uri = "./model/class_registrar_categoria.php"
    // let uri = "./model/class_registrar_cliente.php"
    let campos = `categoria=${inputCliente.value}`

    
    const res = requestText(uri,campos)

    res
        .then((res) => (res.text())
        .then((data) => {
            console.log(data)            
            mostarMensaje(data) 
            setTimeout(() => {
                form.reset()
                //window.location.href = "./"                          
            }, 2000); 
        })    
    )
          
})
