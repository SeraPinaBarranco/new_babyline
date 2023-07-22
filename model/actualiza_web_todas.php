<?php

include_once("./db.php");
//include_once("./ropadecu.php");

// 1- OBTENER LOS PRODUCTOS
//Traer los productos de la BD
$query_productos  = "SELECT * from producto where id_producto = 1156";
$stm_productos = $pdo->query($query_productos);
$productos = $stm_productos->fetchAll(PDO::FETCH_ASSOC);

// 2- OBTENER BASEDATOS 
//TODO traer los datos de la tabla basedatos    
$query = "SELECT * FROM basedatos";
$stm = $pdo->query($query);
$data = $stm->fetchAll(PDO::FETCH_ASSOC);//datos de la tabla basedatos


$i = 0;




//TODO RECORRER LA TABLA BASEDATOS Y EN CADA ITERACION ACTUALIZAR CON LOS PRODUCTOS
//foreach ($productos as $key => $producto) {
    # code...
    
    //print_r($producto);

    
    //echo($producto[$i]['nombre']);
    //echo  "</br>";
  
    //Recorrer BD Remota y en cada vuelta de un producto, actualizar
    //foreach ($data as $key => $fila) {
    //     //print_r($value['ip']);
        conexion_bd_remota($productos, $data);

    //}
    
//}




/**
 * PARAM $producto -> Iteracion de cada registro de productos
 * PARAM $datos_bd -> Contiene los datos de la tabla Basedatos
 */
function conexion_bd_remota($data_productos, $datos_bd)
{
    
    //print_r($producto['id_producto']);
    foreach ($datos_bd as $key => $fila) {
    
        // 1 Crear conexion a base de datos remota
        $SERVER =  $fila['ip'];
        $USER   =  $fila['usuario'];   
        $PASS   =  $fila['clave'];
        $BBDD   =  $fila['db'];
        //echo( $ip ." </br>");
        // print_r($nombre) ;
        // echo(" </br>");
        $rows= 0;
        try {
            //Conexion a la BD Remota
            $DNS = "mysql:host=$SERVER;dbname=$BBDD";       
            $pdo = new PDO($DNS, $USER, $PASS);

            //SI LA CONEXION HA SIDO OK ACTUALIZAR TABLA
            //TODO CAMBIAR TABLA ORIGINAL POR COPIA EN PRUEBAS
            if ($pdo) {
                //echo "Conectado a $SERVER</br>";
                
                foreach ($data_productos as $key => $producto) {
                    //Consulta de actualizacion
                    //echo $fila['tabla'];
                    $cojer = $producto[$fila['cojer']];//obtener el valor de "cojer"
                    //echo $cojer;
                    $update = "UPDATE " .  $fila['tabla']  . "_copia oc set oc.quantity = ". $producto['cantidad_existente'] .", price = '" . $cojer ."'  where oc.model = '" . $producto['codigo_interno'] . "' or oc.ean = '". $producto['codigo_barra'] ."'";
                    echo $update;
                    // $res =$pdo->prepare($update);
                    // $res->execute();
                    //echo $producto['codigo_interno'] . " - ". $producto['codigo_barra'] ."</br>";
                    //$rows += $res->rowCount();

                }
            } 
            //echo "</br></br>";
        } catch (PDOException  $th) {
            echo("Error al conectar: " . $th->getMessage() . "</br>");
        }
        echo $rows;
    }

    // $indice1 = 0;
    // $longitud1 = count($data);

    // while ($indice1 < $longitud1) {
    //     $elemento = $data[$indice1];
    //     $indice2 = 0;
    //     $longitud2 = count($elemento);

        /*while ($indice2 <br $longitud2) {
            $clave = array_keys($elemento)[$indice2];
            $valor = $elemento[$clave];
            //print_r(array_keys($elemento)[$indice2]);
            //print_r($indice2);
            echo $valor;
            echo "</br>";

            $indice2++;
        }
        //print_r($elemento);
        //echo "</br>";
        $indice1++;

        recorrerProductos($elemento['ip'], $elemento['usuario'], $elemento['clave'], $elemento['db'], $elemento['tabla'], $elemento['cojer']);
    }*/
}

