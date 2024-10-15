<?php
    include_once __DIR__.'/database.php';

    // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $data = array();
    // SE VERIFICA HABER RECIBIDO EL ID O EL TÉRMINO DE BÚSQUEDA
    $search = isset($_POST['search']) ? mysqli_real_escape_string($conexion, $_POST['search']) : null;

if ($search) {
    // Verificamos si la búsqueda es un número
    if (is_numeric($search)) {
        // Buscamos por ID
        $query = "SELECT * FROM productos WHERE id = {$search}";
    } else {
        // Buscamos por nombre, marca o detalles
        $query = "SELECT * FROM productos WHERE nombre LIKE '%{$search}%' OR marca LIKE '%{$search}%' OR detalles LIKE '%{$search}%'";
    }
     // SE REALIZA LA QUERY DE BÚSQUEDA
     if ($result = $conexion->query($query)) {
        // SE OBTIENEN LOS RESULTADOS
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
            $data[] = array_map('utf8_encode', $row);
        }
        $result->free();
    } else {
        die('Query Error: ' . mysqli_error($conexion));
    }
}