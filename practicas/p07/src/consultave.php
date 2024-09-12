<?php
// Arreglo asociativo con los vehículos registrados
$vehiculos = [
    "UBN6338" => [
        "Auto" => ["marca" => "HONDA", "modelo" => 2020, "tipo" => "camioneta"],
        "Propietario" => ["nombre" => "Alfonzo Esparza", "ciudad" => "Puebla, Pue.", "direccion" => "C.U., Jardines de San Manuel"]
    ],
    "UBN6339" => [
        "Auto" => ["marca" => "MAZDA", "modelo" => 2019, "tipo" => "sedan"],
        "Propietario" => ["nombre" => "Ma. del Consuelo Molina", "ciudad" => "Puebla, Pue.", "direccion" => "97 oriente"]
    ],
    // Añadir más vehículos aquí...
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Consulta por matrícula
    if (isset($_POST['matricula']) && !empty($_POST['matricula'])) {
        $matricula = strtoupper($_POST['matricula']);
        if (isset($vehiculos[$matricula])) {
            echo "<h2>Información del Vehículo con matrícula $matricula:</h2>";
            print_r($vehiculos[$matricula]);
        } else {
            echo "<p>No se encontró el vehículo con matrícula $matricula.</p>";
        }
    }

    // Consulta de todos los vehículos
    if (isset($_POST['todos'])) {
        echo "<h2>Todos los vehículos registrados:</h2>";
        print_r($vehiculos);
    }
} else {
    echo "<p>Por favor, use el formulario para consultar los datos.</p>";
}
?>
