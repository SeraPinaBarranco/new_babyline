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

    <title>Salida de productos</title>
</head>

<body>

    <?php include "./uis/menu-lateral.php" ?>

    <div class="content-wrapper" style="width:100%">
        <h3 align="center">Salida de Producto</h3>
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
    </div>


    <script>
        document.getElementById("boton-hamburguesa").addEventListener("click", function() {
            var menu = document.getElementById("menu-hamburguesa");
            if (menu.style.display === "none") {
                menu.style.display = "block";
            } else {
                menu.style.display = "none";
            }
        });

        $('#myModal').on('shown.bs.modal', function() {
            $('#myInput').trigger('focus')
        })
    </script>


    <script src="./plugins/datatables/data_tables.js"></script>

</body>

</html>