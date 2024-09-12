

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $edad = $_POST['edad'];
    $sexo = $_POST['sexo'];

    if ($sexo === 'femenino' && $edad >= 18 && $edad <= 35) {
        echo "<p>Bienvenida, usted está en el rango de edad permitido.</p>";
    } else {
        echo "<p>Lo siento, usted no cumple con los requisitos.</p>";
    }
} else {
    echo "<p>Por favor, use el formulario para enviar los datos.</p>";
}
?>
