<?php 
    header("Content-Type: application/json");
    include_once("./db.php");
    $data = "";

    //var_dump($_POST);
    
    if(!empty($_POST['id_producto']) || !empty($_POST['cantidad']) ){
        $id = intval($_POST['id_producto']);
        $cantidad = intval($_POST['cantidad']);

        $query = "UPDATE producto set cantidad_existente = cantidad_existente + ? WHERE id_producto= ?  ";

        $stm = $pdo->prepare($query);
    
        $stm->execute([$cantidad, $id]);
    
        $data = $stm->rowCount();
    }else {
        $data = -1;
    }

    echo $data;
?>