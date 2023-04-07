<?php

use function PHPSTORM_META\type;

header("Content-Type: application/json");
include_once("./db.php");
include_once("./class_producto.php");
//include_once("../utilidades/utilidades.php");

//! Instanciar un producto pasando la conexeon de la base de datos
$producto = new producto($pdo);

//echo $_POST['buscar'];


$res = $producto->consultar($_POST['buscar']);

//echo( gettype($res) );

echo json_encode($res);
?>