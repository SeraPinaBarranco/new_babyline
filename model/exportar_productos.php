<?php
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\{Spreadsheet,IOFactory};
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$data = json_decode($_POST['datos'], true);

// Crear una instancia de Spreadsheet
$excel = new Spreadsheet();

$hojaActiva = $excel->getActiveSheet(); 
$hojaActiva->setTitle("Productos");

// $hojaActiva->setCellValue("A1", "id_tienda");
// $hojaActiva->setCellValue("B1", "nombre");

  

// Obtener los encabezados de las columnas
$headers = array_keys($data[0]);
$columnIndex = 1;
$indice = 65;
$col = "";
foreach ($headers as $value) {    
    $col = chr($indice);
   
    
    $hojaActiva->setCellValue($col . 1 ,$value);
    
    $indice++;
}

$indice = 65;
$fila = 2;
foreach ($data as $key => $value) {
    //$data[$key]['id_producto'];
    $col = chr($indice);
    
    $hojaActiva->setCellValue("A".$fila, $data[$key]['id_producto']);  
    $hojaActiva->setCellValue("B".$fila, $data[$key]['codigo_barra']);  
    echo $data[$key]['codigo_barra'];
    $hojaActiva->setCellValue("C".$fila, $data[$key]['codigo_interno']);  
    $hojaActiva->setCellValue("D".$fila, $data[$key]['nombre']);  
    $hojaActiva->setCellValue("E".$fila, $data[$key]['fabricante']);  
    $hojaActiva->setCellValue("F".$fila, $data[$key]['cantidad_existente']);  
    $hojaActiva->setCellValue("G".$fila, $data[$key]['precio_compra']);  
    $hojaActiva->setCellValue("H".$fila, $data[$key]['precio_venta']);  
    $hojaActiva->setCellValue("I".$fila, $data[$key]['ubicacion']);  
    $hojaActiva->setCellValue("J".$fila, $data[$key]['categoria_id']);  
    $hojaActiva->setCellValue("K".$fila, $data[$key]['ubicacion_almacen']);  
    $hojaActiva->setCellValue("L".$fila, $data[$key]['nombre_categoria']);
    $hojaActiva->setCellValue("M".$fila, $data[$key]['nombre_categoria']);  

    $fila++;
 
}

$archivo = "productos.xlsx";
$writer = new Xlsx($excel);

//header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//header('Content-Disposition: attachment; filename="Productos.xlsx"');
//header('Cache-Control: max-age=0');
//$writer = IOFactory::createWriter($excel, 'Xlsx');
//$writer->save('php://output');

$filePath = './archivo.xlsx';
$writer->save($filePath);


exit;


