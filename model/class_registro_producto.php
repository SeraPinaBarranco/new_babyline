<?php
include_once("./db.php");
include_once("./class_producto.php");
include_once("./class_registro_producto.php");
//include_once("../utilidades/utilidades.php");

//! Instanciar un producto pasando la conexeon de la base de datos
$producto = new producto($pdo);

//! Guardar en un array los valores del formulario
$array_producto = array( explode(',' , $_POST['producto']));

$vacio = false;



foreach ($array_producto[0] as $value) {
	if(empty($value))$vacio = true;
}


if($vacio){//si no hay algun valor que viene del formulario
	echo -2;
	exit;
}

$res = $producto->registrar($array_producto[0]);

echo $res;

?>