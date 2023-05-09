<?php
require "./vendor/autoload.php";


use PhpOffice\PhpSpreadsheet\IOFactory;

$nombreArchivo = "./datos/categorias.xlsx";
$documento = IOFactory::load($nombreArchivo);

$totalHojas = $documento->getSheetCount();

$hojaActual = $documento->getSheet(0);
$numeroFilas = $hojaActual->getHighestDataRow();
$letra = $hojaActual->getHighestDataColumn();


//var_dump($numeroFilas) ;
// for ($i=0; $i < $totalHojas; $i++) { 
//     # code...
// }

for ($nFila=1; $nFila <= $numeroFilas ; $nFila++) { 
    //for ($col=1; $col <= $letra; $col++) { 
        $valor = $hojaActual->getCell([$nFila, 1]);
        echo $valor;
    //}
}

?>
