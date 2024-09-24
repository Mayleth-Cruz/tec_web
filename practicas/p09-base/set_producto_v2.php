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
// Obtener datos del formulario
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$precio = $_POST['precio'];
$detalles = $_POST['detalles'];
$unidades = $_POST['unidades'];
$imagen = $_FILES['imagen']['name'];

// Validar que los campos no estén vacíos
if (empty($nombre) || empty($marca) || empty($modelo) || empty($precio) || empty($unidades)) {
    die("<h1>Error</h1><p>Todos los campos son obligatorios.</p>");
}
if ($stmt->execute()) {
    // Mover la imagen subida a la carpeta 'img'
    $target_dir = "img/";
    $target_file = $target_dir . basename($imagen);
    move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);