<!DOCTYPE html>
<html lang="es">

<head>
    <?php include "./uis/head.php" ?>
    <link rel="stylesheet" href="./styles/menu_lateral.css">
    <title>Document</title>
</head>

<body>

    <?php include "./uis/menu-lateral.php" ?>
    

    <div class="content-wrapper" style="min-height: 572.2px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">

            <!-- <h1>Inicio<small>Bienvenido</small></h1> -->
        </section>

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