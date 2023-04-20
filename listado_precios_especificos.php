<!DOCTYPE html>
<html lang="es">
<head>
    <?php include "./uis/head.php" ?>
    <link rel="stylesheet" href="./styles/menu_lateral.css">
    <link rel="stylesheet" href="./styles/style_registrar.css">

    <!-- DATA TABLES -->
    <link rel="stylesheet" href="./plugins/datatables/data_tables.css" />

    <!-- TABULATOR -->
    <link href="https://unpkg.com/tabulator-tables/dist/css/tabulator.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://unpkg.com/tabulator-tables/dist/js/tabulator.min.js"></script>

    <script type="module" src="./controller/precios_clientes.js"></script>

    <title>Listado de precios específicos</title>
</head>
<body>
    <?php include "./uis/menu-lateral.php" ?>

    <div class="container mt-4">
        <h5 class="mt-5">Precios que se aplican a las tiendas</h5>
        <div id="example-table" class="mt-3">

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
</body>
</html>
