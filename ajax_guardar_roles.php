<?php
include 'conexion/conexion_ajax.php';

$name = isset($_POST['nombre_rol']) ? $_POST['nombre_rol'] : '';

if (!empty($name)) {
    // Sanitize input (example with htmlspecialchars)
    $name = htmlspecialchars($name);

    $stmt_check = $conn->prepare("SELECT identificador FROM roles WHERE nombre = ?");
    $stmt_check->bind_param("s", $name);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        echo "El rol ya existe en la base de datos.";
    } else {
        $stmt_insert = $conn->prepare("INSERT INTO roles(nombre, estado) VALUES(?, '1')");
        $stmt_insert->bind_param("s", $name);

        if ($stmt_insert->execute()) {
            echo "Rol guardado exitosamente.";
        } else {
            echo "Error al guardar el rol: " . $stmt_insert->error;
        }

        $stmt_insert->close();
    }

    $stmt_check->close();
} else {
    echo "Por favor, complete todos los campos.";
}

$conn->close();
?>
