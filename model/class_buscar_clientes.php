<?php
header("Content-Type: application/json");
include_once("./db.php");
$data = "";
$nombre =  "";



$nombre = $_POST['cliente'];
$stm = $pdo->prepare("SELECT * FROM tiendas WHERE nombre LIKE upper(:nombre)");

$stm->execute([':nombre' => "$nombre%"]);

$data = $stm->fetchAll(PDO::FETCH_ASSOC);







echo (json_encode($data));

?>
