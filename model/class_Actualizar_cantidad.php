<?php
header("Content-Type: application/json");
include_once("./db.php");
$data = "";


$query = "DELETE FROM tiendas WHERE id_tienda = ?";
$stm = $pdo->prepare($query);
$stm->execute([$id_cliente]);
$data = $stm->rowCount();



echo $data;
