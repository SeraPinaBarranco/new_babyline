<?php 
/**Actualiza la web especifica ejecutando un procedimiento almacenado */

//header("Content-Type: application/json");
include_once("./db.php");


// switch ($_POST[0]) {
//     case 'value':
//         # code...
//         break;
    
//     default:
//         # code...
//         break;
// }
print_r($_POST);
$web = "";

if (!empty($_POST['web'])) {
    
    $post = $_POST['web'];

    if (str_contains($post, 'original-baby')) {
        
        // TODO Actualizar la web
        //TODO 1º crear la consulta para llamar a todos los cambios que la web sea 0
        //TODO 2° Recorrer la consulta para actualizar la web

        $web = "original-baby";
        if($pdo->query("CALL update_cambios_babyline (" .$_POST['model']  .", " .$_POST['ean'] .")")){
            
            echo "Babyline actualizado" ;
        }else{
            echo "Falló la creación del procedimiento almacenado: (" . $pdo->errorInfo() . ") " . $pdo->errorCode();
        }
        
    }elseif (str_contains($post, 'dulce-paseo')) {
        $web = 'dulce-paseo';
        $web = "original-baby";
        if($pdo->query("CALL update_cambios_ropadecu (" .$_POST['model']  .", " .$_POST['ean'] .")")){
            
            echo "Ropadecu actualizado" ;
        }else{
            echo "Falló la creación del procedimiento almacenado: (" . $pdo->errorInfo() . ") " . $pdo->errorCode();
        }
    }elseif(str_contains($post, 'happy-way')){
        $web = 'happy-way';
        
        if($pdo->query("CALL update_cambios_happy (" .$_POST['model']  .", " .$_POST['ean'] .")")){
            
            echo "Happy way actualizado" ;
        }else{
            echo "Falló la creación del procedimiento almacenado: (" . $pdo->errorInfo() . ") " . $pdo->errorCode();
        }
        echo $post;
    }
    
}

//TODO comprobar que todas las actualizaciones estan en 1 y si es asi borrar la tabla

?>