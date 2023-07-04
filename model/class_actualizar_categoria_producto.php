<?php
header("Content-Type: application/json");
include_once("./db.php");

$data = 0;

$id_categoria = $_POST['categoria'];
$id= $_POST['id'];


$query = "UPDATE producto SET categoria_id = ? WHERE id_producto = ?";
$stm = $pdo->prepare($query);
$stm->execute([$id_categoria, $id]);
$data = $stm->rowCount();

echo $data;
