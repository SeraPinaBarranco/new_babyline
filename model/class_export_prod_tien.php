<?php
header('Access-Control-Allow-Origin: *');

header("Content-Type: application/json");
include_once("./db.php");

//$obj = new stdClass();

class Obj{
    public $columna;
    public $productos;
    public $precios;
    public $tiendas;
}

//Variable que almacena el nº de clientes para crear las columnas
$columns = 0;   

$query ="SELECT COUNT(tiendas.id_tienda) as columnas from tiendas";

$stm = $pdo->prepare($query);
$stm->execute();
$columns = $stm->fetchAll(PDO::FETCH_ASSOC);


// $productos = "";

// $query2 = "SELECT cantidad_existente as cantidad_exixtente, 
//                     codigo_barra as Codigo_barra,
//                     codigo_interno as Codigo_interno,
//                     fabricante as Fabricante,
//                     id_producto as ID_producto,
//                     nombre as Nombre_producto,
//                     precio_compra as Precio_compra,
//                     precio_venta as Precio_de_venta
//             FROM producto";

// $stm = $pdo->prepare($query2);
// $stm->execute();
// $productos  = $stm->fetchAll(PDO::FETCH_ASSOC);


$precios = "";

$query = "SELECT p.id_producto, p.nombre, t.id_tienda, t.nombre as nombreTienda, pt.precio_producto from productos_tienda pt
            INNER JOIN producto p ON p.id_producto = pt.id_producto
            INNER JOIN tiendas t ON t.id_tienda = pt.id_tienda";
$stm = $pdo->prepare($query);
$stm->execute();
$precios  = $stm->fetchAll(PDO::FETCH_ASSOC);



$tiendas = "";

$query = "SELECT count(DISTINCT(pt.id_tienda)) as tiendas FROM productos_tienda pt";
$stm = $pdo->prepare($query);
$stm->execute();
$tiendas  = $stm->fetchAll(PDO::FETCH_ASSOC);

$obj = new Obj();

$obj->columna = $columns;
//$obj->productos = $productos;
$obj->precios = $precios;
$obj->tiendas = $tiendas;
//print_r($productos);

echo json_encode($obj);   




?>