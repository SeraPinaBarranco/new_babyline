<?php

header("Content-Type: application/json");
include_once("./db.php");
include_once("./class_producto.php");

$producto = new producto($pdo);

$datos = $_POST["datos"];

$res = $producto->eliminar($datos);

echo $res;

?>