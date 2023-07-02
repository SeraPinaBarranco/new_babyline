import { requestText, mostarMensaje } from "./operaciones_clientes.js";

let ip = document.getElementById("ip");
let db = document.getElementById("db");
let usuario = document.getElementById("usuario");
let clave = document.getElementById("clave");
let pais = document.getElementById("pais");
let cojer = document.getElementById("cojer");
let tabla = document.getElementById("tabla");
let table = document.getElementById("table");

let updateIcom = function (_cell, _formatterParams, _onRendered) {
  return `<i class="fas fa-edit" style="color: grey;"></i>`;
};

let deleteIcom = (_cell, _formatterParams, _onRendered) => {
  return `<i class="fa-solid fa-delete-left" style="color: #f10909;"></i>`;
};

document.getElementById("myForm").addEventListener("submit", function (event) {
  event.preventDefault(); // Evitar el envío del formulario

  // Validar los campos del formulario
  if (validateForm()) {
    // Obtener los valores del formulario

    // Realizar la petición Fetch al archivo PHP
    fetch("./model/class_BD_remota.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body:
        "ip=" +
        encodeURIComponent(ip.value) +
        "&db=" +
        encodeURIComponent(db.value) +
        "&usuario=" +
        encodeURIComponent(usuario.value) +
        "&clave=" +
        encodeURIComponent(clave.value) +
        "&pais=" +
        encodeURIComponent(pais.value) +
        "&cojer=" +
        encodeURIComponent(cojer.value) +
        "&tabla=" +
        encodeURIComponent(tabla.value),
    })
      .then(function (response) {
        return response.text();
      })
      .then(function (data) {
        console.log(data); // Aquí puedes hacer algo con la respuesta del servidor
      })
      .catch(function (error) {
        console.log("Error:", error);
      });
  }
});

function validateForm() {
  console.log(ip.value);

  if (
    ip === "" ||
    db === "" ||
    usuario === "" ||
    clave === "" ||
    pais === "" ||
    cojer === "" ||
    tabla === ""
  ) {
    alert("Por favor, completa todos los campos.");
    return false;
  }

  updateTable();
  return true;
}

function updateTable() {
  // Obtener los datos de la base de datos mediante una petición Fetch
  fetch("./model/class_getBD_remota.php")
    .then(function (response) {
      return response.json();
    })
    .then(function (data) {
      // Crear la tabla con los datos
      new Tabulator("#table", {
        data: data, // Aquí debes proporcionar los datos en formato de matriz JSON
        layout: "fitColumns",
        columns: [
          { title: "ID", field: "id_base" },
          { title: "IP", 
            editor: "input", 
            field: "ip",
            cellEdited: (cell) => {
              //console.log(cell._cell.row.cells[8].element.innerHTML)
              cell._cell.row.cells[7].element.innerHTML =
                '<i class="fas fa-edit" style="color:green"></i>';
            }, 
          },
          {
            title: "Base de datos",
            editor: "input",
            field: "db",
            cellEdited: (cell) => {
              //console.log(cell._cell.row.cells[8].element.innerHTML)
              cell._cell.row.cells[7].element.innerHTML =
                '<i class="fas fa-edit" style="color:green"></i>';
            },
          },
          {
            title: "Usuario",
            editor: "input",
            field: "usuario",
            cellEdited: (cell) => {
              //console.log(cell._cell.row.cells[8].element.innerHTML)
              cell._cell.row.cells[7].element.innerHTML =
                '<i class="fas fa-edit" style="color:green"></i>';
            },
          },
          {
            title: "País",
            editor: "input",
            field: "pais",
            cellEdited: (cell) => {
              //console.log(cell._cell.row.cells[8].element.innerHTML)
              cell._cell.row.cells[7].element.innerHTML =
                '<i class="fas fa-edit" style="color:green"></i>';
            },
          },
          {
            title: "Cojer",
            editor: "input",
            field: "cojer",
            cellEdited: (cell) => {
              //console.log(cell._cell.row.cells[8].element.innerHTML)
              cell._cell.row.cells[7].element.innerHTML =
                '<i class="fas fa-edit" style="color:green"></i>';
            },
          },
          {
            title: "Tabla",
            editor: "input",
            field: "tabla",
            cellEdited: (cell) => {
              //console.log(cell._cell.row.cells[8].element.innerHTML)
              cell._cell.row.cells[7].element.innerHTML =
                '<i class="fas fa-edit" style="color:green"></i>';
            },
          },
          {
            title: "Editar",
            field: "id_base",
            hozAlign: "center",
            formatter: updateIcom,
            cellClick: (_e, cell) => {
              //cell._cell.element.innerHTML = '<p>ss</p>'

              //! TODO al clickar editar valores
              let entradas = cell.getRow().getData();

              editarValoresTabla(entradas);
              cell._cell.element.innerHTML = `<i class="fas fa-edit" style="color:grey"></i>`;
            },
          },
          {
            title: "Eliminar",
            field: "id_base",
            hozAlign: "center",
            formatter: deleteIcom,
            cellClick: (_e, cell) => {
            //! TODO al clickar editar valores
             let entradas = cell.getRow().getData();
             eliminarValoresTabla(entradas);
            //cell._cell.element.innerHTML = `<i class="fas fa-edit"></i>`;
            },
          },
        ],
      });
    })
    .catch(function (error) {
      console.log("Error:", error);
    });
}

updateTable();

function editarValoresTabla(entradas) {
  let uri = `./model/class_editar_bd_remota.php`;
  let campos = `id=${entradas.coger}
                &id_base=${entradas.id_base}
                &ip=${entradas.ip}
                &db=${entradas.db}
                &usuario=${entradas.usuario}
                &clave=${entradas.clave}
                &cojer=${entradas.cojer}
                &tabla=${entradas.tabla}
                &pais=${entradas.pais}`

  console.log(entradas);
  const res = requestText(uri, campos)
  
  res
    .then((res) => res.text())
    .then((datos) => {
      
      mostarMensaje(datos.mensaje)
      updateTable()
  })
}


function eliminarValoresTabla(entradas) {
  let uri = `./model/class_eliminar_bd_remota.php`
  let campos = `id_base=${entradas.id_base}`

  
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
            updateTable("")
          })
        }
      })
    
} 
  