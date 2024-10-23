<?php
// Incluir la conexión a la base de datos
include 'Conexion_BD.php';

// Verificar si se ha pasado un ID a través de GET
if (isset($_GET['id'])) {
    $userId = intval($_GET['id']); // Asegúrate de que el ID sea un número entero

    // Preparar la consulta
    $sql = "SELECT id, nombre, email, telefono, mensaje FROM usuarios WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param('i', $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si se encontró el usuario
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        header('Content-Type: application/json');
        echo json_encode($user);  // Devolver los datos del usuario en formato JSON
    } else {
        // En caso de que no se encuentre el usuario, devolver un error
        echo json_encode(['error' => 'Usuario no encontrado']);
    }
} else {
    // Si no se pasa el ID, devolver un error
    echo json_encode(['error' => 'ID de usuario no especificado']);
}

// Cerrar la conexión
$conexion->close();
?>
