<?php

header("Content-Type: application/json");
include_once("./db.php");
$data = "";

$query = "DELETE FROM basedatos WHERE id_base = ?";
$stm = $pdo->prepare($query);
$stm->execute([$_POST['id_base']]);
$data = $stm->rowCount();
