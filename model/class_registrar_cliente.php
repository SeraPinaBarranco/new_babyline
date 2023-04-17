<?php 
    header("Content-Type: application/json");
    include_once("./db.php");
    $data = "";

    //var_dump($_POST);
    
    if(!empty($_POST['cliente'])){
        
        $cliente = htmlspecialchars($_POST['cliente']);
        
        $query = "INSERT INTO tiendas (nombre) VALUES (?)";

        $stm = $pdo->prepare($query);
    
        $stm->execute([$cliente]);
    
        $data = $stm->rowCount();
        
    }else {
        $data = -1;
    }

    echo $data;
?>