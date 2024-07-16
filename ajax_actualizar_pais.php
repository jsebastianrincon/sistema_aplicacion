<?php

if (isset($_POST['id_pais']) && isset($_POST['nombre_pais'])) {
    
    include 'conexion/conexion.php';
   
    $id_pais = $_POST['id_pais'];
    $nombre_pais = $_POST['nombre_pais'];

    
    $stmt = $mysqli->prepare("UPDATE paises SET nombre_pais = ? WHERE identificador = ?");
    $stmt->bind_param("si", $nombre_pais, $id_pais);

    
    if ($stmt->execute()) {
        echo "El país se actualizó exitosamente.";
    } else {
        echo "Error al actualizar el país: " . $stmt->error;
    }

    
} else {
    echo "No se recibieron datos del formulario correctamente.";
}
?>
