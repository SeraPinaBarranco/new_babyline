<?php
header('Access-Control-Allow-Origin: *');

header("Content-Type: application/json");
include_once("./db.php");

//$obj = new stdClass();

class Obj{
    public $columna;
    public $productos;
    public $precios;
}

//Variable que almacena el nº de clientes para crear las columnas
$columns = 0;   

$query ="SELECT COUNT(tiendas.id_tienda) * 2 as columnas from tiendas";

$stm = $pdo->prepare($query);
$stm->execute();
$columns = $stm->fetchAll(PDO::FETCH_ASSOC);


$productos = "";

$query2 = "SELECT * FROM producto LIMIT 100";
$stm = $pdo->prepare($query2);
$stm->execute();
$productos  = $stm->fetchAll(PDO::FETCH_ASSOC);


$precios = "";

$query = "SELECT * from productos_tienda";
$stm = $pdo->prepare($query);
$stm->execute();
$precios  = $stm->fetchAll(PDO::FETCH_ASSOC);

$obj = new Obj();

$obj->columna = $columns;
//$obj->productos = $productos;
$obj->precios = $precios;

//print_r($productos);

echo json_encode($obj);   




?>