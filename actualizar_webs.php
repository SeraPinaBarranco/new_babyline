

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include "./uis/head.php" ?>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Webs</title>
</head>

<body>
    <?php  include_once "./uis/header.php"; ?>

    <?php include "./uis/menu-lateral.php" ?>
    <section>
        <form action="./model/actualiza_web_todas.php" method="POST">
        <div class="container mt-5 d-flex flex-row justify-content-evenly">


                <div class="card me-3" style="width: 18rem;">
                    <img src="./imagenes/iconos/original-baby.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                       

                       
                    </div>
                </div>

                <div class="card me-3" style="width: 18rem;">
                    <img src="./imagenes/iconos/dulce-paseo.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                     
                       
                    </div>
                </div>

                <div class="card me-3" style="width: 18rem;">
                    <img src="./imagenes/iconos/happy-way.jpg" class="card-img-top" alt="...">
                    <div class="card-body">                       

                    </div>
                </div>
                <div class="container">
                <input class="btn btn-primary" type="submit" name="web" value="Actualizar todas las webs" style="background-color: var(--amarillo); border-style:none;  font-weight: 500;">
                </div>
            </div>
        </form>
    </section>


    <?php include "./uis/footer.php"; ?>
</body>

</html>