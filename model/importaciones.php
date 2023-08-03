<?php
// header("Content-Type: application/json");
require "../vendor/autoload.php";
include_once("./db.php");


use PhpOffice\PhpSpreadsheet\IOFactory;

$archivo = $_FILES["archivo"]["name"];
//$archivo = $_FILES["archivo"];

$msg = "";


if (!empty($_POST['importar-productos']) && !empty($archivo)) {
    //importar_productos($archivo);
    subir_archivo($archivo, 'importar-productos');
} elseif (!empty($_POST['importar-categorias']) && !empty($archivo)) {
    //importar_categorias();
    subir_archivo($archivo, 'importar-categorias');
} elseif (!empty($_POST['importar-clientes']) && !empty($archivo)) {
    subir_archivo($archivo, 'importar-clientes');
} else {
    echo "no";
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
    $nuevaUbicacion = $rutaDeSubidas .  $nombreArchivo;

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

        //$totalHojas = $documento->getSheetCount(); //Numero de hojas
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

            //SI EL REGISTRO EXISTE, ACTUALIZA, SINO INSERTA
            $query = "SELECT id_tienda FROM tiendas WHERE id_tienda = $valor1";
            $stm = $GLOBALS['pdo']->prepare($query);
            $stm->execute();

            if ($stm->rowCount() == 0) {
                $query = "INSERT INTO tiendas (nombre) VALUES (?)";
                $stm = $GLOBALS['pdo']->prepare($query);

                $stm->execute([$valor2]);
                $rows += $stm->rowCount();
            } else {
                $query = "UPDATE tiendas SET nombre=? WHERE id_tienda = ?";
                $stm = $GLOBALS['pdo']->prepare($query);

                $stm->execute([$valor2, $valor1]);
                $rows += $stm->rowCount();
            }
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
    //VERSION Con bind param
    try {
        $pdo = $GLOBALS['pdo'];
        $nombreArchivo = $_SERVER['DOCUMENT_ROOT'] . "/new_babyline/subidas/" . $archivo;
        $documento = IOFactory::load($nombreArchivo);
        $hojaActual = $documento->getSheet(0);
        $numeroFilas = $hojaActual->getHighestDataRow();

        $rows = 0;

        $insertQuery = "INSERT INTO producto (id_producto, nombre, fabricante, cantidad_existente, codigo_barra, codigo_interno, precio_compra, precio_venta)
                        VALUES (:id_producto, :nombre, :fabricante, :cantidad_existente, :codigo_barra, :codigo_interno, :precio_compra, :precio_venta)
                        ON DUPLICATE KEY UPDATE 
                        nombre = VALUES(nombre),
                        fabricante = VALUES(fabricante),
                        cantidad_existente = VALUES(cantidad_existente),
                        codigo_barra = VALUES(codigo_barra),
                        codigo_interno = VALUES(codigo_interno),
                        precio_compra = VALUES(precio_compra),
                        precio_venta = VALUES(precio_venta)";



        $pdo->beginTransaction();

        $stmt = $pdo->prepare($insertQuery);


        for ($nFila = 2; $nFila <= $numeroFilas; $nFila++) {
            $valor1  = $hojaActual->getCell([1, $nFila])->getValue();
            $valor2  = $hojaActual->getCell([2, $nFila])->getValue();
            $valor3  = $hojaActual->getCell([3, $nFila])->getValue();
            $valor4  = $hojaActual->getCell([4, $nFila])->getValue();
            $valor5  = $hojaActual->getCell([5, $nFila])->getValue();
            $valor6  = $hojaActual->getCell([6, $nFila])->getValue();
            $valor7  = $hojaActual->getCell([7, $nFila])->getValue();
            $valor8  = $hojaActual->getCell([8, $nFila])->getValue();
            $valor10 = $hojaActual->getCell([10, $nFila])->getValue();
            $valor12 = $hojaActual->getCell([12, $nFila])->getValue();

            // Insertar o actualizar producto
            $stmt->bindParam(':id_producto', $valor1);
            $stmt->bindParam(':nombre', $valor2);
            $stmt->bindParam(':fabricante', $valor3);
            $stmt->bindParam(':cantidad_existente', $valor4);
            $stmt->bindParam(':codigo_barra', $valor5);
            $stmt->bindParam(':codigo_interno', $valor6);
            $stmt->bindParam(':precio_compra', $valor7);
            $stmt->bindParam(':precio_venta', $valor8);
            $stmt->execute();
            //$stmt->debugDumpParams();

            $ubicacionUpdateQuery = "UPDATE producto SET ubicacion = $valor10 WHERE id_producto = ?";
            $categoriaUpdateQuery = "UPDATE producto SET categoria_id = $valor12 WHERE id_producto = ?";
            $stmtUbicacion = $pdo->prepare($ubicacionUpdateQuery);
            $stmtCategoria = $pdo->prepare($categoriaUpdateQuery);

            // Actualizar ubicacion
            $stmtUbicacion->execute([$valor1]);

            // Actualizar categoria_id
            $stmtCategoria->execute([$valor1]);

            $rows++;
        }

        $pdo->commit();
        echo "Registros importados: $rows";
    } catch (\Throwable $th) {
        $pdo->rollBack();
        echo "Error al importar: $th<br/>";
    } finally {
        $documento->disconnectWorksheets();
        unset($documento);
        //header("Location: ../buscar.php");
        
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


            //SI EL REGISTRO EXISTE, ACTUALIZA, SINO INSERTA
            $query = "SELECT id FROM categoria WHERE id = $valor1";
            $stm = $GLOBALS['pdo']->prepare($query);
            $stm->execute();

            if ($stm->rowCount() == 0) {
                $query = "INSERT INTO categoria (nombre_categoria) VALUES (?)";
                $stm = $GLOBALS['pdo']->prepare($query);

                $stm->execute([$valor2]);
                $rows += $stm->rowCount();
            } else {

                $query = "UPDATE categoria SET nombre_categoria = ? WHERE id = ?";
                $stm = $GLOBALS['pdo']->prepare($query);

                $stm->execute([$valor2, $valor1]);
                $rows += $stm->rowCount();
            }
        }

        echo  "Registros importados con éxito!!<br/>";
    } catch (\Throwable $th) {
        echo "Error al importar:<br/>" . $th;
    } finally {
        echo  "Registros importados: $rows";
       
        $documento->disconnectWorksheets();
        unset($documento);
    }
}


