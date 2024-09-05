<?php
$validVariables = [
    '$_myvar' => 'Válida. Las variables en PHP pueden comenzar con un guion bajo.',
    '$_7var' => 'No válida. Las variables no pueden comenzar con un número.',
    'myvar' => 'No válida. Las variables en PHP deben comenzar con el signo de dólar ($).',
    '$myvar' => 'Válida. Es una variable válida y común en PHP.',
    '$var7' => 'Válida. Las variables pueden contener números después del primer carácter.',
    '$_element1' => 'Válida. Es una variable válida, ya que comienza con un guion bajo.',
    '$house*5' => 'No válida. Los nombres de las variables no pueden contener caracteres especiales como el asterisco (*).'
];

echo "<h2>Variables válidas y no válidas:</h2>";
foreach ($validVariables as $variable => $explanation) {
    echo "<p><strong>$variable:</strong> $explanation</p>";
}

$a = "ManejadorSQL";
$b = 'MySQL';
$c = &$a;

echo "<h2>Valores de las variables:</h2>";
echo "<p><strong>\$a:</strong> " . $a . "</p>";
echo "<p><strong>\$b:</strong> " . $b . "</p>";
echo "<p><strong>\$c:</strong> " . $c . "</p>";

$a = "NuevoValorSQL";
echo "<p><strong>Después de cambiar el valor de \$a:</strong></p>";
echo "<p><strong>\$a:</strong> " . $a . "</p>";
echo "<p><strong>\$c:</strong> " . $c . "</p>";

$a = "PHP server";
$b = &$a;

$a = "Nuevo valor";
echo "<p><strong>Después de cambiar el valor de \$a:</strong></p>";
echo "<p><strong>\$a:</strong> " . $a . "</p>";
echo "<p><strong>\$b:</strong> " . $b . "</p>";
?>
