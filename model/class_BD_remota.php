<?php

include_once "./db.php";
// Obtener los valores enviados desde el formulario
$ip = $_POST['ip'];
$db = $_POST['db'];
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
$pais = $_POST['pais'];
$cojer = $_POST['cojer'];
$tabla = $_POST['tabla'];

// Conectar a la base de datos
// $dsn = "mysql:host=localhost;dbname=nombre_basedatos;charset=utf8mb4";
// $dbUsuario = "nombre_usuario";
// $dbClave = "contraseña_usuario";

try {
  //$pdo = new PDO($dsn, $dbUsuario, $dbClave);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Preparar la consulta SQL
  $sql = "INSERT INTO basedatos (ip, db, usuario, clave, pais, cojer, tabla) VALUES (?, ?, ?, ?, ?, ?, ?)";
  $stmt = $pdo->prepare($sql);

  // Ejecutar la consulta con los valores del formulario
  $stmt->execute([$ip, $db, $usuario, $clave, $pais, $cojer, $tabla]);

  echo "Los cambios han sido guardados exitosamente.";
} catch (PDOException $e) {
  echo "Error al guardar los cambios: " ;
}

?>