<?php

    $servername = "localhost";
    $username = "u571892443_sis_aplicacion";
    $password = "z%mNp6B5";
    $dbname = "u571892443_sis_aplicacion";
    
    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Verificar conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
        "Conexion Exitosa";
    }

?>