<?php

header("Content-Type: application/json");
include_once("./db.php");
include_once("./ropadecu.php");
include_once("./class_producto.php");



$producto = new producto($pdo);

$datos = explode(",",$_POST["datos"]);

$res = $producto->actualiar($datos);


//TODO Actualizar web al actualizar un producto
if($pdo_ropadecu){

    $query = "UPDATE oc_product_copia set  quantity = ? , price = ? WHERE model = ? and ean = ?";
        
    $stm = $pdo_ropadecu->prepare($query);
    
    $stm->execute([$datos[5], $datos[7], $datos[2], $datos[1]]);
    
    $data = $stm->rowCount();
}


// print_r($datos);
echo $res;


//! Carga datos a la tabla cambios
// $res == 1 ? generarCambios($datos[2], $datos[1], $datos[5], $datos[7], $pdo) : "";
// function generarCambios($model, $ean, $quantity, $price, $pdo){
//     $query = "INSERT INTO cambios VALUES(?, ? , ?, ?, ?, 0,0,0)";
//     $fecha = new DateTime();
//     $fecha_formateada = $fecha->format('Y-m-d H:i:s');
//     print_r($fecha_formateada);
//     $stm = $pdo->prepare($query);
                
//     $stm->execute([$model,$ean,$quantity, doubleval($price), $fecha_formateada]);


// }

?>