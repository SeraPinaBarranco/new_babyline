let form = document.forms[0];

window.addEventListener("load", (event) => {
  console.log("page is fully loaded");
});

let table = new DataTable("#myTable", {
  // options
});


form.addEventListener('submit', (event)=>{
    event.preventDefault()
    //let valorForm = form.getAttribute("id")
    //buscarProducto()
    //console.log("e")
    // switch (valorForm) {
    //     case "registrar_producto":
    //         registrarProducto()           
    //         break
    //     case "buscar_producto":
             buscarProducto()
    //         break
    
    //     default:
    //         break;
    // }

})

/**
 * !Busca productos en la base de datos
 * !por Nombre, Cod-Barra o Cod-Interno
 */
function buscarProducto() {
    
  let valor = document.querySelector("#buscar").value;
  

  let tabla = document.querySelector("#tabla");

  //URL de la peticion
  let url = "./model/class_buscar_productos.php";

  //configurar la peticion. AQUI CONFIGURO LA PETICION
  let configFetch = {
    method: "POST",
    body: `buscar=${valor}`,
    //headers: { "Content-Type": "application/x-www-form-urlencoded" },
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
  };

  //mandar la peticion
  let promesa = fetch(url, configFetch);
  //Ejecutar la promesa que devuelve la peticion
  promesa
    .then((res) => res.json())
    .then((datos) => {
      //let d = JSON.parse(datos);
      console.log(datos.nombre)
      //tabla.innerHTML = datos;

      //mostarMensaje(d)
    })
   
}
