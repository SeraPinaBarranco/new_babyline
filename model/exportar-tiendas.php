<?php
//header("Content-Type: application/json");
require "../vendor/autoload.php";
include_once("./db.php");

//TODO Descomentar y ajustar a tiendas

use PhpOffice\PhpSpreadsheet\{Spreadsheet,IOFactory};

$archivo = "tiendas.xlsx";

$query = "SELECT * from tiendas";

$stm = $pdo->prepare($query);
$stm->execute();
$columns = $stm->fetchAll(PDO::FETCH_ASSOC);

$excel = new Spreadsheet();

$hojaActiva = $excel->getActiveSheet(); 
$hojaActiva->setTitle("Tiendas");

$hojaActiva->setCellValue("A1", "id_tienda");
$hojaActiva->setCellValue("B1", "nombre");
// $hojaActiva->setCellValue("C1", "id_prod");


$fila = 2;
foreach ($columns as $key => $value) {
    //echo $columns[$key]["id"]. " - " . $columns[$key]["nombre_categoria"] . "<br>";
    $hojaActiva->setCellValue("A".$fila, $columns[$key]["id_tienda"]);
    $hojaActiva->setCellValue("B".$fila, $columns[$key]["nombre"]);
    //$hojaActiva->setCellValue("C".$fila, $columns[$key]["id_prod"]);
    $fila++;
}


header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$archivo.'"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;