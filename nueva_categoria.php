<!DOCTYPE html>
<html lang="es">

<head>
    <?php include "./uis/head.php" ?>
   
    <script type="module" src="./controller/nueva_categoria.js" defer></script>
    <title>Registrar cliente</title>
</head>

<body>

    <?php include_once "./uis/header.php"; ?>

    <?php include "./uis/menu-lateral.php" ?>

    <div class="content-wrapper mt-5" style="width:100%" align="center">
        <h3 align="center">Nueva Categoria</h3>
        <br />
        <div class="formulario col-4" >
            <!--<form action="index.php?pag=registrar" method="post" name="formu" class="form-search" >-->
            <form action="" method="post" name="formu" class="form-search" id="registrar_cliente">

                <div class=" ">
                    <input type="text" id="categoria" name="categoria" class="form-control mb-3" value="" placeholder="Categoria" required />
                </div>


                <div>
                    <input type="submit" name="registrar" id="btnRegistrar" value="Registrar" class="btn btn-success" style="background-color: var(--amarillo);border-style:none;  font-weight: 500;"/>
                </div>

            </form>
        </div>
    </div>

    <?php include "./uis/footer.php"; ?>
</body>

</html>