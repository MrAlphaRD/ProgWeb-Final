<?php
// Parámetros de conexión a la base de datos
$servername = "localhost"; 
$username = "root";
$password = "";
$dbname = "libreria";

try {
    // Crear una instancia de PDO para la conexión a la base de datos
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Establecer el modo de error a excepciones
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>