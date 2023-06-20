<?php 

//TRAER VALORES DE LA TABLA BASEDATOS PARA POSTERIORMENTE RECORRERLOS Y ACTUALIZAR LAS WEBS


//RECORRER LOS RESULTADOS



function getTablaBaseDatos(){
    include_once "./db.php";
    $query = "SELECT * FROM basedatos";
    $stm =$pdo->query($query);
    $stm->execute();

    
    return $data = $stm->fetchAll(PDO::FETCH_ASSOC);
}
//GUARDAR LOS RESULTADOS RECIBIDOS
function actualizar_webs_con_Productos($cantidad, $precio_venta, $model, $ean): void{
    include_once "./comprobar_ean_model.php";

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

        $DNS = "mysql:host=$ip;dbname=$db";
        $pdo_bd = new PDO($DNS,$usuario, $clave);

        if (getModel($model) > 0) {
            //$query = "UPDATE $tabla set  quantity = ? , price = ? WHERE model = ?";
            $query = "UPDATE oc_product_copia set  quantity = ? , price = ? WHERE model = ? ";
            $stm = $pdo_bd->prepare($query);          
                
            $stm->execute([$cantidad, $precio_venta, $model]);

        } elseif (getEAN($ean) > 0) {
            //$query = "UPDATE $tabla set  quantity = ? , price = ? WHERE ean = ?";
            $query = "UPDATE oc_product_copia set  quantity = ? , price = ? WHERE ean = ? ";
            $stm = $pdo_bd->prepare($query);          
                
            $stm->execute([$cantidad, $precio_venta, $model]);
        }
        
        
   
    }

    
}



?>