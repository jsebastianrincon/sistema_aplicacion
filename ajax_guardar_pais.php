<?php
include 'conexion/conexion_ajax.php';

// Verificar si se recibió el nombre del país desde el formulario
$name = isset($_POST['nombre_pais']) ? $_POST['nombre_pais'] : '';

// Verificar que el nombre del país no esté vacío
if (!empty($name)) {
    // Consultar si el país ya existe en la base de datos
    $stmt_check = $conn->prepare("SELECT identificador FROM paises WHERE nombre_pais = ?");
    $stmt_check->bind_param("s", $name);
    $stmt_check->execute();
    $stmt_check->store_result();

    // Verificar el resultado de la consulta
    if ($stmt_check->num_rows > 0) {
        echo "El país ya existe en la base de datos.";
    } else {
        // Preparar la consulta para insertar el nuevo país
        $stmt_insert = $conn->prepare("INSERT INTO paises(nombre_pais, estado) VALUES(?, '1')");
        $stmt_insert->bind_param("s", $name); // Asociar el parámetro con el nombre del país

        // Ejecutar la consulta preparada de inserción
        if ($stmt_insert->execute()) {
            echo "Pais guardado exitosamente.";
        } else {
            echo "Error al guardar el Pais: " . $stmt_insert->error;
        }

        // Cerrar la declaración preparada de inserción
        $stmt_insert->close();
    }

    // Cerrar la declaración preparada de verificación
    $stmt_check->close();
} else {
    echo "Por favor, complete todos los campos.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
