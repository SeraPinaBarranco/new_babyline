<!DOCTYPE html>
<html lang="es">

<head>
    <?php include "./uis/head.php" ?>
    <!-- <link rel="stylesheet" href="./styles/menu_lateral.css"> -->
    <title>Document</title>
</head>

<body>
    <header>
        <div class="logo">
            <span class="span_logo mt-2 mb-2">
                <a class="" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                    <i class="fa-solid fa-bars hamburguer" style="color: #fff;"></i>
                </a>
            </span>

            <h2 class="logo-title mt-1 mb-1 ms-2">Gestión de Almacén</h2>

        </div>

    </header>


    <?php include "./uis/menu-lateral.php" ?>


    <div class="content-wrapper" style="min-height: 572.2px;">
        <!-- Content Header (Page header) -->
        <!--<section class="content-header">

             <h1>Inicio<small>Bienvenido</small></h1> 
        </section>-->

        <!-- Main content -->
        <section class="content">
            <div id="cuerpo">
                <br>
                <div class="body-content" align="center">
                    <img src="./assets/images/gestion-almacenes.png" class="img-gestion-almacenes">
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 0.1
        </div>
        <strong>Copyright &copy; 2013-2018
            <a href="" target="_blank">Serafín Piña</a>.</strong> All rights reserved.
    </footer>

</body>

<!-- ABRE EL MENU LATERAL -->
<!-- <script>
    document.getElementById("boton-hamburguesa").addEventListener("click", function() {
        var menu = document.getElementById("menu-hamburguesa");
        if (menu.style.display === "none") {
            menu.style.display = "block";
        } else {
            menu.style.display = "none";
        }
    });
</script> -->

</html>