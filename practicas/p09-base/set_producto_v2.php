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

// Validar que el nombre, modelo y marca no existan en la base de datos
$sql_check = "SELECT * FROM productos WHERE nombre = ? AND marca = ? AND modelo = ?";
$stmt = $conn->prepare($sql_check);
$stmt->bind_param("sss", $nombre, $marca, $modelo);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    die("<h1>Error</h1><p>El producto ya existe en la base de datos.</p>");
}
//Insertar los datos en la base 
$sql_insert = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen) 
               VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql_insert);
$stmt->bind_param("sssdsis", $nombre, $marca, $modelo, $precio, $detalles, $unidades, $imagen);

if ($stmt->execute()) {
    // Mover la imagen subida a la carpeta 'img'
    $target_dir = "img/";
    $target_file = $target_dir . basename($imagen);
    move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);
    // Mostrar los datos insertados
    echo "<h1>Producto registrado con éxito</h1>";
    echo "<p><strong>Nombre:</strong> $nombre</p>";
    echo "<p><strong>Marca:</strong> $marca</p>";
    echo "<p><strong>Modelo:</strong> $modelo</p>";
    echo "<p><strong>Precio:</strong> $precio</p>";
    echo "<p><strong>Detalles:</strong> $detalles</p>";
    echo "<p><strong>Unidades:</strong> $unidades</p>";
    echo "<p><strong>Imagen:</strong> <img src='img/$imagen' alt='$nombre' width='100'></p>";
} else {
    echo "<h1>Error</h1><p>No se pudo registrar el producto. Inténtelo de nuevo.</p>";
}

// Cerrar conexión
$conn->close();
?>