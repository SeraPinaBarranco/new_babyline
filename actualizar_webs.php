<?php 
include_once "./model/parametros.php";

$pdo = new PDO($DNS,$USER, $PASS);

//TODO Ver si hay cambios pendientes en la tabla CAMBIOS

$stm = "";
$baby = 0;
$ropa = 0;
$happy= 0;

$query = "SELECT * FROM CAMBIOS where up_babyline = 0";

$stm = $pdo->prepare($query);
$stm->execute();
$baby = $stm->rowCount();

/*---------*/

$query = "SELECT * FROM CAMBIOS where up_ropadecu = 0";

$stm = $pdo->prepare($query);
$stm->execute();
$ropa = $stm->rowCount();

/*---------*/

$query = "SELECT * FROM CAMBIOS where up_happy = 0";

$stm = $pdo->prepare($query);
$stm->execute();
$happy = $stm->rowCount();
 ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include "./uis/head.php" ?>
    <link rel="stylesheet" href="./styles/menu_lateral.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Webs</title>
</head>

<body>
    <?php include "./uis/menu-lateral.php" ?>
    <section>
        <form action="./model/actualiza_web.php" method="POST">
        <div class="container mt-3 d-flex flex-row justify-content-evenly">


                <div class="card" style="width: 18rem;">
                    <img src="./imagenes/iconos/original-baby.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6><span class="badge bg-danger">Cambios pendientes  <span class="badge bg-secondary"><?php echo $baby ?></span> </span></h6> 
                        
                       
                        <input class="btn btn-primary" type="submit" name="web" value="Actualizar original-baby">
                    </div>
                </div>

                <div class="card" style="width: 18rem;">
                    <img src="./imagenes/iconos/dulce-paseo.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6><span class="badge bg-danger">Cambios pendientes  <span class="badge bg-secondary"><?php echo $ropa ?></span></span></h6> 
                        
                       
                        <input class="btn btn-primary" type="submit" name="web" value="Actualizar dulce-paseo">
                    </div>
                </div>

                <div class="card" style="width: 18rem;">
                    <img src="./imagenes/iconos/happy-way.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6><span class="badge bg-danger">Cambios pendientes  <span class="badge bg-secondary"> <?php echo $happy ?></span></span></h6> 
                        
                        <input class="btn btn-primary" type="submit" name="web" value="Actualizar happy-way">
                    </div>
                </div>
                
                
            </div>
        </form>
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