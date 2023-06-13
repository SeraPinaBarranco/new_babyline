<!DOCTYPE html>
<html lang="es">

<head>
    <?php include "./uis/head.php" ?>
    <!-- <link rel="stylesheet" href="./styles/menu_lateral.css"> -->
    <title>Document</title>
</head>

<body>

    <?php  include_once "./uis/header.php"; ?>

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

    <?php include "./uis/footer.php"; ?>

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