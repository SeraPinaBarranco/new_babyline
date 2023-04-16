let form = document.forms[0];
let codigo  = document.querySelectorAll('.form-control')

let codigo_producto = document.querySelector('#codigo_producto')
codigo_producto.addEventListener('change',(e)=>{
    //console.log(e.target.value)
})
let codigo_interno = document.querySelector('#codigo_interno')
let nombre = document.querySelector('#nombre')
let fabricante = document.querySelector('#fabricante')
let cantidad = document.querySelector('#cantidad')
let precio_compra = document.querySelector('#precio_compra')
let precio_venta = document.querySelector('#precio_venta')

/**
 * !Controla que cuando se escribe y luego de borra
 * !el contenido, lo pone en rojo
 */
codigo.forEach(element => {
    element.addEventListener('change', (e)=>{
        if(e.target.value == ""){
            e.target.style.borderColor="red" 
        }else{
            e.target.style.borderColor="" 
        }
        console.log(e.target.value)
        return
    })
});


// window.addEventListener("load", (event) => {
//     console.log("page is fully loaded");
// });

form.addEventListener('submit', (event)=>{
    event.preventDefault()
    let valorForm = form.getAttribute("id")
    //buscarProducto()
    console.log(valorForm)
    // switch (valorForm) {
    //     case "registrar_producto":
             registrarProducto()           
    //         break
    //     case "buscar_producto":
    //         buscarProducto()
    //         break
    
    //     default:
    //         break;
    // }

})

/**
 * !Registra un producto en la base de datos
 */
function registrarProducto(){
    let valores = []
    
    codigo.forEach((e)=>{
        valores.push(e.value)
    })
    
    //URL de la peticion
    let url= "./model/class_registro_producto.php";
     
    //configurar la peticion. AQUI CONFIGURO LA PETICION
    let configFetch={
        method:'POST',
        body:`producto=${valores}`,       
        headers:{'Content-Type': 'application/x-www-form-urlencoded'}
    };
    
    //mandar la peticion
    let promesa = fetch(url,configFetch);

    //Ejecutar la promesa que devuelve la peticion
    promesa.then( res => res.text())
        .then(datos => {         
           let d = datos;
           console.log(datos)
           errorMsg(datos);
           
           //mostarMensaje(d)          
    });
}


/**
 * !Muestra los mensages de error que se producen en el
 * !formulario o al registrar el producto
 * @param {number} cod  
 */
function errorMsg(cod) {
    let codigo  = document.querySelectorAll('.form-control')
    if(cod == -1){
        Swal.fire({
           title: 'Error!',
           text: 'Registro duplicado',
           icon: 'error',
           confirmButtonText: 'Aceptar'
         })
    }else if(cod == 1){
        Swal.fire({
         title: 'Guardado!',
         text: 'Producto registrado',
         icon: 'success',
         confirmButtonText: 'Aceptar',
         
       }).then(()=>form.reset() )

    }else{
        Swal.fire({
            title: 'Faltan datos!',
            text: 'Introduce todos los campos',
            icon: 'warning',
            confirmButtonText: 'Aceptar',
            
          }).then(()=>{
            codigo.forEach((e)=>{
                if(e.value == ""){
                    e.style.borderColor="red"                    
                }else{
                    e.style.borderColor=""
                }
            })
          })
    }
}

/**
 * ! Poner bordes en gris cuando se ha escrito algo
 */