//TODO Recorrer la tabla de productos para actualizar las webs
function recorrerProductos($ip, $usuario, $clave, $db, $tabla, $cojer)
{
    try {
        //Conexion a la BD Remota
        $DNS = "mysql:host=$ip;dbname=$db";
        $pdo = new PDO($DNS, $usuario, $clave);
    
    
        //TODO Si la conexión a la BD remota es correcta
        if ($pdo) {
            echo "Conectado a $ip</br>";
            //TODO Recorrer la tabla de productos
            // while ($fila = $GLOBALS['stm_productos']->fetch(PDO::FETCH_ASSOC)) {
            //     //Si la conexión a la BD remota es correcta
                //UPDATE oc_product_copia oc set oc.quantity = 998 where oc.model = '001037064' or oc.ean = '001037064';
            
            //     //TODO comprobar el campo $cojer para hacer la consulta
            //     $query = "UPDATE $tabla set quantity = ? , $cojer  = ? WHERE model = ? or ean = ?";
            //     echo $query;
            // }
        } 
    } catch (\Throwable $th) {
        echo "No conectado a $ip</br>";
        
       
    }
    
}
$web = $_POST["web"];

$rows = 0;
/*Traer todos los registros de productos 
    model    (codigo_interno)
    ean      (codigo_barra)
    quantity (cantidad_existente)
    price    (precio_venta)
*/
/*
try {
    
    //? TRAER TODOS LOS PRODUCTOS PARA ACTUALIZAR
    $query = "SELECT codigo_interno, codigo_barra, cantidad_existente, precio_venta from producto ";
    
    $stm = $pdo->prepare($query);
    
    $stm->execute();
    
    $productos = $stm->fetchAll(PDO::FETCH_ASSOC);
    
    //? UPDATE ROPADECU
    //Recorrer productos para actualizar las webs
    foreach ($productos as $key => $value) {
        $ci  = $productos[$key]["codigo_interno"];
        $cb  = $productos[$key]["codigo_barra"];
        $can = $productos[$key]["cantidad_existente"];
        $pv  = $productos[$key]["precio_venta"];
    
        if($pdo_ropadecu){
            //Actualizar ropadecu
            $query = "UPDATE oc_product_copia set quantity = ? , price = ? WHERE model = ? and ean = ?";
                
            $stm = $pdo_ropadecu->prepare($query);
            
            $stm->execute([$can, $pv, $ci, $cb]);
            
            //$data = $stm->rowCount();
    
            // TODO Actualizar resto de webs
            
        }
    
    }
    
    //$rows += $stm->rowCount();
    
    //? UPDATE BABYLINE
    //Recorrer productos para actualizar las webs
    foreach ($productos as $key => $value) {
        $ci  = $productos[$key]["codigo_interno"];
        $cb  = $productos[$key]["codigo_barra"];
        $can = $productos[$key]["cantidad_existente"];
        $pv  = $productos[$key]["precio_venta"];
    
        if($pdo_ropadecu){
            //Actualizar ropadecu
            $query = "UPDATE oc_product_copia set quantity = ? , price = ? WHERE model = ? and ean = ?";
                
            $stm = $pdo_baby->prepare($query);
            
            $stm->execute([$can, $pv, $ci, $cb]);
            
            //$data = $stm->rowCount();
    
            // TODO Actualizar resto de webs
            
        }
    
    }
    
    //$rows += $stm->rowCount();
    
    echo "Bases de datos actualizadas!!";

} catch (\Throwable $th) {
    echo "Error al actualizar";
}
//TODO comprobar que todas las actualizaciones estan en 1 y si es asi borrar la tabla
*/
