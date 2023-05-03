<?php
header("Content-Type: application/json");
include_once("./db.php");


//Variable que almacena el nº de clientes para crear las columnas
$columns = 0;   

$query ="SELECT COUNT(tiendas.id_tienda) * 2 as columnas from tiendas";

$stm = $pdo->prepare($query);
    


$stm->execute();

$columns = $stm->fetchAll(PDO::FETCH_ASSOC);



echo json_encode($columns);   




?>