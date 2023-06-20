import { requestText } from "./operaciones_clientes.js";

let frm_modal = document.getElementById("frm_modal");
let btn_modal = document.getElementsByClassName("btn_modal");
let actualizar = document.querySelector("#actualizar");
let id_p = "";
let nombre_producto = "";
let btn_actualizar = document.querySelector("#dar_salida");
let parrafo_modal_salida = document.querySelector("#parrafo-modal-salida");
let btnGuardarPrecio = document.querySelector("#btnGuardarPrecio");

//! BOTONES DE LA TABLA */
let updateIcom = function (_cell, _formatterParams, _onRendered) {
  return `<i class="fas fa-edit"></i>`;
};

let ubicacionIcon = function (_cell, _formatterParams, _onRendered) {
  return `<i class="fa-solid fa-boxes-stacked" data-bs-toggle="modal" data-bs-target="#myModal"></i>`;
};

let deleteIcom = function (_cell, _formatterParams, _onRendered) {
  return `<i class="fa-solid fa-delete-left" style="color:red"></i>`;
};

let salidaIcon = function (_cell, _formatterParams, _onRendered) {
  return `<i class="fa-solid fa-box-archive" data-bs-toggle="modal" data-bs-target="#myModalSalida"></i>`;
};

let asignarPrecio = (_cell, _formatterParams, _onRendered) => {
  return `<i class="fas fa-hand-holding-usd" data-bs-toggle="modal" data-bs-target="#myModalPrecios"></i>`;
};
//! ------------------------ //

// ! Tabla de resultados TABULATOR
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
      title: "ID",
      field: "id_producto",
      visible: true,
      
    },

    {
      title: "Nombre",
      field: "nombre",
      editor: "input",
      cellEdited: (cell) => {
        //console.log(cell._cell.row.cells[8].element.innerHTML)
        cell._cell.row.cells[13].element.innerHTML =
          '<i class="fas fa-edit" style="color:green"></i>';
      },
    },
    {
      title: "Fabricante",
      field: "fabricante",
      editor: "input",
      cellEdited: (cell) => {
        //console.log(cell._cell.row.cells[8].element.innerHTML)
        cell._cell.row.cells[13].element.innerHTML =
          '<i class="fas fa-edit" style="color:green"></i>';
      },
    },
    {
      title: "Cantidad",
      field: "cantidad_existente",
      editor: "input",
      cellEdited: (cell) => {
        //console.log(cell._cell.row.cells[8].element.innerHTML)
        cell._cell.row.cells[13].element.innerHTML =
          '<i class="fas fa-edit" style="color:green"></i>';
      },
    },
    {
      title: "Codigo Barra",
      field: "codigo_barra",
      editor: "input",
      cellEdited: (cell) => {
        //console.log(cell._cell.row.cells[8].element.innerHTML)
        cell._cell.row.cells[13].element.innerHTML =
          '<i class="fas fa-edit" style="color:green"></i>';
      },
    },
    {
      title: "Codigo Interno",
      field: "codigo_interno",
      editor: "input",
      cellEdited: (cell) => {
        //console.log(cell._cell.row.cells[8].element.innerHTML)
        cell._cell.row.cells[13].element.innerHTML =
          '<i class="fas fa-edit" style="color:green"></i>';
      },
    },
    {
      title: "Precio Compra",
      field: "precio_compra",
      editor: "input",
      cellEdited: (cell) => {
        //console.log(cell._cell.row.cells[8].element.innerHTML)
        cell._cell.row.cells[13].element.innerHTML =
          '<i class="fas fa-edit" style="color:green"></i>';
      },
    },
    {
      title: "Precio Genérico",
      field: "precio_venta",
      editor: "input",
      cellEdited: (cell) => {
        //console.log(cell._cell.row.cells[8].element.innerHTML)
        cell._cell.row.cells[13].element.innerHTML =
          '<i class="fas fa-edit" style="color:green"></i>';
      },
    },
    {
      title: "Categoria",
      field: "nombre_categoria",
      
      
    },
    {
      title: "Ubicacion",
      field: "ubicacion_almacen",
      formatter: "plaintext",
      //editor: "input",
      // cellEdited: (cell) => {
      //   //console.log(cell._cell.row.cells[8].element.innerHTML)
      //   cell._cell.row.cells[8].element.innerHTML =
      //     '<i class="fas fa-edit" style="color:green"></i>';
      // },
    },
    {
      title: "Editar Ubicacion",
      field: "id_producto",
      hozAlign: "center",
      print: false,
      formatter: ubicacionIcon,
      cellClick: (_e, cell) => {
        nombre_producto = cell._cell.row.cells[0].value;
        id_p = cell._cell.value;
        cargarModal();
      },
    },

    {
      title: "Editar precios",
      field: "id_producto",
      hozAlign: "center",
      print: false,
      formatter: asignarPrecio,
      cellClick: (_e, cell) => {
        nombre_producto = cell._cell.row.cells[0].value;
        id_p = cell._cell.value;
        cargarModalClientes();
      },
    },

    {
      title: "Dar Entrada/Salida",
      field: "id_producto",
      hozAlign: "center",
      print: false,
      formatter: salidaIcon,
      cellClick: (_e, cell) => {
        //nombre_producto= cell._cell.row.cells[0].value;
        id_p = cell._cell.value; // ID DEL PRODUCTO

        //TODO poner en el modal el nombre del producto a dar salida
        nombre_producto = cell._cell.row.data.nombre;

        parrafo_modal_salida.innerHTML = `Dar salida al producto:<br> <b>${nombre_producto} - ${cell._cell.row.data.codigo_barra} - ${cell._cell.row.data.id_producto}</b>`;

        //cargarModal();
      },
    },

    {
      title: "Editar",
      field: "id_producto",
      hozAlign: "center",
      print: false,
      formatter: updateIcom,
      cellClick: (_e, cell) => {
        //console.log(cell._cell.element.innerHTML)
        //cell._cell.element.innerHTML = '<p>ss</p>'

        //! TODO al clickar editar valores
        let entradas = Object.values(cell.getRow().getData());

        editarValoresTabla(entradas);
        cell._cell.element.innerHTML = `<i class="fas fa-edit"></i>`;
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
function cellClick_DeleteButton(e, cell) {
  console.log(cell.getRow().getData())
  //! Llama a eliminar producto
  Swal.fire({
    title: 'Cuidado!!',
    text: `El registro ${ cell.getRow().getData().nombre.toUpperCase()} se eliminará definitivamente de la tabla`,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, borrar!'
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire(
        'Borrado!',
        `${ cell.getRow().getData().nombre.toUpperCase()} ha sido eliminado`,
        'success',
        //console.log(cell.getRow().getData().id_producto);
        borraValoresTabla(cell.getRow().getData().id_producto),
        cell.getRow().delete()
      )
    }
  })

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
      if (_datos == 1) {
        Swal.fire({
          title: "Editado!",
          text: "Producto editado",
          icon: "success",
          confirmButtonText: "Aceptar",
        });
      }
    });
}

