import { requestText } from "./operaciones_clientes.js";

let btnExportar = document.getElementById('btn_Exportar');

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
        .then((res) => res.text())
        .then((_datos) => {

            console.log(_datos);
            //table2.setData(_datos);

        });

})