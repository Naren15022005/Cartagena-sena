<?php
// Incluir la conexión
include 'Conexion_BD.php';

// Verificar si el ID fue pasado correctamente
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Asegurarse de que sea un número

    // Preparar la consulta para eliminar el usuario
    $sql = "DELETE FROM usuarios WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param('i', $id);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Redirigir con un mensaje de éxito
        header('Location: Crud.php?mensaje=eliminacion_exitosa');
        exit;
    } else {
        // Redirigir con un mensaje de error
        header('Location: Crud.php?mensaje=error_eliminar');
        exit;
    }
} else {
    // Si no se recibió el ID, redirigir con un mensaje de error
    header('Location: gestion_usuarios.php?mensaje=error_eliminar');
    exit;
}


// Cerrar la conexión
$conexion->close();
?>
