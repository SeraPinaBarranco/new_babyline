<?php
include_once "./db.php";



$query = "SELECT * FROM basedatos";
$stm = $pdo->prepare($query);
$stm->execute();
$data = $stm->fetchAll(PDO::FETCH_ASSOC);
//print_r($data[0]['ip']);

$ropacedecu = $data[3];

extract($ropacedecu);


$DNS = "mysql:host=" .$ip. ";dbname=". $db .";charset=utf8";

$pdo = new PDO($DNS,$usuario, $clave) or die( "Error en la conexión");