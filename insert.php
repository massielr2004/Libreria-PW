<?php
session_start();
$conexion = mysqli_connect("localhost", "root", "", "dblibreria") or die("Problemas con la conexión");

$correo = $_REQUEST['mail'];
$nombre = $_REQUEST['nombre'];
$asunto = $_REQUEST['asunto'];
$comentario = $_REQUEST['comentario'];

mysqli_query($conexion, "insert into contactos(fecha, correo, nombre, asunto, comentario) values 
                     (CURRENT_TIMESTAMP, '$correo', '$nombre', '$asunto', '$comentario');                                 
                     ") or die("Problemas en el select" . mysqli_error($conexion));

mysqli_close($conexion);

// Redirige a index.php con los datos como parámetros en la URL
header("Location: index.php?correo=$correo&nombre=$nombre&asunto=$asunto&comentario=$comentario");
exit();
?>