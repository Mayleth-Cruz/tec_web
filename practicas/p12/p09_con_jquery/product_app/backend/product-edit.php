<?php
    include_once __DIR__.'/database.php';
   
    
    $producto = file_get_contents('php://input');
    $data = array();
    
    if(!empty($producto)) {
        
        $jsonOBJ = json_decode($producto);
        $id = $jsonOBJ->id;
        $sql = "UPDATE productos SET nombre= '{$jsonOBJ->nombre}', marca= '{$jsonOBJ->marca}', modelo= '{$jsonOBJ->modelo}', precio={$jsonOBJ->precio}, detalles= '{$jsonOBJ->detalles}', unidades= {$jsonOBJ->unidades},imagen= '{$jsonOBJ->imagen}' WHERE id= '$id'";
        if($conexion->query($sql)){
            $data['status'] =  "success";
            $data['message'] =  "El producto se actualizo";
        } else {
            $data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($conexion);
            $data['message'] =  "El producto no se pudo actualizar";
        }
        // Cierra conexion
        $conexion->close();
    }

    
    echo json_encode($data, JSON_PRETTY_PRINT);
?>