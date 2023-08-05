<?php
header("Content-Type: application/json");
include_once("./db.php");
$data = "";


// $query = "DELETE FROM tiendas WHERE id_tienda = ?";
// $stm = $pdo->prepare($query);
// $stm->execute([$id_cliente]);
// $data = $stm->rowCount();

$id = $_POST['id_producto'];
$cantidad = intval($_POST['cantidad']);
$query = "UPDATE producto SET cantidad_existente = cantidad_existente + $cantidad WHERE id_producto= ?";

$stm = $pdo->prepare($query);
$stm->execute([$id]);
$data = $stm->rowCount();

echo $data;
