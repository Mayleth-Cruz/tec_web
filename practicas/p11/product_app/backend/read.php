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