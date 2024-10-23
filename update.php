<?php
// Incluir el archivo de conexión a la base de datos
include 'Conexion_BD.php';

// Verificar si el formulario ha sido enviado con el método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $mensaje = $_POST['mensaje'];

    // Verificar que los campos no estén vacíos
    if (!empty($id) && !empty($nombre) && !empty($email) && !empty($telefono) && !empty($mensaje)) {
        // Preparar la consulta SQL para actualizar el usuario
        $sql = "UPDATE usuarios SET nombre = ?, email = ?, telefono = ?, mensaje = ? WHERE id = ?";

        // Preparar la consulta utilizando prepared statements
        if ($stmt = $conexion->prepare($sql)) {
            // Enlazar los parámetros a la consulta
            $stmt->bind_param("ssssi", $nombre, $email, $telefono, $mensaje, $id);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                // Si la actualización fue exitosa, redirigir de vuelta al CRUD con un mensaje de éxito
                header("Location: Crud.php?mensaje=" . urlencode("Usuario actualizado con éxito"));
                exit();
            } else {
                echo "Error al actualizar el usuario: " . $stmt->error;
            }
        } else {
            echo "Error en la preparación de la consulta: " . $conexion->error;
        }

        // Cerrar el statement
        $stmt->close();
    } else {
        echo "Todos los campos son obligatorios.";
    }
}

// Cerrar la conexión
$conexion->close();
?>
