<?php
// header("Content-Type: application/json");
require "../vendor/autoload.php";
include_once("./db.php");

use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\IOFactory;

$archivo = $_FILES["archivo"]["name"];


if (!empty($_POST['importar-productos']) && !empty($archivo)) {
    //importar_productos();
    subir_archivo($archivo, 'importar-productos');
} elseif (!empty($_POST['importar-categorias']) && !empty($archivo)) {
    //importar_categorias();
    subir_archivo($archivo, 'importar-categorias');
} else {
    echo "no";
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




function importar_productos(string $archivo)
{
    //Obtener y cargar ruta y nombre del archivo a cargar
    $nombreArchivo = $_SERVER['DOCUMENT_ROOT'] . "/new_babyline/subidas/" . $archivo;
    $documento = IOFactory::load($nombreArchivo);

    $totalHojas = $documento->getSheetCount(); //Numero de hojas
    $hojaActual = $documento->getSheet(0); //Hoja por el indice
    $numeroFilas = $hojaActual->getHighestDataRow(); //Obtener la mayor fila de datos

    $rows = 0;

    for ($nFila = 2; $nFila <= $numeroFilas; $nFila++) {
        $valor1 = $hojaActual->getCell([1, $nFila]);
        $valor2 = $hojaActual->getCell([2,  $nFila]);
        $valor3  = $hojaActual->getCell([3, $nFila]);
        $valor4 = $hojaActual->getCell([4, $nFila]);
        $valor5 = $hojaActual->getCell([5, $nFila]);
        $valor6 = $hojaActual->getCell([6, $nFila]);
        $valor7 = $hojaActual->getCell([7, $nFila]);
        $valor8 = $hojaActual->getCell([8, $nFila]);
        $valor9 = $hojaActual->getCell([9, $nFila]);
        $valor10 = $hojaActual->getCell([10, $nFila]);

        $query = "INSERT INTO 
            producto2(id_producto, codigo_barra, codigo_interno, nombre, 
            fabricante, cantidad_existente, precio_compra, precio_venta, 
            ubicacion, categoria_id) 
        VALUES (?,?,?,?,?,?,?,?,?,?)";
        $stm = $GLOBALS['pdo']->prepare($query);

        $stm->execute([$valor1, $valor2, $valor3, $valor4, $valor5, $valor6, $valor7, $valor8, $valor9, $valor10]);
        $rows += $stm->rowCount();
    }
}

function importar_categorias(string $archivo)
{
    try {
        //Obtener y cargar ruta y nombre del archivo a cargar
        $nombreArchivo = $_SERVER['DOCUMENT_ROOT'] . "/new_babyline/subidas/" . $archivo;
        $documento = IOFactory::load($nombreArchivo);

        $totalHojas = $documento->getSheetCount(); //Numero de hojas
        $hojaActual = $documento->getSheet(0); //Hoja por el indice
        $numeroFilas = $hojaActual->getHighestDataRow(); //Obtener la mayor fila de datos

        $rows = 0;
        for ($nFila = 2; $nFila <= $numeroFilas; $nFila++) {
            $valor1 = $hojaActual->getCell([1, $nFila]);
            $valor2 = $hojaActual->getCell([2,  $nFila]);
            //$valor3 = $hojaActual->getCell([3,   $nFila]);
            //if ($valor3 =="") {//si es vacio crear consulta sin id_prod
            $query = "INSERT INTO categoria(id, nombre_categoria) 
                    VALUES (?, ?)";
            $stm = $GLOBALS['pdo']->prepare($query);

            $stm->execute([$valor1, $valor2]);
            $rows += $stm->rowCount();
            //echo "$valor1 - $valor2 - $valor3<br/>" ;
            // }else{
            //     $query = "INSERT INTO categoria(id, nombre_categoria, id_prod) 
            //         VALUES (?, ?, ?)";
            //     $stm = $GLOBALS['pdo']->prepare($query);

            //     $stm->execute([$valor1,$valor2,$valor3]);
            // }

        }

        echo  "Registros importados con éxito!!<br/>";
    } catch (\Throwable $th) {
        echo "Error al importar<br/> ";
    } finally {
        echo  "Registros importados: $rows";
    }
}


function subir_archivo(string $archivo, string $funcion)
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

    //Si se ha subido correctamente se llama a las funciones de importar
    if ($resultado === true && $funcion == 'importar-categorias') {
        importar_categorias($archivo);
    }
    if ($resultado === true && $funcion == 'importar-productos') {
        importar_productos($archivo);
    }
}
