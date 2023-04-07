<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BOOTSTRAP 5.2 -->
    <link rel="stylesheet" href="./plugins/bootstrap-5.2.3-dist/bootstrap-5.2.3-dist/css/bootstrap.css">
    <script src="./plugins/bootstrap-5.2.3-dist/bootstrap-5.2.3-dist/js/bootstrap.bundle.js" defer></script>
    <script src="./plugins/bootstrap-5.2.3-dist/bootstrap-5.2.3-dist/js/bootstrap.js" defer></script>

    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="./styles/menu_lateral.css">

    <!-- JQUERY -->
    <script src="http://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous">
    </script>

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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