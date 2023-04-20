<?php 

header("Content-Type: application/json");
include_once("./db.php");
$data = "";

$query = "SELECT p.id_producto, p.codigo_barra, p.codigo_interno, p.nombre, p.cantidad_existente, p.precio_venta, t.nombre as tienda, pt.precio_producto, pt.id_tienda FROM producto p
            LEFT OUTER JOIN productos_tienda pt
                on pt.id_producto = p.id_producto
            LEFT OUTER JOIN tiendas t 
                ON t.id_tienda = pt.id_tienda

            where pt.id_tienda is not null and pt.id_producto is not null";

$stm = $pdo->prepare($query);

$stm->execute();

$data = $stm->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);


?>