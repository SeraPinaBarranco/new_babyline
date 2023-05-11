<?php
// header("Content-Type: application/json");
require "../vendor/autoload.php";
include_once("./db.php");

use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\IOFactory;

$archivo = $_FILES["archivo"]["name"];


if (!empty($_POST['importar-productos']) && is_file($archivo)) {
    importar_productos();
    subir_archivo($archivo);
} elseif (!empty($_POST['importar-categorias']) && is_file($archivo)) {
    importar_categorias();
    subir_archivo($archivo);
}

// $nombreArchivo = "../datos/categorias.xlsx";
// $documento = IOFactory::load($nombreArchivo);

// $totalHojas = $documento->getSheetCount();

// $hojaActual = $documento->getSheet(0);
// $numeroFilas = $hojaActual->getHighestDataRow();


// for ($nFila=2; $nFila <= $numeroFilas ; $nFila++) { 
// //     //for ($col=1; $col <= $columns+1; $col++) { 
//     $valor1 = $hojaActual->getCell([1 , $nFila]);
//     $valor2 = $hojaActual->getCell([2,  $nFila]);
//     $valor3 = $hojaActual->getCell([3,   $nFila]);
//     if ($valor3 =="") {//si es vacio crear consulta sin id_prod
//         $query = "INSERT INTO categoria(id, nombre_categoria) 
//             VALUES (?, ?)";
//         $stm = $pdo->prepare($query);

//         $stm->execute([$valor1,$valor2]);
//         echo "$valor1 - $valor2 - $valor3<br/>" ;
//     }else{
//         $query = "INSERT INTO categoria(id, nombre_categoria, id_prod) 
//             VALUES (?, ?, ?)";
//         $stm = $pdo->prepare($query);

//         $stm->execute([$valor1,$valor2,$valor3]);
//     }

// }




function importar_productos()
{
    var_dump($_FILES);
}

function importar_categorias()
{
    $nombreArchivo =  $GLOBALS['archivo'];
    $documento = IOFactory::load($nombreArchivo);
    $totalHojas = $documento->getSheetCount();
    $hojaActual = $documento->getSheet(0);
    $numeroFilas = $hojaActual->getHighestDataRow();

    var_dump($GLOBALS['archivo']);
    // for ($nFila=2; $nFila <= $numeroFilas ; $nFila++) { 

    //     $valor1 = $hojaActual->getCell([1 , $nFila]);
    //     $valor2 = $hojaActual->getCell([2,  $nFila]);
    //     $valor3 = $hojaActual->getCell([3,   $nFila]);
    //     if ($valor3 =="") {//si es vacio crear consulta sin id_prod
    //         $query = "INSERT INTO categoria(id, nombre_categoria) 
    //             VALUES (?, ?)";
    //         $stm = $GLOBALS['pdo']->prepare($query);

    //         $stm->execute([$valor1,$valor2]);
    //         echo "$valor1 - $valor2 - $valor3<br/>" ;
    //     }else{
    //         $query = "INSERT INTO categoria(id, nombre_categoria, id_prod) 
    //             VALUES (?, ?, ?)";
    //         $stm = $GLOBALS['pdo']->prepare($query);

    //         $stm->execute([$valor1,$valor2,$valor3]);
    //     }

    // }
}
//var_dump($_POST);

function subir_archivo($archivo)
{
    # La carpeta en donde guardaremos los archivos, en este caso es "subidas" pero podría ser
    # cualqueir otro, incluso podría ser aquí mismo sin subcarpetas
    $rutaDeSubidas = $_SERVER['DOCUMENT_ROOT'] . "/new_babyline/subidas/";
     
    # Crear si no existe
    if (!is_dir($rutaDeSubidas)) {
        mkdir($rutaDeSubidas, true);
    }
    # Tomar el archivo. Recordemos que "archivo" es el atributo "name" de nuestro input
    $informacionDelArchivo = $_FILES["archivo"];

    # La ubicación en donde PHP lo puso
    $ubicacionTemporal = $informacionDelArchivo["tmp_name"];

    #Nota: aquí tomamos el nombre que trae, pero recomiendo renombrarlo a otra cosa usando, por ejemplo, uniqid
    $nombreArchivo = $informacionDelArchivo["name"];
    $nuevaUbicacion = $rutaDeSubidas . "/" . $nombreArchivo;

    # Mover
    $resultado = move_uploaded_file($ubicacionTemporal, $nuevaUbicacion);
    if ($resultado === true) {
        echo "Archivo subido correctamente";
    } else {
        echo "Error al subir archivo";
    }

}
