<?php
include_once __DIR__.'/database.php';

// SE VERIFICA QUE HAYA RECIBIDO UN JSON
$data = json_decode(file_get_contents("php://input"), true);
if ($data) {
    // Validar los datos necesarios
    $nombre = mysqli_real_escape_string($conexion, $data['nombre']);
    $marca = mysqli_real_escape_string($conexion, $data['marca']);
    $modelo = mysqli_real_escape_string($conexion, $data['modelo']);
    $precio = (float)$data['precio'];
    $unidades = (int)$data['unidades'];
    $detalles = mysqli_real_escape_string($conexion, $data['detalles']);
    $imagen = mysqli_real_escape_string($conexion, $data['imagen']);
