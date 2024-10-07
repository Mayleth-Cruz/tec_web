<?php
// Datos de conexión a la base de datos
$host = "localhost";
$user = "root";
$password = "";
$dbname = "marketzone";  // Nombre de la base de datos

// Crear la conexión
$link = mysqli_connect($host, $user, $password, $dbname);
// Chequea la conexión
if(!$link) {
    die("ERROR: No pudo conectarse a la base de datos. " . mysqli_connect_error());
}
// Recoger los datos del formulario
$nombre = $_POST['nombre'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$precio = $_POST['precio'];
$detalles = $_POST['detalles'];
$unidades = $_POST['unidades'];
$imagen = $_FILES['imagen']['name'];  // Nombre de la imagen
$productId = $_POST['productId'];  // Para saber si es una actualización