//! Borra una los valores de la BBDD
function borraValoresTabla(id) {
  //URL de la peticion
  //console.log(id);
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

/** //! Cargar el modal de editar ubicacion */
let sel_ubicacion = document.querySelector("#select_ubicacion");
function cargarModal() {
  let m = document.getElementsByClassName("modal");
  sel_ubicacion.innerHTML = "";

  // ! Llamar a las ubicaciones
  let url = "./model/class_buscar_ubicacion.php";

  //configurar la peticion. AQUI CONFIGURO LA PETICION
  let configFetch = {
    method: "POST",
    body: ``,
    //headers: { "Content-Type": "application/x-www-form-urlencoded" },
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
  };

  //mandar la peticion
  let promesa = fetch(url, configFetch);
  let option = "";
  //Ejecutar la promesa que devuelve la peticion
  promesa
    .then((res) => res.json())
    .then((_datos) => {
      document.querySelector(
        "#parrafo-modal"
      ).innerHTML = `Listado de ubicaciones del almacen para el producto<br> <b>${nombre_producto}</b>`;

      _datos.forEach((element) => {
        option += `<option value="${element.id_ubicacion}">Fila: ${element.fila} - estanteria: ${element.estanteria} </option>`;
      });

      // Cargar las ubicaciones en el listado
    })
    .finally(() => (sel_ubicacion.innerHTML = option));
}

//! Actualizar producto
actualizar.addEventListener("click", () => {
  //Llamar a actualizar producto para pasarle el id de la ubicacion
  let url = "./model/class_actualizar_producto.php";
  console.log(id_p + " " + sel_ubicacion.value);

  //configurar la peticion. AQUI CONFIGURO LA PETICION
  let configFetch = {
    method: "POST",
    body: `id_producto=${id_p}&id_ubicacion=${sel_ubicacion.value}`,
    //headers: { "Content-Type": "application/x-www-form-urlencoded" },
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
  };

  //mandar la peticion
  let promesa = fetch(url, configFetch);
  let option = "";
  //Ejecutar la promesa que devuelve la peticion
  promesa
    .then((res) => res.text())
    .then((_datos) => {
      console.log(_datos + " *");
      if (_datos == 1) {
        Swal.fire({
          title: "Actualizado!",
          text: "Ubicación actualizada",
          icon: "success",
          confirmButtonText: "Aceptar",
          timer: 1500,
        }).then(() => buscarProducto());
      } else {
        Swal.fire({
          title: "Error!",
          text: "Eroor al actualizar la ubicación",
          icon: "error",
          confirmButtonText: "Aceptar",
          timer: 1500,
        });
      }
    });
});

//TODO Actualizar cantidad
btn_actualizar.addEventListener("click", () => {
  let url = "./model/class_Actualizar_cantidad.php";
  let cantidad_salida = document.querySelector("#cantidad_salida");

  //configurar la peticion. AQUI CONFIGURO LA PETICION
  let configFetch = {
    method: "POST",
    body: `id_producto=${id_p}&cantidad=${cantidad_salida.value}`,

    headers: { "Content-Type": "application/x-www-form-urlencoded" },
  };

  //CONFIGURAR LA PETICION
  let promesa = fetch(url, configFetch);

  promesa
    .then((res) => res.text())
    .then((_datos) => {
      if (_datos == 1) {
        Swal.fire({
          title: "Actualizado!",
          text: "Cantidad restada",
          icon: "success",
          confirmButtonText: "Aceptar",
          timer: 1500,
        }).then(() => buscarProducto());
      } else {
        Swal.fire({
          title: "Error!",
          text: "Error al actualizar la cantidad",
          icon: "error",
          confirmButtonText: "Aceptar",
          timer: 1500,
        });
      }
    });
});

function cargarModalClientes() {
  let textoH5Modal = document.querySelector("#titulo_modal_cliente");
  textoH5Modal.innerHTML = `Registrar precio diferente para:</br> ${nombre_producto}-${id_p}`;
  let selClientes = document.querySelector("#selectClientes");
  let opciones = "";

  let uri = "./model/class_buscar_clientes.php";
  let campos = `cliente=${""}`;

  const res = requestText(uri, campos);

  res
    .then((res) => res.json())
    .then((datos) => {
      console.log(datos);

      datos.forEach((element) => {
        opciones += `<option value="${element.id_tienda}">${element.nombre}</option>`;
      });
      selClientes.innerHTML = opciones;
      //TODO Llenar listado con el select
    });
}

btnGuardarPrecio.addEventListener("click", () => {
  let precio_diferente = document.querySelector("#precioTienda");
  let selClientes = document.querySelector("#selectClientes").value;

  let url = "./model/class_registrar_precio_diferente.php";
  //configurar la peticion. AQUI CONFIGURO LA PETICION
  let configFetch = {
    method: "POST",
    body: `id_producto=${id_p}&precioTienda=${precio_diferente.value}&id_cliente=${selClientes}`,
    //headers: { "Content-Type": "application/x-www-form-urlencoded" },
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
  };
  console.log(configFetch.body)
  //mandar la peticion
  let promesa = fetch(url, configFetch);
  let option = "";
  //Ejecutar la promesa que devuelve la peticion
  promesa
    .then((res) => res.text())
    .then((_datos) => {
      console.log(_datos);
      if (_datos == 1) {
        Swal.fire({
          title: "Actualizado!",
          text: "Precio registrado",
          icon: "success",
          confirmButtonText: "Aceptar",
          timer: 1500,
        }).then(() => buscarProducto());
      } else {
        Swal.fire({
          title: "Error!",
          text: "Error al registrar el precio",
          icon: "error",
          confirmButtonText: "Aceptar",
          timer: 1500,
        });
      }
    
    });
});

//! Exportar a Excel
document.getElementById("download-xlsx").addEventListener("click", function(){
  table2.columnManager.columnsByIndex.splice(13,1)
  table2.columnManager.columns.pop()
  table2.columnManager.columnsByIndex.splice(12,1)
  table2.columnManager.columns.pop()
  table2.columnManager.columnsByIndex.splice(11,1)
  table2.columnManager.columns.pop()
  table2.columnManager.columnsByIndex.splice(10,1)
  table2.columnManager.columns.pop()
  table2.columnManager.columnsByIndex.splice(9,1)
  table2.columnManager.columns.pop()
  table2.columnManager.columnsByIndex.splice(8,1)
  table2.columnManager.columns.pop()
  // table2.columnManager.columnsByIndex.pop()
  //table2.columnManager.columns.pop()
  // table2.columnManager.columnsByIndex.pop()
  //table2.columnManager.columns.pop()
  // table2.columnManager.columnsByIndex.pop()
  //table2.columnManager.columns.pop()
  console.log(table2)
  console.log(table2.columnManager);
  console.log(table2.columnManager.columnsByField)//object
  table2.download("xlsx", "productos.xlsx", {sheetName:"Productos"});
  location.reload();
});

//TODO Buscar producto
