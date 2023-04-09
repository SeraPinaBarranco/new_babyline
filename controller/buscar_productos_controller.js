let updateIcom = function (_cell, _formatterParams, _onRendered) {
  return `<i class="fas fa-edit"></i>`;
};

let deleteIcom = function (_cell, _formatterParams, _onRendered) {
  return `<i class="fa-solid fa-delete-left" style="color:red"></i>`;
};


let table2 = new Tabulator("#example-table", {
  printRowRange: "all",
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
      title: "Editar",
      field: "id_producto",
      hozAlign: "center",
      formatter: updateIcom,
      cellClick: (_e, cell) => {
        //console.log(cell._cell.element.innerHTML)
        //cell._cell.element.innerHTML = '<p>ss</p>'

        //! TODO al clickar editar valores
        let entradas = Object.values(cell.getRow().getData());

        editarValoresTabla(entradas);
        cell._cell.element.innerHTML = `<i class="fas fa-edit"></i>`
      },
    },
    {
      title: "Borrar",
      field: "id_producto",
      hozAlign: "center",
      formatter: deleteIcom,
      cellClick: cellClick_DeleteButton,
    },
    
  ],
});

//! Funcion de eliminar fila
function cellClick_DeleteButton(e, cell){
  //TODO llama a eliminar producto
  console.log(cell.getRow().getData().id_producto);
  borraValoresTabla(cell.getRow().getData().id_producto) 
  cell.getRow().delete()
  
}

let form = document.forms[0];


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
      if (_datos == 1 ) {
        Swal.fire({
          title: 'Editado!',
          text: 'Producto editado',
          icon: 'success',
          confirmButtonText: 'Aceptar',
          
        })
      }
      
    });
}

//! Borra una los valores de la BBDD
function borraValoresTabla(id) {
  //URL de la peticion
  console.log(id);
  let url = "./model/class_eliminar_producto.php";

  //configurar la peticion. AQUI CONFIGURO LA PETICION
  let configFetch = {
    method: "POST",
    body: `datos=${id}`,
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