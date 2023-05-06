import { requestText } from "./operaciones_clientes.js";

let btnExportar = document.getElementById('btnExportar');

let divTabla = document.querySelector("#tabla");

let productos, precios, columna, tiendas


window.addEventListener("load", (event) => {
    let uri = "./model/class_buscar_productos.php";

    let configFetch = {
    method: "POST",
    body: "",
    //headers: { "Content-Type": "application/x-www-form-urlencoded" },
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    };

    const res = requestText(uri, configFetch);

    res
        .then((res) => res.json())
        .then((_datos) => {

            productos = _datos
            //console.log(productos)
        })
        .finally(()=>llenarTablas())
       
});

let table2 = new Tabulator("#tabla", {
    printRowRange: "all",
    pagination: "local",
    paginationSize: 15,
    paginationSizeSelector: [25, 45, 60, 80],
    movableColumns: true,
    paginationCounter: "rows",
    //columns: [
        // {title: "Nombre",
        // field: "Nombre_producto",
        // editor: "input",},

        // {title: "cliente1",
        // field: "cliente1",
        // editor: "input",},

        // {title: "precio_producto1",
        // field: "precio_producto1",
        // editor: "input",},

        // {title: "cliente2",
        // field: "cliente2",
        // editor: "input",},
        
        // {title: "precio_producto2",
        // field: "precio_producto2",
        // editor: "input",},
    //]
})

function llenarTablas(){
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

            //productos = _datos.productos
            precios = _datos.precios
            columna = _datos.columna
            tiendas = _datos.tiendas

        })
        .finally(()=>{
            generarColumnas()
        });

}

//!Generador de cloumnas en base a JSON columna
function generarColumnas(){
    let col
    let fila
    let nColumnas = tiendas[0].tiendas

    fila =  {title: "cliente3",
        field: "Nombre_producto",
        editor: "input",}

    console.log(precios)
    console.log(columna)
    

    //TODO Generar estructura base
    table2.addColumn({title: "Nombre",
                    field: "nombre",
                    editor: "input",})
    table2.addColumn({title: "Fabricante",
        field: "fabricante",
        editor: "input",})  
    //TODO Generar estructura de clientes

    //TODO Añadir estructura a la tabla

    //TODO Cargar datos
    
    
    for (let i = 0; i < nColumnas; i++) {
       
    //     // fila = col['cliente' + i] 
         table2.addColumn({title:`cliente${i+1}`,field: `cliente${i+1}`})
         table2.addColumn({title:`precio_producto${i+1}`,field: `precio_producto${i+1}`})          
    }
    doExcel()
    //table2.setData(productos)
    //console.log(productos)
}



//Funcion que recorre los datos para insertar los precios 
function doExcel(){
   
    let col = 0
    // for (const i in precios) {

    //     let id = precios[i].id_producto
    //     let precio = "precio"
    //     for (const key in productos) {
    //         if (productos[key].id_producto === id) {
    //             col ++
                
    //             //console.log(precios[i])
    //             productos[key]['cliente' + col ]= precios[i].nombreTienda
    //             productos[key]['precio_producto' + col]= precios[i].precio_producto
                
    //         }
    //     }        
    // }

    for (const key in productos) {

        //let id = precios[i].id_producto
        //let precio = "precio"
        for (const i in precios) {
            if (productos[key].id_producto === precios[i].id_producto) {
                col ++
                
                //console.log(precios[i])
                productos[key]['cliente' + col ]= precios[i].nombreTienda
                productos[key]['precio_producto' + col]= precios[i].precio_producto
                
            }
        } 
        col = 0       
    }


    console.log(productos)
    table2.setData(productos)
    //generarColumnas()
}

