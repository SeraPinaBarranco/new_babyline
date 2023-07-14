<?php

include_once("./db.php");
//include_once("./ropadecu.php");


//TODO traer los datos de la tabla basedatos    
$query = "SELECT * FROM basedatos";
$stm = $pdo->query($query);


$i = 0;
while ($data = $stm->fetch(PDO::FETCH_ASSOC)) {
    //print_r($data);
    extract($data);

    //echo "$id_base - $ip - $db - $usuario - $clave - $pais - $cojer - $tabla  </br>" ;
    //TODO Llamar a la funcion que guarda en base de datos remota
    conexion_bd_remota($id_base, $ip, $db, $usuario, $clave, $pais, $cojer, $tabla, $pdo);
}


function conexion_bd_remota($id_base, $ip, $db, $usuario, $clave, $pais, $cojer, $tabla, $my_pdo)
{
    // 1 Crear conexion a base de datos remota
    $SERVER =  $ip;
    $USER   =  $usuario;    
    $PASS   =  $clave;
    $BBDD   =  $db;

    $DNS = "mysql:host=$SERVER;dbname=$BBDD";

    try {
        $pdo = new PDO($DNS, $USER, $PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Conexión exitosa a la base de datos.";

        $estado = $pdo->getAttribute(PDO::ATTR_CONNECTION_STATUS);
        //SI LA CONEXIÓN ES EXITOSA RECORRER LA TABLA DE PRODUCTOS PARA ACTUALIZAR LAS WEB
        if ($estado === "Connected") {
            echo "La conexión está activa.";
        } else {
            echo "La conexión se perdió.";
        }
        echo $estado;

    } catch (PDOException  $th) {
        die("Error al conectar: " . $th->getMessage());
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
