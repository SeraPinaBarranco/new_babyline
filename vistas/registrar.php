<?php

//if($_POST){ include_once("control/control_registrar_producto.php"); }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php include "../uis/menu-lateral.php" ?>

<h3 align="center">Registro de Producto</h3>
<br />
<div class="formulario" align="center">
    <!--<form action="index.php?pag=registrar" method="post" name="formu" class="form-search" >-->
    <form action="" method="post" name="formu" class="form-search" id="registrar_producto">

        <div class="<?php echo $error; ?>">
            <input type="text" name="codigo_producto" class="form-control" value="<?php echo $codigo_barra ?? ""; ?>" placeholder="Codigo de Barras" />

            <input type="hidden" name="codigo_producto2" value="<?php echo $codigo_barra2 ?? ""; ?>" />


        </div>

        <div class="<?php echo $error; ?>">
            <input type="text" name="codigo_interno" class="form-control" value="<?php echo $codigo_interno ?? ""; ?>" placeholder="Codigo Interno" />

            <!-- <input type="hidden" name="codigo_interno2" value="<?php echo $codigo_interno2 ?? ""; ?>" />
 </div> -->

            <div class="<?php echo $error; ?>">
                <input type="text" name="nombre" class="form-control" value="<?php echo $nombre_producto ?? ""; ?>" placeholder="Nombre" />
            </div>



            <div class="<?php echo $error; ?>">
                <input type="text" name="fabricante" class="form-control" value="<?php echo $fabricante ?? ""; ?>" placeholder="Fabricante" />
            </div>


            <div class="<?php echo $error; ?>">
                <input type="number" name="cantidad" class="form-control" value="<?php echo $cantidad ?? ""; ?>" placeholder="Cantidad Entrante" />
            </div>


            <div class="<?php echo $error; ?>">
                <input type="text" name="precio_compra" class="form-control" value="<?php echo $precio_compra ?? ""; ?>" placeholder="Precio Compra" />
            </div>


            <div class="<?php echo $error; ?>">
                <input type="text" name="precio_venta" class="form-control" value="<?php echo $precio_venta ?? ""; ?>" placeholder="Precio Venta" />
            </div>




            <div>
                <input type="submit" name="registrar" value="Registrar" class="btn btn-success" />
            </div>





    </form>
</div>

<script>
    let form = document.forms[0];

    window.addEventListener("load", (event) => {
        console.log("page is fully loaded");
    });

    form.addEventListener('submit', (event) => {
        event.preventDefault()

        registrarProducto()

    })

    /**
     * !Registra un producto en la base de datos
     */
    function registrarProducto() {
        let valores = []
        let codigo = document.querySelectorAll('.form-control')
        codigo.forEach((e) => {
            valores.push(e.value)
        })

        //URL de la peticion
        let url = "./control/control_registrar_producto.php";

        //configurar la peticion. AQUI CONFIGURO LA PETICION
        let configFetch = {
            method: 'POST',
            body: `producto=${valores}`,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        };

        //mandar la peticion
        let promesa = fetch(url, configFetch);

        //Ejecutar la promesa que devuelve la peticion
        promesa.then(res => res.text())
            .then(datos => {
                let d = datos;
                console.log(datos)
                errorMsg(datos);

                //mostarMensaje(d)          
            });
    }

    /**
     * !Muestra los mensages de error que se producen en el
     * !formulario o al registrar el producto
     * @param {number} cod  
     */
    function errorMsg(cod) {
        let codigo = document.querySelectorAll('.form-control')
        if (cod == -1) {
            Swal.fire({
                title: 'Error!',
                text: 'Registro duplicado',
                icon: 'error',
                confirmButtonText: 'Aceptar'
            })
        } else if (cod == 1) {
            Swal.fire({
                title: 'Guardado!',
                text: 'Producto registrado',
                icon: 'success',
                confirmButtonText: 'Aceptar',

            }).then(() => form.reset())

        } else {
            Swal.fire({
                title: 'Faltan datos!',
                text: 'Introduce todos los campos',
                icon: 'warning',
                confirmButtonText: 'Aceptar',

            }).then(() => {
                codigo.forEach((e) => {
                    if (e.value == "") {
                        e.style.borderColor = "red"
                    } else {
                        e.style.borderColor = ""
                    }
                })
            })
        }



    }

    function name(params) {
        
    }
</script>
    
</body>
</html>

