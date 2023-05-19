<!DOCTYPE html>
<html lang="es">

<head>
    <?php include "./uis/head.php" ?>
    <link rel="stylesheet" href="./styles/menu_lateral.css">
    <link rel="stylesheet" href="./styles/style_registrar.css">
    <script type="module" src="./controller/nueva_categoria.js" defer></script>
    <title>Registrar cliente</title>
</head>

<body>

    <?php include "./uis/menu-lateral.php" ?>

    <div class="content-wrapper" style="width:100%">
        <h3 align="center">Nueva Categoria</h3>
        <br />
        <div class="formulario " align="center">
            <!--<form action="index.php?pag=registrar" method="post" name="formu" class="form-search" >-->
            <form action="" method="post" name="formu" class="form-search" id="registrar_cliente">

                <div class=" ">
                    <input type="text" id="categoria" name="categoria" class="form-control mb-3" value="" placeholder="Categoria" required/>
                </div>


                <div>
                    <input type="submit" name="registrar" id="btnRegistrar" value="Registrar" class="btn btn-success" />
                </div>

            </form>
        </div>
    </div>

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
</body>

</html>