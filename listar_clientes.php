<!DOCTYPE html>
<html lang="es">

<head>
    <?php include "./uis/head.php" ?>



    <!-- DATA TABLES -->
    <link rel="stylesheet" href="./plugins/datatables/data_tables.css" />

    <!-- TABULATOR -->
    <link href="https://unpkg.com/tabulator-tables/dist/css/tabulator.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://unpkg.com/tabulator-tables/dist/js/tabulator.min.js"></script>

    <link rel="stylesheet" href="./styles/buscar_styles.css">
    <script type="module" src="./controller/buscar_clientes.js"></script>
    <title>Buscar clientes</title>
</head>

<body>
    <?php include_once "./uis/header.php"; ?>

    <?php include "./uis/menu-lateral.php" ?>

    <!-- EDITION MODAL -->
    <!-- <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar ubicacion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <p id="parrafo-modal">Listado de ubicaciones del almacen</p>
                    <div class="dropdown">
                        <select class="form-select" aria-label="Default select example" id="select_ubicacion">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="actualizar">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL -->

    <!-- DAR SALIDA MODAL -->
    <!-- <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> -->
    <div class="modal fade" id="myModalSalida" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Dar Entrada/Salida a producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="container">
                    <span>Los valores <b>negativos generan salida</b><br> y los <b>positivos generan entradas</b></span>

                </div>

                <div class="modal-body">
                    <p id="parrafo-modal-salida"></p>
                    <div class="mt-3">
                        <input type="number" class="form-control" value="-1" id="cantidad_salida">
                    </div>


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="dar_salida">Dar Salida</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL -->



    <div class="content mt-5" style="width:100%" align="center">
        <h3 align="center">Busqueda de clientes</h3>
        <br />
        <div class="container formulario col-3" >
            <!--<form action="index.php?pag=registrar" method="post" name="formu" class="form-search" >-->
            <form action="" method="post" name="formu" class="form-search" id="registrar_producto">

                <div class=" ">
                    <input type="text" id="buscar" name="buscar" class="form-control mb-3 buscar" value="" placeholder="Buscar Por Nombre" />
                </div>
                    <div>
                        <input type="submit" name="buscar" value="Buscar" class="btn btn-success" id="btn_buscar" style="background-color: var(--amarillo); border-style:none;  font-weight: 500;"/>
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