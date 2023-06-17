<!DOCTYPE html>
<html lang="es">

<head>
    <?php include "./uis/head.php" ?>


    <!-- TABULATOR -->
    <link href="https://unpkg.com/tabulator-tables/dist/css/tabulator.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://unpkg.com/tabulator-tables/dist/js/tabulator.min.js"></script>

    
    <script type="module" src="./controller/buscar_categorias.js"></script>
    <title>Buscar clientes</title>
</head>

<body>
    <?php include_once "./uis/header.php"; ?>

    <?php include "./uis/menu-lateral.php" ?>






    <div class="content mt-5" style="width:100%" align="center">
        <h3 align="center">Busqueda de categorias</h3>
        <br />
        <div class="formulario col-3" >
            <!--<form action="index.php?pag=registrar" method="post" name="formu" class="form-search" >-->
            <form action="" method="post" name="formu" class="form-search" id="registrar_producto">

                <div class=" ">
                    <input type="text" id="buscar" name="buscar" class="form-control mb-3 buscar" value="" placeholder="Buscar Por Nombre" />

                    <div>
                        <input type="submit" name="buscar" value="Buscar" class="btn btn-success" id="btn_buscar" />
                    </div>

            </form>
        </div>


    </div>

    <div class="mt-5" style="padding-left: 35%; padding-right:35% ">
        <div id="tabla"></div>
    </div>

    <?php include "./uis/footer.php"; ?>
</body>

</html>