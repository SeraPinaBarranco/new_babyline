<?php
include_once "./db.php";


try {
    

    // Establecer el modo de error de PDO a excepciones
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consultar todos los registros de la tabla basedatos
    $stmt = $pdo->query('SELECT * FROM basedatos');

    // Obtener los resultados como un array asociativo
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Devolver los resultados en formato JSON
    echo json_encode($results);
} catch (PDOException $e) {
    // En caso de error, imprimir el mensaje de error
    echo 'Error: ' . $e->getMessage();
}
?>