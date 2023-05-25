<?php
include_once "./db.php";



$query = "SELECT * FROM basedatos";
$stm = $pdo->prepare($query);
$stm->execute();
$data = $stm->fetchAll(PDO::FETCH_ASSOC);
//print_r($data[0]['ip']);

foreach ($data as $key => $value) {
    print_r($data[$key]['ip']) ;
}
