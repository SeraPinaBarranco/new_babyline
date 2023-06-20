<!DOCTYPE html>
<html lang="es">
<head>
    <?php include "./uis/head.php" ?>
    
    <!-- DATA TABLES -->
    <link rel="stylesheet" href="./plugins/datatables/data_tables.css" />

    <!-- TABULATOR -->
    <link href="https://unpkg.com/tabulator-tables/dist/css/tabulator.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://unpkg.com/tabulator-tables/dist/js/tabulator.min.js"></script>
    <script type="text/javascript" src="https://oss.sheetjs.com/sheetjs/xlsx.full.min.js"></script>

    <script type="module" src="./controller/precios_clientes.js"></script>

    <title>Listado de precios específicos</title>
</head>
<body>
<?php include_once "./uis/header.php"; ?>

<?php include "./uis/menu-lateral.php" ?>

    <div class="container mt-4">
        <h5 class="mt-5">Precios que se aplican a las tiendas</h5>
        <div id="example-table" class="mt-3">

        </div>
        <div class="mb-5" align="center">
            <button class="btn btn-success mt-3 mb-5" id="download-xlsx" style="background-color: var(--amarillo); border-style:none;  font-weight: 500;">Download XLSX</button>
        </div>
    </div>

    <?php include "./uis/footer.php"; ?>
</body>
</html>
