let table2 = new Tabulator("#example-table", {
  pagination:"local",
  paginationSize:15,
  paginationSizeSelector:[25, 45, 60, 80],
  movableColumns:true,
  paginationCounter:"rows",
  columns: [
    //Define Table Columns
    { title: "Id", field: "id_producto", visible:false, download:true },
    {
      title: "Nombre",
      field: "id_producto", formatter:"link", formatterParams:{
        labelField:"nombre",
        urlPrefix:"index.php?id=",
        target:"",
    },
      cellClick: function (e, column) {
        //e - the click event object
        //column - column component
        console.log(e.target.parent);
      },
    },
    {
      title: "Fabricante",
      field: "fabricante",
      cellClick: (e) => {
        console.log(e);
      },
    },

    { title: "Cantidad", field: "cantidad_existente" },
    { title: "Codigo Barra", field: "codigo_barra" },
    { title: "Codigo Interno", field: "codigo_interno" },
    { title: "Precio Compra", field: "precio_compra" },
    { title: "Precio Venta", field: "precio_venta" },
   
  ],
});

table2.on("rowClick", function(row){
  console.log(row)
});

let form = document.forms[0];

window.addEventListener("load", (event) => {
  console.log("page is fully loaded");
});

// let table = new DataTable("#myTable", {
//   // options
// });

form.addEventListener("submit", (event) => {
  event.preventDefault();

  buscarProducto();
  //tabulator();
});

/**
 * !Busca productos en la base de datos
 * !por Nombre, Cod-Barra o Cod-Interno
 */
function buscarProducto() {
  let valor = document.querySelector("#buscar").value;
  let divTabla = document.querySelector("#tabla");

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
      
      table2.setData(datos);
      
    });
}

function tabulator(tabledata) {
  let table2 = new Tabulator("#example-table", {
    //height: 205, // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)

    data: tabledata, //assign data to table
    progressiveLoad: "load", //enable progressive loading
    progressiveLoadDelay: 200,
    layout: "fitColumns", //fit columns to width of table (optional)
    columns: [
      //Define Table Columns
      {
        title: "Nombre",
        field: "nombre",
        cellClick: function (e, column) {
          //e - the click event object
          //column - column component
          console.log(e);
        },
      },
      { title: "Fabricante", field: "fabricante" },
      { title: "Cantidad", field: "cantidad_existente" },
      { title: "Codigo Barra", field: "codigo_barra" },
      { title: "Codigo Interno", field: "codigo_interno" },
      { title: "Precio Compra", field: "precio_compra" },
      { title: "Precio Venta", field: "precio_venta" },
    ],
  });
}
