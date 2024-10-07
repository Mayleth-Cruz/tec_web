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

// Definir la ruta para almacenar la imagen si se sube una
$uploadDir = 'img/';
$uploadFile = $uploadDir . basename($_FILES['imagen']['name']);
// Si se subió una imagen, moverla al directorio destino
if (!empty($imagen)) {
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $uploadFile)) {
        echo "Imagen subida con éxito.";
    } else {
        echo "ERROR al subir la imagen.";
    }
} else {
    // Si no se sube una imagen, mantener la imagen existente
    $stmt = $link->prepare("SELECT imagen FROM productos WHERE id = ?");
    $stmt->bind_param("i", $productId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $imagen = $row['imagen']; 
}
// Consulta de actualización
$sql = "UPDATE productos 
        SET nombre = ?, 
            marca = ?, 
            modelo = ?, 
            precio = ?, 
            detalles = ?, 
            unidades = ?, 
            imagen = ? 
        WHERE id = ?";
        
if ($stmt = $link->prepare($sql)) {
    $stmt->bind_param("sssdissi", $nombre, $marca, $modelo, $precio, $detalles, $unidades, $imagen, $productId);
    
    if ($stmt->execute()) {
        echo "Producto actualizado exitosamente.";
    } else {
        echo "ERROR: No se pudo ejecutar la consulta. " . mysqli_error($link);
    }
} else {
    echo "ERROR: No se pudo preparar la consulta. " . mysqli_error($link);
}

// Cerrar la conexión
mysqli_close($link);
?>