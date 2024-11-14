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
    // Comprobar si ya existe un producto con el mismo nombre
    $query = "SELECT * FROM productos WHERE nombre = '$nombre'";
    $result = $conexion->query($query);
    if ($result->num_rows > 0) {
        echo 'Error, el producto ya existe.';
    } else {
        // SE REALIZA LA QUERY DE INSERCIÓN
        $insertQuery = "INSERT INTO productos (nombre, marca, modelo, precio, unidades, detalles, imagen) VALUES ('$nombre', '$marca', '$modelo', $precio, $unidades, '$detalles', '$imagen')";

        if ($conexion->query($insertQuery)) {
            echo 'Producto agregado exitosamente.';
        } else {
            echo 'Error al agregar el producto: ' . mysqli_error($conexion);
        }
    }

    $result->free();
}

$conexion->close();
?>