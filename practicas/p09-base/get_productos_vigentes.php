<?php
header("Content-Type: application/xhtml+xml; charset=utf-8");

if (isset($_GET['tope'])) {
    $tope = $_GET['tope'];
} else {
    die('<?xml version="1.0" encoding="UTF-8"?><error>Parámetro "tope" no detectado...</error>');
}

if (!empty($tope) && is_numeric($tope)) {
    /** SE CREA EL OBJETO DE CONEXION */
    @$link = new mysqli('localhost', 'root', '', 'marketzone');
    /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */

    /** comprobar la conexión */
    if ($link->connect_errno) {
        die('<?xml version="1.0" encoding="UTF-8"?><error>Falló la conexión: ' . htmlspecialchars($link->connect_error) . '</error>');
    }

    /** Establecer el charset de la conexión */
    $link->set_charset("utf8");
    
    // Consulta para seleccionar productos no eliminados y que tengan unidades <= $tope
    if ($stmt = $link->prepare("SELECT * FROM productos WHERE unidades <= ? AND eliminado = 0")) {
        $stmt->bind_param("i", $tope);
        $stmt->execute();
        $result = $stmt->get_result();

        /** Generar documento XHTML */
        echo '<?xml version="1.0" encoding="UTF-8"?>';
        echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">';
        echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">';
        echo '<head>';
        echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
        echo '<title>Productos</title>';
        echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />';
        echo '</head>';
        echo '<body>';
        echo '<div class="container">';
        echo '<h3 class="my-4">Productos con Unidades &lt;= ' . htmlspecialchars($tope) . '</h3>';
        
        if ($result->num_rows > 0) {
            echo '<table class="table table-striped">';
            echo '<thead class="thead-dark">';
            echo '<tr><th scope="col">#</th><th scope="col">Nombre</th><th scope="col">Marca</th><th scope="col">Modelo</th><th scope="col">Precio</th><th scope="col">Unidades</th><th scope="col">Detalles</th><th scope="col">Imagen</th></tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($row = $result->fetch_assoc()) {
                $imgSrc = htmlspecialchars($row['imagen']);
                echo '<tr>';
                echo '<th scope="row">' . htmlspecialchars($row['Id']) . '</th>';
                echo '<td>' . htmlspecialchars($row['nombre']) . '</td>';
                echo '<td>' . htmlspecialchars($row['marca']) . '</td>';
                echo '<td>' . htmlspecialchars($row['modelo']) . '</td>';
                echo '<td>' . htmlspecialchars($row['precio']) . '</td>';
                echo '<td>' . htmlspecialchars($row['unidades']) . '</td>';
                echo '<td>' . htmlspecialchars($row['detalles']) . '</td>';
                echo '<td><img src="' . $imgSrc . '" alt="Imagen de producto" style="max-width: 150px; max-height: 150px;" /></td>';
                echo '</tr>';
            }
            echo '</tbody></table>';
        } else {
            echo '<div class="alert alert-warning" role="alert">No se encontraron productos no eliminados con unidades menores o iguales a ' . htmlspecialchars($tope) . '.</div>';
        }
        
        echo '</div>'; // container
        echo '</body></html>';

        /** liberar recursos */
        $stmt->close();
    }

    $link->close();
} else {
    echo '<?xml version="1.0" encoding="UTF-8"?><error>El parámetro "tope" debe ser un número válido.</error>';
}
?>
