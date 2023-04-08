<!DOCTYPE html>
<html lang="es">

<head>
    <?php include "./uis/head.php" ?>
    <link rel="stylesheet" href="./styles/menu_lateral.css">
    <link rel="stylesheet" href="./styles/style_registrar.css">
    <script type="module" src="./controller/buscar_productos_controller.js" defer></script>

    <!-- DATA TABLES -->
    <link rel="stylesheet" href="./plugins/datatables/data_tables.css" />

    <!-- TABULATOR -->
    <link href="https://unpkg.com/tabulator-tables/dist/css/tabulator.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://unpkg.com/tabulator-tables/dist/js/tabulator.min.js"></script>

    <title>Buscar productos</title>
</head>

<body>
    <?php include "./uis/menu-lateral.php" ?>

    <div class="content-wrapper" style="width:100%">
        <h3 align="center">Busqueda de Productos</h3>
        <br />
        <div class="formulario " align="center">
            <!--<form action="index.php?pag=registrar" method="post" name="formu" class="form-search" >-->
            <form action="" method="post" name="formu" class="form-search" id="registrar_producto">

                <div class=" ">
                    <input type="text" id="buscar" name="buscar" class="form-control mb-3 buscar" value="" placeholder="Buscar Por Nombre - Codigo Barra - Codigo Interno" />

                    <div>
                        <input type="submit" name="buscar" value="Buscar" class="btn btn-success" id="buscar" />
                    </div>

            </form>
        </div>

        <!-- <div class="div_tabla mt-5">
            <table id="myTable" class="display" style="font-size: 0.7em;">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Fabricante</th>
                        <th>Cantidad</th>
                        <th>Codigo Barra</th>
                        <th>Codigo Interno</th>
                        <th>Precio Compra</th>
                        <th>Precio Venta</th>
                        <th></th>

                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 1</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 1</td>
                        <td>Row 1 Data 2</td>
                        <td>Row 1 Data 1</td>
                        <td></td>
                    </tr>
                </tbody>

            </table>

        </div> -->


    </div>

    <div class="mt-5">
        <div id="example-table"></div>
    </div>

</body>

<script>
    document.getElementById("boton-hamburguesa").addEventListener("click", function() {
        var menu = document.getElementById("menu-hamburguesa");
        if (menu.style.display === "none") {
            menu.style.display = "block";
        } else {
            menu.style.display = "none";
        }
    });
</script>


<script src="./plugins/datatables/data_tables.js"></script>

</html>