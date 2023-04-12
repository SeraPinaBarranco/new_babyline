<?php
header("Content-Type: application/json");
include_once("./db.php");

$stm = $pdo->prepare("SELECT * FROM ubicacion");

$stm->execute();

$data = $stm->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);
?>