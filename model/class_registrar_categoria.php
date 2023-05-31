<?php 
    header("Content-Type: application/json");
    include_once("./db.php");

    
    $data = 0;

    //$id_cliente = $_POST['categoria'];
    $nombre =strtoupper(htmlspecialchars($_POST['categoria']));
    //$tag=  $_POST['tag'];

    // if($tag == 'actualizar'){
        
    //     $query = "UPDATE tiendas SET nombre = ? WHERE id_tienda = ?";
    //     $stm = $pdo->prepare($query);
    //     $stm->execute([$nombre, $id_cliente]);
    //     $data = $stm->rowCount();

    // }elseif ($tag == 'eliminar') {
    //     $query = "DELETE FROM tiendas WHERE id_tienda = ?";
    //     $stm = $pdo->prepare($query);
    //     $stm->execute([$id_cliente]);
    //     $data = $stm->rowCount();
    // }else{

        if(!empty($_POST['categoria'])){
            $query = "INSERT INTO categoria (nombre_categoria) VALUES (?)";
    
            $stm = $pdo->prepare($query);
        
            $stm->execute([$nombre]);
        
            $data = $stm->rowCount();
            
        }else {
            $data = -1;
        }
    //}
    


    echo $data;
?>