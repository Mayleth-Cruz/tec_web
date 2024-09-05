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

$a = "PHP5";
var_dump($a); 

$z[] = &$a; 
print_r($z); 

$b = "5a version de PHP";
var_dump($b); 

$c = $b * 10; 
var_dump($c); 

$a .= $b; 
var_dump($a); 
print_r($z); 

$b *= $c; 
var_dump($b); 

$z[0] = "MySQL"; 
print_r($z); 

$a = "PHP5";
$z[] = &$a;
$b = "5a version de PHP";
$c = $b * 10;
$a .= $b;
$b *= $c;
$z[0] = "MySQL";


echo "Valores usando \$GLOBALS:\n";
echo '<br> ';
echo "\$GLOBALS['a']: ";
var_dump($GLOBALS['a']); 
echo '<br> ';
echo "\$GLOBALS['z']: ";
print_r($GLOBALS['z']); 
echo '<br> ';
echo "\$GLOBALS['b']: ";
var_dump($GLOBALS['b']); 
echo '<br> ';
echo "\$GLOBALS['c']: ";
var_dump($GLOBALS['c']); 
echo '<br> ';

echo "\$GLOBALS['z'][0]: ";
var_dump($GLOBALS['z'][0]); 

$a = "7 personas";
$b = (integer) $a;
$a = "9E3";
$c = (double) $a;

$d = 0; 
$e = 1; 
$f = "";

echo "Valores booleanos usando var_dump():\n";
echo "\$a: ";
var_dump((bool) $a); 
echo '<br> ';
echo "\$b: ";
var_dump((bool) $b); 
echo '<br> ';
echo "\$c: ";
var_dump((bool) $c); 
echo '<br> ';
echo "\$d: ";
var_dump((bool) $d); 
echo '<br> ';
echo "\$e: ";
var_dump((bool) $e); 
echo '<br> ';
echo "\$f: ";
var_dump((bool) $f); 
echo '<br> ';

$a = "0";
$b = "TRUE";
$c = FALSE;
$d = ($a OR $b);
$e = ($a AND $c);
$f = ($a XOR $b);


echo "Valores usando var_export():\n";
echo "\$d: " . var_export($d, true) . "\n"; 
echo "\$e: " . var_export($e, true) . "\n"; 
echo "\$f: " . var_export($f, true) . "\n"; 


echo "Valores usando print_r():\n";
echo "\$d: ";
print_r($d); 
echo '<br> ';
echo "\$e: ";
print_r($e); 
echo '<br> ';
echo "\$f: ";
print_r($f); 
echo '<br> ';

echo "Versión de PHP: " . PHP_VERSION . "\n"; 

if (isset($_SERVER['SERVER_SOFTWARE'])) {
    echo "Versión de Apache: " . $_SERVER['SERVER_SOFTWARE'] . "\n";
} else {
    echo "No se puede determinar la versión de Apache.\n";
}

echo "Sistema operativo del servidor: " . PHP_OS . "\n";

if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
    echo "Idioma del navegador: " . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . "\n";
} else {
    echo "No se pudo determinar el idioma.\n";
}

?>
