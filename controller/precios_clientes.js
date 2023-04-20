import { requestText } from "./operaciones_clientes.js";
let datos = "";

// ! Tabla de resultados TABULATOR
let table2 = new Tabulator("#example-table", {
  printRowRange: "all",
  pagination: "local",
  paginationSize: 15,
  paginationSizeSelector: [25, 45, 60, 80],
  movableColumns: true,
  paginationCounter: "rows",
  columns: [
    {
      title: "Nombre",
      field: "nombre",
    },
    {
      title: "Código Barra",
      field: "codigo_barra",
    },
    {
      title: "Código Interno",
      field: "codigo_interno",
    },
    {
      title: "Existencias",
      field: "cantidad_existente",
    },
    {
      title: "Precio Genérico",
      field: "precio_venta",
    },
    {
        title: "Tienda",
        field: "tienda",
    },
    {
      title: "Precio específico",
      field: "precio_producto",
    },
    
  ],
});

//CARGAR LA TABLA PRODUCTOS TIENDA
window.addEventListener("load", (e) => {
  let uri = "./model/class_listado_productos_tienda.php";

  let configFetch = {
    method: "POST",
    body: ``,
    //headers: { "Content-Type": "application/x-www-form-urlencoded" },
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
  };

  const res = requestText(uri, configFetch);

  res
    .then((res) => res.text())
    .then((_datos) => {
      console.log(_datos);
      table2.setData(_datos);
    });
});
