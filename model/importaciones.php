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
} elseif (!empty($_POST['importar-clientes']) && !empty($archivo)) {
    subir_archivo($archivo, 'importar-clientes');
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
    if ($resultado === true && $funcion == 'importar-clientes') {
        importar_clientes($archivo);
    }
}

function importar_clientes(string $archivo)
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
            // $query = "INSERT INTO categoria(id, nombre_categoria) 
            //         VALUES (?, ?)";
            $query = "UPDATE tiendas SET nombre=? WHERE id_tienda = ?";
            $stm = $GLOBALS['pdo']->prepare($query);

            $stm->execute([$valor2, $valor1]);
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
        $documento->disconnectWorksheets();
        unset($documento);
    } catch (\Throwable $th) {
        echo "Error al importar<br/> ";
    } finally {
        echo  "Registros importados: $rows";
    }
}

//! La importación solo se realiza de los campos propios de la tabla
function importar_productos(string $archivo)
{
    try {
        //Obtener y cargar ruta y nombre del archivo a cargar
        $nombreArchivo = $_SERVER['DOCUMENT_ROOT'] . "/new_babyline/subidas/" . $archivo;
        $documento = IOFactory::load($nombreArchivo);

        $totalHojas = $documento->getSheetCount(); //Numero de hojas
        $hojaActual = $documento->getSheet(0); //Hoja por el indice
        $numeroFilas = $hojaActual->getHighestDataRow(); //Obtener la mayor fila de datos

        $rows = 0;

        //TODO valorar si hacer una actualizacion 

        for ($nFila = 2; $nFila <= $numeroFilas; $nFila++) {
            $valor1  = $hojaActual->getCell([1, $nFila]);//nombre
            $valor2  = $hojaActual->getCell([2,  $nFila]);
            //echo($valor2);
            $valor3  = $hojaActual->getCell([3, $nFila]);
            $valor4  = $hojaActual->getCell([4, $nFila]);
            $valor5  = $hojaActual->getCell([5, $nFila]);
            $valor6  = $hojaActual->getCell([6, $nFila]);
            $valor7  = $hojaActual->getCell([7, $nFila]);
            $valor8  = $hojaActual->getCell([8, $nFila]);
            //$valor9  = $hojaActual ->getCell([9, $nFila]);
            //$valor10 = $hojaActual->getCell([10, $nFila]);

            //SI EL REGISTRO EXISTE, ACTUALIZA, SINO INSERTA
            $query = "SELECT id_producto FROM producto WHERE id_producto = $valor1";
            $stm = $GLOBALS['pdo']->prepare($query);
            $stm ->execute();
            //$rows += $stm->rowCount();

            if($stm->rowCount() == 0){
                $query = "INSERT INTO producto (nombre, fabricante, cantidad_existente, codigo_barra, codigo_interno, precio_compra, precio_venta)
                      VALUES (?,?,?,?,?,?,?)";
                $stm = $GLOBALS['pdo']->prepare($query);
                $stm->execute([$valor2, $valor3, $valor4, $valor5, $valor6, $valor7, $valor8 /*$valor9,*/]);
                $rows += $stm->rowCount();
                                
            }else{
                $query = "UPDATE producto SET 
                nombre=?,fabricante=?,cantidad_existente= ?, codigo_barra=?,codigo_interno=?,
                precio_compra=?,precio_venta=?/*,ubicacion= ?*/
                WHERE id_producto = ?";
                $stm = $GLOBALS['pdo']->prepare($query);
                $stm->execute([$valor2, $valor3, $valor4, $valor5, $valor6, $valor7, $valor8, /*$valor9,*/ $valor1,]);
                $rows += $stm->rowCount();
            }
           

            // $query = "UPDATE producto SET 
            //     nombre=?,fabricante=?,cantidad_existente= ?, codigo_barra=?,codigo_interno=?,
            //     precio_compra=?,precio_venta=?/*,ubicacion= ?*/
            //     WHERE id_producto = ?";


            // $stm = $GLOBALS['pdo']->prepare($query);
            // $stm->execute([$valor2, $valor3, $valor4, $valor5, $valor6, $valor7, $valor8, /*$valor9,*/ $valor1,]);
            // $rows += $stm->rowCount();
            // //Si se ha añadido un nuevo registro en el Excel, insertar nuevo regitro en la tabla
            // if($stm->rowCount() > 0){
            //     $query = "INSERT INTO producto (nombre, fabricante, cantidad_existente,codigo_barra,codigo_interno,precio_compra,precio_venta)
            //           VALUES (?,?,?,?,?,?,?)";
            //     $stm->execute([$valor2, $valor3, $valor4, $valor5, $valor6, $valor7, $valor8, /*$valor9,*/ $valor1,]);
            //     $rows += $stm->rowCount();
            //     //echo $valor1;
            // }
        }
    } catch (\Throwable $th) {
        echo "Error al importar: $th<br/> ";
    } finally {
        
        echo  "Registros importados: $rows";
        $documento->disconnectWorksheets();
        unset($documento);
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

            $query = "UPDATE categoria SET nombre_categoria = ? WHERE id = ?";
            $stm = $GLOBALS['pdo']->prepare($query);

            $stm->execute([$valor2, $valor1]);
            $rows += $stm->rowCount();
        }

        echo  "Registros importados con éxito!!<br/>";
    } catch (\Throwable $th) {
        echo "Error al importar<br/> ";
    } finally {
        echo  "Registros importados: $rows";
        $documento->disconnectWorksheets();
        unset($documento);
    }
}
