<?php
include_once __DIR__.'/database.php';

// SE VERIFICA QUE HAYA RECIBIDO UN JSON
$data = json_decode(file_get_contents("php://input"), true);
