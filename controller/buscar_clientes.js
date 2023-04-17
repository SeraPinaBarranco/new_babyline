import { requestText, mostarMensaje } from "./operaciones_clientes.js";

let form = document.forms[0];
let btn_buscar = document.querySelector("#btn_buscar");
let txt_buscar = document.querySelector("#buscar");

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
        //cell._cell.row.cells[10].element.innerHTML =
        //  '<i class="fas fa-edit" style="color:green"></i>';
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
