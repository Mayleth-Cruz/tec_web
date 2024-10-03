<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
    "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
    <title>PHP con XHTML</title>
</head>
<body>
    <?php
    echo '$_myvar: Válida. Las variables en PHP pueden comenzar con un guion bajo.' . "\n";
    echo '<br />';
    echo '$_7var: No válida. Las variables no pueden comenzar con un número.' . "\n";
    echo '<br />';
    echo 'myvar: No válida. Las variables en PHP deben comenzar con el signo de dólar ($).' . "\n";
    echo '<br />';
    echo '$myvar: Válida. Es una variable válida y común en PHP.' . "\n";
    echo '<br />';
    echo '$var7: Válida. Las variables pueden contener números después del primer carácter.' . "\n";
    echo '<br />';
    echo '$_element1: Válida. Es una variable válida, ya que comienza con un guion bajo.' . "\n";
    echo '<br />';
    echo '$house*5: No válida. Los nombres de las variables no pueden contener caracteres especiales como el asterisco (*).' . "\n";
    echo '<br />';

    $a = "ManejadorSQL";
    $b = 'MySQL';
    $c = &$a;

    echo "<h2>Valores de las variables:</h2>";
    echo "<p>\$a:".$a."</p>";
    echo "<p>\$b:".$b."</p>";
    echo "<p>\$c:".$c."</p>";

    $a = "NuevoValorSQL";
    echo "<p>Después de cambiar el valor de \$a:</p>";
    echo "<p>\$a:".$a."</p>";
    echo "<p>\$c:".$c."</p>";

    $a = "PHP server";
    $b = &$a;

    $a = "Nuevo valor";
    echo "<p>Despues de cambiar el valor de \$a:</p>";
    echo "<p>\$a:".$a."</p>";
    echo "<p>\$b:".$b."</p>";
    echo '<br />';

    $a = "PHP5";
    $z[] = &$a;
    $b = "5a version de PHP";
    $c = (int)$b * 10;
    $a .= $b;
    $b *= $c;
    $z[0] = "MySQL";

    $a = "PHP5";
    var_dump($a); 
    echo '<br />';
    $z[] = &$a; 
    print_r($z); 
    echo '<br />';
    $b = "5a version de PHP";
    var_dump($b); 
    echo '<br />';
    $c = (int)$b * 10; 
    var_dump($c); 
    echo '<br />';
    $a .= $b; 
    var_dump($a); 
    print_r($z); 
    echo '<br />';
    $b *= $c; 
    var_dump($b); 
    echo '<br />';
    $z[0] = "MySQL"; 
    print_r($z); 
    echo '<br />';

    echo "Valores usando \$GLOBALS:\n";
    echo '<br />';
    echo "\$GLOBALS['a']: ";
    var_dump($GLOBALS['a']); 
    echo '<br />';
    echo "\$GLOBALS['z']: ";
    print_r($GLOBALS['z']); 
    echo '<br />';
    echo "\$GLOBALS['b']: ";
    var_dump($GLOBALS['b']); 
    echo '<br />';
    echo "\$GLOBALS['c']: ";
    var_dump($GLOBALS['c']); 
    echo '<br />';

    echo "\$GLOBALS['z'][0]: ";
    var_dump($GLOBALS['z'][0]); 

    $a = "7 personas";
    $b = (integer) $a;
    $a = "9E3";
    $c = (double) $a;

    $d = 0; 
    $e = 1; 
    $f = "";
    echo '<br />';
    echo "Valores booleanos usando var_dump():\n";
    echo "\$a: ";
    var_dump((bool) $a); 
    echo '<br />';
    echo "\$b: ";
    var_dump((bool) $b); 
    echo '<br />';
    echo "\$c: ";
    var_dump((bool) $c); 
    echo '<br />';
    echo "\$d: ";
    var_dump((bool) $d); 
    echo '<br />';
    echo "\$e: ";
    var_dump((bool) $e); 
    echo '<br />';
    echo "\$f: ";
    var_dump((bool) $f); 
    echo '<br />';

    $a = "0";
    $b = "TRUE";
    $c = FALSE;
    $d = ($a OR $b);
    $e = ($a AND $c);
    $f = ($a XOR $b);

    echo "Valores transformados con var_export():\n";
    echo '<br />';
    echo "\$c: " . var_export($c, true) . "\n"; 
    echo '<br />';
    echo "\$e: " . var_export($e, true) . "\n";
    echo '<br />';

    echo "Versión de PHP: " . PHP_VERSION . "\n"; 
    echo '<br />';
    if (isset($_SERVER['SERVER_SOFTWARE'])) {
        echo "Versión de Apache: " . $_SERVER['SERVER_SOFTWARE'] . "\n";
        echo '<br />';
    } else {
        echo "No se puede determinar la versión de Apache.\n";
    }

    echo "Sistema operativo del servidor: " . PHP_OS . "\n";
    echo '<br />';
    if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
        echo "Idioma del navegador: " . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . "\n";
        echo '<br />';
    } else {
        echo "No se pudo determinar el idioma.\n";
    }
    ?>
</body>
</html>
<p>
    <a href="https://validator.w3.org/markup/check?uri=referer"><img
      src="https://www.w3.org/Icons/valid-xhtml11" alt="Valid XHTML 1.1" height="31" width="88" /></a>
  </p>