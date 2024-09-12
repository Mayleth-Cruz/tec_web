<?php
// Función para comprobar si un número es múltiplo de 5 y 7
function esMultiplo5y7($numero) {
    return ($numero % 5 == 0) && ($numero % 7 == 0);
}
// Función para generar secuencias impar, par, impar
function generarSecuenciaImparParImpar(&$matriz) {
    $iteraciones = 0;
    do {
        $fila = [];
        $fila[] = rand(100, 999);
        $fila[] = rand(100, 999);
        $fila[] = rand(100, 999);
        $matriz[] = $fila;
        $iteraciones++;
    } while (!($fila[0] % 2 != 0 && $fila[1] % 2 == 0 && $fila[2] % 2 != 0));
    return $iteraciones;
}
// Función para encontrar el primer múltiplo de un número dado usando while
function encontrarMultiploWhile($numero) {
    while (true) {
        $aleatorio = rand(1, 1000);
        if ($aleatorio % $numero == 0) {
            return $aleatorio;
        }
    }
}
// Función para encontrar el primer múltiplo de un número dado usando do-while
function encontrarMultiploDoWhile($numero) {
    do {
        $aleatorio = rand(1, 1000);
    } while ($aleatorio % $numero != 0);
    return $aleatorio;
}
// Función para crear un arreglo de ASCII del 97 al 122 con letras de la a a la z
function generarArregloASCII() {
    $arreglo = [];
    for ($i = 97; $i <= 122; $i++) {
        $arreglo[$i] = chr($i);
    }
    return $arreglo;
}
?>


