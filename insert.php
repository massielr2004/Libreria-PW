<?php
session_start();

$host = "localhost";
$dbname = "dblibreria";
$user = "root";
$password = "";

try {
    $conexion = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Problemas con la conexión: " . $e->getMessage());
}

$correo = $_REQUEST['mail'];
$nombre = $_REQUEST['nombre'];
$asunto = $_REQUEST['asunto'];
$comentario = $_REQUEST['comentario'];

try {
    $stmt = $conexion->prepare("INSERT INTO contactos(fecha, correo, nombre, asunto, comentario) 
                                VALUES (CURRENT_TIMESTAMP, :correo, :nombre, :asunto, :comentario)");

    $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':asunto', $asunto, PDO::PARAM_STR);
    $stmt->bindParam(':comentario', $comentario, PDO::PARAM_STR);

    $stmt->execute();
} catch (PDOException $e) {
    die("Problemas en el insert: " . $e->getMessage());
} finally {
    $conexion = null;
}

// Redirige a index.php con los datos como parámetros en la URL
header("Location: index.php?correo=$correo&nombre=$nombre&asunto=$asunto&comentario=$comentario");
exit();
?>
