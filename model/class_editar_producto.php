<?php

header("Content-Type: application/json");
include_once("./db.php");
include_once("./class_producto.php");



$producto = new producto($pdo);

$datos = explode(",",$_POST["datos"]);

$res = $producto->actualiar($datos);

//TODO Una vez actualizado cargar datos a la tabla cambios

echo $res;

?>