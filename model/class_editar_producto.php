<?php

header("Content-Type: application/json");
include_once("./db.php");
include_once("./class_producto.php");


$producto = new producto($pdo);

$datos = explode(",",$_POST["datos"]);

$res = $producto->actualiar($datos);


if($res == 1){
    //include_once "./db.php";
    $query = "SELECT * FROM basedatos";
    $stm =$pdo->query($query);
    $stm->execute();
    
    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($data as $key => $value) {
            
        //$id_base = $datos[$key]['id_base'];
        $ip      = $data[$key]['ip'];
        $db      = $data[$key]['db'];
        $usuario = $data[$key]['usuario'];
        $clave   = $data[$key]['clave'];
        $tabla   = $data[$key]['tabla'];
        $coger   = $data[$key]['cojer'];
    
        
        //$DNS = "mysql:host=$ip;dbname=$db";
        //$pdo_bd = new PDO($DNS,$usuario, $clave);
    
        grabarRemota($ip, $db, $usuario, $clave, $tabla, $coger);
        
    }
    
}

function grabarRemota($ip, $db, $usuario, $clave, $tabla, $coger) {
    


    //CONEXION A LA BASE DE DATOS REMOTA
    try {
        $DNS = "mysql:host=$ip;dbname=$db";
        $bd = new PDO($DNS,$usuario, $clave);
        
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $datos = explode(",",$_POST["datos"]);

        // Aquí puedes realizar las operaciones adicionales que necesites
        //ACTUALIZAR EN LA BASE DE DATOS REMOTA
        $query = "UPDATE" . $tabla . "_copia set  quantity = ? , " . $coger .  " = ? WHERE model = ? ";
        $stm = $bd->prepare($query);          
            
        $stm->execute([$datos[5], $datos[7], $datos[2]]);
    
        if($stm->rowCount() == 0){
            $query = "UPDATE" . $tabla . "_copia set  quantity = ? , " . $coger .  " = ? WHERE ean = ? ";
            $stm = $bd->prepare($query);          
                
            $stm->execute([$datos[5], $datos[7], $datos[1]]);
    
        }
        // Cerrar la conexión
        $bd = null;
    } catch (PDOException $e) {
        // Capturar cualquier error de conexión
        $bd = null;
        //echo('Error de conexión: ' . $e->getMessage());
    }finally{
        $bd = null;
    }




}

// print_r($datos);
echo $res;



?>