<?php
include 'funciones.php';


$numero = isset($_GET['numero']) ? $_GET['numero'] : null;


// 1. Comprobar si un número es múltiplo de 5 y 7
if ($numero !== null) {
    if (esMultiplo5y7($numero)) {
        echo "<p>El número $numero es múltiplo de 5 y 7.</p>";
    } else {
        echo "<p>El número $numero NO es múltiplo de 5 y 7.</p>";
    }
}

// 2. Generación repetitiva de 3 números hasta obtener impar, par, impar
$matriz = [];
$iteraciones = generarSecuenciaImparParImpar($matriz);
echo "<h3>Secuencias generadas:</h3>";
foreach ($matriz as $fila) {
    echo implode(", ", $fila) . "<br>";
}
echo "<p>Se obtuvieron " . (count($matriz) * 3) . " números en $iteraciones iteraciones.</p>";
// 3. Encontrar primer múltiplo con ciclo while
if ($numero !== null) {
    $multiplo = encontrarMultiploWhile($numero);
    echo "<p>Primer múltiplo de $numero encontrado con while: $multiplo</p>";
   
    // Encontrar primer múltiplo con ciclo do-while
    $multiploDoWhile = encontrarMultiploDoWhile($numero);
    echo "<p>Primer múltiplo de $numero encontrado con do-while: $multiploDoWhile</p>";
}
