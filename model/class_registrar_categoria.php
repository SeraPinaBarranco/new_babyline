<?php 
    header("Content-Type: application/json");
    include_once("./db.php");

    
    $data = 0;

    $id_categoria = $_POST['id_categoria'];
    if(!empty($_POST['categoria'])){
        $nombre =strtoupper(htmlspecialchars($_POST['categoria']));
    }    
    $tag=  $_POST['tag'];


    //$id_cliente = $_POST['categoria'];
    //$tag=  $_POST['tag'];

    if($tag == 'actualizar'){
        
        $query = "UPDATE categoria SET nombre_categoria = ? WHERE id = ?";
        $stm = $pdo->prepare($query);
        $stm->execute([$nombre, $id_categoria]);
        $data = $stm->rowCount();

    }elseif ($tag == 'eliminar') {
        $query = "DELETE FROM categoria WHERE id = ?";
        $stm = $pdo->prepare($query);
        $stm->execute([$id_categoria]);
        $data = $stm->rowCount();
    }else{

        if(!empty($_POST['categoria'])){
            $query = "INSERT INTO categoria (nombre_categoria) VALUES (?)";
    
            $stm = $pdo->prepare($query);
        
            $stm->execute([$nombre]);
        
            $data = $stm->rowCount();
            
        }else {
            $data = -1;
        }
    }
    


    echo $data;
?>