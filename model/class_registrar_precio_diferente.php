<?php
    header("Content-Type: application/json");
    include_once("./db.php");
    $data = "";

    $id_producto = $_POST['id_producto'];
    $id_cliente =  $_POST['id_cliente'];
    $precioTienda = $_POST['precioTienda'];

    //TODO comprobar si existe id_producto e id_tienda y si hay, actualizar
    $query = "
     select * FROM producto

        INNER JOIN productos_tienda pt
	        on producto.id_producto = pt.id_producto

        INNER JOIN tiendas t 
	        on t.id_tienda = pt.id_tienda

        WHERE pt.id_producto = ? and pt.id_tienda = ?    
    ";

    $stm = $pdo->prepare($query);

    $stm->execute([$id_producto,$id_cliente]);

    $data = $stm->rowCount();
    
    if($data == 0){
        
        $query = "INSERT INTO productos_tienda (id_tienda, id_producto, precio_producto) 
            VALUES (?, ?, ?)";
    
        $stm = $pdo->prepare($query);
                
        $stm->execute([$id_cliente,$id_producto,$precioTienda]);
    
        $data = $stm->rowCount();
    }


    echo($data);

?>