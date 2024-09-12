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

