<?php 
/**Actualiza la web especifica ejecutando un procedimiento almacenado */

header("Content-Type: application/json");
include_once("./db.php");


// switch ($_POST[0]) {
//     case 'value':
//         # code...
//         break;
    
//     default:
//         # code...
//         break;
// }

$web = "";

if (!empty($_POST['web'])) {
    
    $post = $_POST['web'];

    if (str_contains($post, 'original-baby')) {
        
        // TODO Actualizar la web

        $web = "original-baby";
        if($pdo->query("CALL update_cambios_original ('111', '1112')")){
            echo "Babyline actualizado" ;
        }else{
            echo "Falló la creación del procedimiento almacenado: (" . $pdo->errorInfo() . ") " . $pdo->errorCode();
        }
        
    }elseif (str_contains($post, 'dulce-paseo')) {
        $web = 'dulce-paseo';
        echo $post;
    }elseif(str_contains($post, 'happy-way')){
        $web = 'happy-way';
        echo $post;
    }
    
}



?>