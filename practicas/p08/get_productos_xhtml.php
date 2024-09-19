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


