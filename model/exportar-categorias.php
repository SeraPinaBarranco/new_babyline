<?php
//header("Content-Type: application/json");
require "../vendor/autoload.php";
include_once("./db.php");

use PhpOffice\PhpSpreadsheet\{Spreadsheet,IOFactory};

$archivo = "categorias.xlsx";

$query = "SELECT * from categoria";

$stm = $pdo->prepare($query);
$stm->execute();
$columns = $stm->fetchAll(PDO::FETCH_ASSOC);
//print_r($columns);

$excel = new Spreadsheet();

$hojaActiva = $excel->getActiveSheet(); 
$hojaActiva->setTitle("Categorias");

$hojaActiva->setCellValue("A1", "id");
$hojaActiva->setCellValue("B1", "nombre_categoria");
//$hojaActiva->setCellValue("C1", "id_prod");


$fila = 2;
if(count($columns)>0){

    foreach ($columns as $key => $value) {
        //echo $columns[$key]["id"]. " - " . $columns[$key]["nombre_categoria"] . "<br>";
        $hojaActiva->setCellValue("A".$fila, $columns[$key]["id"]);
        $hojaActiva->setCellValue("B".$fila, $columns[$key]["nombre_categoria"]);
        //$hojaActiva->setCellValue("C".$fila, $columns[$key]["id_prod"]);
        $fila++;
    }
}


header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="categorias.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($excel, 'Xlsx');
$writer->save('php://output');
exit;