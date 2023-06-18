<!DOCTYPE html>
<html lang="es">

<head>
    <?php include "./uis/head.php" ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include_once "./uis/header.php"; ?>

    <?php include "./uis/menu-lateral.php" ?>
    <section>
        <div class="container mt-5">
            <form action="./model/importaciones.php" method="post" enctype="multipart/form-data">
                <input type="file" name="archivo">

                <input class="btn btn-success" type="submit" name="importar-productos" value="Importar productos" style="background-color: var(--amarillo); border-style:none;  font-weight: 500;">

                <input class="btn btn-success" type="submit" name="importar-categorias" value="Importar categorias" style="background-color: var(--amarillo); border-style:none;  font-weight: 500;">

                <input class="btn btn-success" type="submit" name="importar-clientes" value="Importar clientes" style="background-color: var(--amarillo); border-style:none;  font-weight: 500;">

            </form>
        </div>
    </section>


    <?php include "./uis/footer.php"; ?>
</body>

</html>