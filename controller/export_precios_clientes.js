import { requestText } from "./operaciones_clientes.js";

let btnExportar = document.getElementById('btnExportar');

let divTabla = document.querySelector("#tabla");

let productos, precios, columna


let table2 = new Tabulator("#tabla", {
    columns: [
        {title: "Nombre",
        field: "Nombre_producto",
        editor: "input",},

        {title: "cliente1",
        field: "cliente1",
        editor: "input",},

        {title: "cliente2",
        field: "cliente2",
        editor: "input",},
        
    ]
})

btnExportar.addEventListener('click', () =>{
    let uri = "./model/class_export_prod_tien.php";

    let configFetch = {
    method: "POST",
    body: ``,
    //headers: { "Content-Type": "application/x-www-form-urlencoded" },
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    };

    const res = requestText(uri, configFetch);

    res
        .then((res) => res.json())
        .then((_datos) => {

            productos = _datos.productos
            precios = _datos.precios
            columna = _datos.columna

        }).finally(()=>{doExcel()});

})

//Funcion que recorre los datos para insertar los precios 
function doExcel(){
   
    let col = 0
    for (const i in precios) {

        let id = precios[i].id_producto
        let precio = "precio"
        for (const key in productos) {
            if (productos[key].ID_producto === id) {
                col ++
                
                //console.log(precios[i])
                productos[key]['cliente' + col ]= precios[i].nombreTienda
                productos[key]['precio_producto' + col]= precios[i].precio_producto
             
            }
        }        
    }
    console.log(productos)
    table2.setData(productos)

}


