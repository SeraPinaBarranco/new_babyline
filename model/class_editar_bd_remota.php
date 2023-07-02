<?php
header("Content-Type: application/json");
include_once("./db.php");
$data = "";

$id_base = $_POST['id_base'];
$ip = $_POST['ip'];
$db = $_POST['db'];
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
$cojer = $_POST['cojer'];
$tabla = $_POST['tabla'];
$pais = $_POST['pais'];



$query = "UPDATE basedatos SET 
    
    ip      = ?,
    db      = ?,
    usuario = ?,
    clave   = ?,
    pais    = ?,
    cojer   = ?,
    tabla   = ?
    WHERE id_base = ?";

$stm = $pdo->prepare($query);
$stm->execute([$ip, $db, $usuario, $clave, $pais, $cojer, $tabla, $id_base]);
$data = $stm->rowCount();

echo $data;