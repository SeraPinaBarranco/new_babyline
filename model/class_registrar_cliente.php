<?php 
    header("Content-Type: application/json");
    include_once("./db.php");
    $data = "";

    $id_cliente = $_POST['id_cliente'];
    if(!empty($_POST['cliente'])){        
        $nombre =strtoupper(htmlspecialchars($_POST['cliente']));
    } 
    $tag=  $_POST['tag'];

    if($tag == 'actualizar'){
        
        $query = "UPDATE tiendas SET nombre = ? WHERE id_tienda = ?";
        $stm = $pdo->prepare($query);
        $stm->execute([$nombre, $id_cliente]);
        $data = $stm->rowCount();

    }elseif ($tag == 'eliminar') {
        $query = "DELETE FROM tiendas WHERE id_tienda = ?";
        $stm = $pdo->prepare($query);
        $stm->execute([$id_cliente]);
        $data = $stm->rowCount();
    }else{

        if(!empty($_POST['cliente'])){
            $query = "INSERT INTO tiendas (nombre) VALUES (?)";
    
            $stm = $pdo->prepare($query);
        
            $stm->execute([$nombre]);
        
            $data = $stm->rowCount();
            
        }else {
            $data = -1;
        }
    }
    


    echo $data;
?>