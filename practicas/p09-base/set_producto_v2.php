<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";  
$password = "";     
$dbname = "marketzone"; 
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}