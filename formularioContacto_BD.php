<?php
    // Incluye el archivo que contiene la conexión a la base de datos.
    include 'Conexion_BD.php'; // Debes asegurarte de que el archivo existe y contiene la conexión

    // Recoge los datos del formulario.
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $mensaje = $_POST['mensaje'];

    // Valida y filtra los datos si es necesario (por seguridad).
    $nombre = mysqli_real_escape_string($conexion, $nombre);
    $email = mysqli_real_escape_string($conexion, $email);
    $telefono = mysqli_real_escape_string($conexion, $telefono);
    $mensaje = mysqli_real_escape_string($conexion, $mensaje);

    // Prepara la consulta SQL (corrigiendo el nombre del campo "mensaje").
    $enviar = "INSERT INTO usuarios (nombre, email, telefono, mensaje) VALUES ('$nombre', '$email', '$telefono', '$mensaje')";

    // Ejecuta la consulta y verifica si ha funcionado correctamente.
    if (mysqli_query($conexion, $enviar)) {
        echo " datos enviados correctamente." ;
    } else {
        echo "Error: " . mysqli_error($conexion);
    }

    // Cierra la conexión a la base de datos.
    mysqli_close($conexion);
?>
