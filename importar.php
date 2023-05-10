<!DOCTYPE html>
<html lang="es">
<head>
    <?php include "./uis/head.php" ?>
    <link rel="stylesheet" href="./styles/menu_lateral.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include "./uis/menu-lateral.php" ?>
    <section>
        <div class="container mt-3">
            <form action="./model/importar_categoria.php">
                <input class="btn btn-success" type="submit" value="Importar categorias">
            </form>
        </div>
    </section>
    

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