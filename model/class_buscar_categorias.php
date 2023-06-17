<?php
header("Content-Type: application/json");
include_once("./db.php");
$data = "";
$nombre =  "";



$nombre = $_POST['categoria'];
$stm = $pdo->prepare("SELECT * FROM categoria WHERE nombre_categoria LIKE upper(:nombre)");

$stm->execute([':nombre' => "$nombre%"]);

$data = $stm->fetchAll(PDO::FETCH_ASSOC);







echo (json_encode($data));

?>
