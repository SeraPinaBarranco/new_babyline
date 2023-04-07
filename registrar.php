<?php

//if($_POST){ include_once("control/control_registrar_producto.php"); }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include "./uis/head.php" ?>
    <link rel="stylesheet" href="./styles/menu_lateral.css">
    <link rel="stylesheet" href="./styles/style_registrar.css">
    <script src="./controller/registrar_producto_controller.js" defer></script>
    <title>Registrar producto</title>
</head>

<body>

    <?php include "./uis/menu-lateral.php" ?>

    <div class="content-wrapper" style="width:100%">
        <h3 align="center">Registro de Producto</h3>
        <br />
        <div class="formulario " align="center">
            <!--<form action="index.php?pag=registrar" method="post" name="formu" class="form-search" >-->
            <form action="" method="post" name="formu" class="form-search" id="registrar_producto">

                <div class=" ">
                    <input type="text" id="codigo_producto" name="codigo_producto" class="form-control mb-3" value="<?php echo $codigo_barra ?? ""; ?>" placeholder="Codigo de Barras" />

                    <input type="hidden" name="codigo_producto2" value="<?php echo $codigo_barra2 ?? ""; ?>" />


                </div>

                <div class="">
                    <input type="text" id="codigo_interno" name="codigo_interno" class="form-control mb-3" value="<?php echo $codigo_interno ?? ""; ?>" placeholder="Codigo Interno" />

                    <!-- <input type="hidden" name="codigo_interno2" value="<?php echo $codigo_interno2 ?? ""; ?>" />
 </div> -->

                    <div class="">
                        <input type="text" id="nombre" name="nombre" class="form-control mb-3" value="<?php echo $nombre_producto ?? ""; ?>" placeholder="Nombre" />
                    </div>



                    <div class="">
                        <input type="text" id="fabricante" name="fabricante" class="form-control mb-3" value="<?php echo $fabricante ?? ""; ?>" placeholder="Fabricante" />
                    </div>


                    <div class="">
                        <input type="number" id="cantidad" name="cantidad" class="form-control mb-3" value="<?php echo $cantidad ?? ""; ?>" placeholder="Cantidad Entrante" />
                    </div>


                    <div class="">
                        <input type="text" id="precio_compra" name="precio_compra" class="form-control mb-3" value="<?php echo $precio_compra ?? ""; ?>" placeholder="Precio Compra" />
                    </div>


                    <div class="">
                        <input type="text" id="precio_venta" name="precio_venta" class="form-control mb-3" value="<?php echo $precio_venta ?? ""; ?>" placeholder="Precio Venta" />
                    </div>




                    <div>
                        <input type="submit" name="registrar" value="Registrar" class="btn btn-success" />
                    </div>

            </form>
        </div>
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

</html>