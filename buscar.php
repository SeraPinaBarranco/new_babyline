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

    <link rel="stylesheet" href="./styles/buscar_styles.css">

    <title>Buscar productos</title>
</head>

<body>
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

    <!-- MODAL REGISTRAR PRECIO A CLIENTE -->
    
    <div class="modal fade" id="myModalPrecios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titulo_modal_cliente"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <p id="parrafo-modal">LISTADO DE CLIENTES</p>
                    <div class="dropdown">
                    <select class="form-select" aria-label="Default select example" name="" id="selectClientes" ></select>
                    <input type="number" class="form-control mt-3" style="width: 5vw;" value="" id="precioTienda">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnGuardarPrecio">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- FIN MODAL -->



    <div class="content-wrapper" style="width:100%">
        <h3 align="center">Busqueda de Productos</h3>
        <br />
        <div class="formulario " align="center">
            <!--<form action="index.php?pag=registrar" method="post" name="formu" class="form-search" >-->
            <form action="" method="post" name="formu" class="form-search" id="registrar_producto">

                <div class=" ">
                    <input type="text" id="buscar" name="buscar" class="form-control mb-3 buscar" value="" placeholder="Buscar Por Nombre - Codigo Barra - Codigo Interno" />

                    <div>
                        <input type="submit" name="btn_buscar" value="Buscar" class="btn btn-success" id="btn_buscar" />
                    </div>

            </form>
        </div>

    </div>

    <div class="container mt-5">
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

    $('#myModal').on('shown.bs.modal', function() {
        $('#myInput').trigger('focus')
    })
</script>


<script src="./plugins/datatables/data_tables.js"></script>

</html>