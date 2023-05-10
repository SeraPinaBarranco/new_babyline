<?php
// header("Content-Type: application/json");
require "../vendor/autoload.php";
include_once("./db.php");

use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\IOFactory;

$nombreArchivo = "../datos/categorias.xlsx";
$documento = IOFactory::load($nombreArchivo);

$totalHojas = $documento->getSheetCount();

$hojaActual = $documento->getSheet(0);
$numeroFilas = $hojaActual->getHighestDataRow();


//echo $c;
//var_dump($numeroFilas) ;
// for ($i=0; $i < $totalHojas; $i++) { 
//     # code...
// }

for ($nFila=2; $nFila <= $numeroFilas ; $nFila++) { 
//     //for ($col=1; $col <= $columns+1; $col++) { 
    $valor1 = $hojaActual->getCell([1 , $nFila]);
    $valor2 = $hojaActual->getCell([2,  $nFila]);
    $valor3 = $hojaActual->getCell([3,   $nFila]);
    if ($valor3 =="") {//si es vacio crear consulta sin id_prod
        $query = "INSERT INTO categoria(id, nombre_categoria) 
            VALUES (?, ?)";
        $stm = $pdo->prepare($query);

        $stm->execute([$valor1,$valor2]);
        echo "$valor1 - $valor2 - $valor3<br/>" ;
    }else{
        $query = "INSERT INTO categoria(id, nombre_categoria, id_prod) 
            VALUES (?, ?, ?)";
        $stm = $pdo->prepare($query);

        $stm->execute([$valor1,$valor2,$valor3]);
    }

                
    //echo $valor3;
//     //}
//     //echo "</br>";
}


?>
