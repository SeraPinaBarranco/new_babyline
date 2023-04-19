import { requestText, mostarMensaje } from "./operaciones_clientes.js";

let form = document.forms[0];
let btn_buscar = document.querySelector("#btn_buscar");
let txt_buscar = document.querySelector("#buscar");

let updateIcom = function (_cell, _formatterParams, _onRendered) {
  return `<i class="fas fa-edit"></i>`;
};

let deleteIcom = (_cell, _formatterParams, _onRendered)=>{
  return `<i class="fa-solid fa-delete-left" style="color: #f10909;"></i>`
}

let newIcom = (_cell, _formatterParams, _onRendered)=>{
  return `<i class="fa-solid fa-plus" style="color: #89f901;"></i>`
}



let table2 = new Tabulator("#tabla", {
  printRowRange: "all",
  pagination: "local",
  paginationSize: 10,
  paginationSizeSelector: [20, 30, 40, 50],
  movableColumns: true,
  paginationCounter: "rows",
  columns: [
    {
      title: "Nombre",
      field: "nombre",
      editor: "input",
      cellEdited: (cell) => {
        //console.log(cell._cell.row.cells[8].element.innerHTML)
        cell._cell.row.cells[1].element.innerHTML =
        '<i class="fas fa-edit" style="color:green"></i>';
      },
    },

    {
      title: "Editar",
      field: "id_tienda",
      hozAlign: "center",
      formatter: updateIcom,
      cellClick: (_e, cell) => {
        
        //cell._cell.element.innerHTML = '<p>ss</p>'

        //! TODO al clickar editar valores
        let entradas = cell.getRow().getData();

        editarValoresTabla(entradas);
        cell._cell.element.innerHTML = `<i class="fas fa-edit"></i>`;
      },
    },
    {
      title: "Eliminar",
      field: "id_tienda",
      hozAlign: "center",
      formatter: deleteIcom,
      cellClick: (_e, cell) => {
        
        //! TODO al clickar editar valores
        let entradas = cell.getRow().getData();

        eliminarValoresTabla(entradas);
        //cell._cell.element.innerHTML = `<i class="fas fa-edit"></i>`;
      },
    },
    {
      title: "Nuevo Cliente",
      field: "",
      hozAlign: "center",
      formatter: newIcom,
      cellClick: (_e, cell) => {
        window.location.href = "./registrar_cliente.php"
        
      },
    },
  ],
});

form.addEventListener("submit", (e) => {
  e.preventDefault();
  buscar(txt_buscar.value);
});

function buscar(nombre) {
  let divTabla = document.querySelector("#tabla");

  let uri = "./model/class_buscar_clientes.php";
  let campos = `cliente=${nombre}`;

  const res = requestText(uri, campos);

  res
    .then((res) => res.json())
    .then((datos) => {      
      table2.setData(datos)
    });
}

function editarValoresTabla(entradas) {
  let uri = `./model/class_registrar_cliente.php`
  let campos = `id_cliente=${entradas.id_tienda}&cliente=${entradas.nombre}&tag=actualizar`

  const res = requestText(uri, campos)
  res
    .then((res) => res.text())
    .then((datos) => {
      console.log(datos)
      mostarMensaje(datos.mensaje)
    
    })
}

function eliminarValoresTabla(entradas) {
  let uri = `./model/class_registrar_cliente.php`
  let campos = `id_cliente=${entradas.id_tienda}&tag=eliminar`

  
  Swal.fire({
        title: 'Estás seguro?',
        text: "Borrar registro? Los datos se eliminaran de forma permanente!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Borrar!'
      }).then((result) => {
        
        if (result.isConfirmed) {
          
          const res = requestText(uri, campos)
          res
          .then((res) => res.text())
          .then((datos) => {
            console.log(datos)
            Swal.fire(
              'Eliminar!',
              'Registro eliminado',
              'success'
            )
          })
          .finally(()=>{
            buscar("")
          })
        }
      })
    
} 
  
