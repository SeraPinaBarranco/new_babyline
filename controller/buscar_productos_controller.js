let printIcon = function (_cell, _formatterParams, _onRendered) {
  return `<i class="fas fa-edit"></i>`;
};

let table2 = new Tabulator("#example-table", {
  pagination: "local",
  paginationSize: 15,
  paginationSizeSelector: [25, 45, 60, 80],
  movableColumns: true,
  paginationCounter: "rows",
  columns: [
    //Define Table Columns

    {
      title: "Nombre",
      field: "nombre",
      editor: "input",
      cellEdited: (cell) => {
        //console.log(cell._cell.row.cells[8].element.innerHTML)
        cell._cell.row.cells[8].element.innerHTML =
          '<i class="fas fa-edit" style="color:green"></i>';
      },
    },
    {
      title: "Fabricante",
      field: "fabricante",
      editor: "input",
      cellEdited: (cell) => {
        //console.log(cell._cell.row.cells[8].element.innerHTML)
        cell._cell.row.cells[8].element.innerHTML =
          '<i class="fas fa-edit" style="color:green"></i>';
      },
    },
    {
      title: "Cantidad",
      field: "cantidad_existente",
      editor: "input",
      cellEdited: (cell) => {
        //console.log(cell._cell.row.cells[8].element.innerHTML)
        cell._cell.row.cells[8].element.innerHTML =
          '<i class="fas fa-edit" style="color:green"></i>';
      },
    },
    {
      title: "Codigo Barra",
      field: "codigo_barra",
      editor: "input",
      cellEdited: (cell) => {
        //console.log(cell._cell.row.cells[8].element.innerHTML)
        cell._cell.row.cells[8].element.innerHTML =
          '<i class="fas fa-edit" style="color:green"></i>';
      },
    },
    {
      title: "Codigo Interno",
      field: "codigo_interno",
      editor: "input",
      cellEdited: (cell) => {
        //console.log(cell._cell.row.cells[8].element.innerHTML)
        cell._cell.row.cells[8].element.innerHTML =
          '<i class="fas fa-edit" style="color:green"></i>';
      },
    },
    {
      title: "Precio Compra",
      field: "precio_compra",
      editor: "input",
      cellEdited: (cell) => {
        //console.log(cell._cell.row.cells[8].element.innerHTML)
        cell._cell.row.cells[8].element.innerHTML =
          '<i class="fas fa-edit" style="color:green"></i>';
      },
    },
    {
      title: "Precio Venta",
      field: "precio_venta",
      editor: "input",
      cellEdited: (cell) => {
        //console.log(cell._cell.row.cells[8].element.innerHTML)
        cell._cell.row.cells[8].element.innerHTML =
          '<i class="fas fa-edit" style="color:green"></i>';
      },
    },
    {
      title: "Ubicacion",
      field: "ubicacion",
      editor: "input",
      cellEdited: (cell) => {
        //console.log(cell._cell.row.cells[8].element.innerHTML)
        cell._cell.row.cells[8].element.innerHTML =
          '<i class="fas fa-edit" style="color:green"></i>';
      },
    },
    {
      title: "Id",
      field: "id_producto",
      hozAlign: "center",
      formatter: printIcon,
      cellClick: (_e, cell) => {
        //console.log(cell._cell.element.innerHTML)
        //cell._cell.element.innerHTML = '<p>ss</p>'

        //! TODO al clickar editar valores
        let entradas = Object.values(cell.getRow().getData());

        editarValoresTabla(entradas);
      },
    },
  ],
});

let form = document.forms[0];

window.addEventListener("load", (_event) => {
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

// function tabulator(tabledata) {
//   let table2 = new Tabulator("#example-table", {
//     //height: 205, // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)

//     data: tabledata, //assign data to table
//     progressiveLoad: "load", //enable progressive loading
//     progressiveLoadDelay: 200,
//     layout: "fitColumns", //fit columns to width of table (optional)
//     columns: [
//       //Define Table Columns
//       {
//         title: "Nombre",
//         field: "nombre",
//         cellClick: function (e, column) {
//           //e - the click event object
//           //column - column component
//           console.log(e);
//         },
//       },
//       { title: "Fabricante", field: "fabricante" },
//       { title: "Cantidad", field: "cantidad_existente" },
//       { title: "Codigo Barra", field: "codigo_barra" },
//       { title: "Codigo Interno", field: "codigo_interno" },
//       { title: "Precio Compra", field: "precio_compra" },
//       { title: "Precio Venta", field: "precio_venta" },
//       { title: "Ubicacion", field: "ubicacion" },
//     ],
//   });
// }

//! Edita los valores de la tabla

function editarValoresTabla(datos) {
  //URL de la peticion
  console.log(datos);
  let url = "./model/class_editar_producto.php";

  //configurar la peticion. AQUI CONFIGURO LA PETICION
  let configFetch = {
    method: "POST",
    body: `datos=${datos}`,
    //headers: { "Content-Type": "application/x-www-form-urlencoded" },
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
  };

  //mandar la peticion
  let promesa = fetch(url, configFetch);
  //Ejecutar la promesa que devuelve la peticion
  promesa
    .then((res) => res.text())
    .then((_datos) => {
      console.log(_datos);
    });
}
