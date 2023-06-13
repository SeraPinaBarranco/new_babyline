<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include "./uis/head.php" ?>

    <!-- TABULATOR -->
    <link href="https://unpkg.com/tabulator-tables/dist/css/tabulator.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://unpkg.com/tabulator-tables/dist/js/tabulator.min.js"></script>


    <title>Document</title>
</head>

<body>
    <?php include_once "./uis/header.php"; ?>

    <?php include "./uis/menu-lateral.php" ?>

    <div class="container-fluid mb-5">

        <div class="container col-12 mt-5 shadow-lg" id="con-tabla">
            <div id="tabla"></div>
        </div>

        <div class="container-fluid mt-2 mb-5" style="text-align: center;">
            <button class="btn btn-success" id="btnExportar">Exportar</button>
        </div>

    </div>
    
    <script type="module" src="./controller/export_precios_clientes.js"></script>
    <script type="text/javascript" src="https://oss.sheetjs.com/sheetjs/xlsx.full.min.js"></script>

    <?php include "./uis/footer.php"; ?>
</body>


</html>