<?php 

include_once("./db.php");
include_once("./ropadecu.php");


$web = $_POST["web"];


/*Traer todos los registros de productos 
    model    (codigo_interno)
    ean      (codigo_barra)
    quantity (cantidad_existente)
    price    (precio_venta)
*/
$query = "SELECT codigo_interno, codigo_barra, cantidad_existente, precio_venta from producto ";

$stm = $pdo->prepare($query);

$stm->execute();

$productos = $stm->fetchAll(PDO::FETCH_ASSOC);


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

echo $stm->rowCount();

//TODO comprobar que todas las actualizaciones estan en 1 y si es asi borrar la tabla

?>