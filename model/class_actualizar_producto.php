<?php
header("Content-Type: application/json");
include_once("./db.php");
$data = "";
if (empty($_POST['id_producto'] || empty($_POST['id_ubicacion']))) {
    $data = -1;
}else{
    $stm = $pdo->prepare("UPDATE producto SET ubicacion = ? WHERE id_producto = ?");
    
    $stm->execute([intval($_POST['id_ubicacion']), intval($_POST['id_producto'])]);
    
    $data = $stm->rowCount();



}    

echo $data;
?>