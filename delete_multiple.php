<?php
// Incluir la conexión
include 'Conexion_BD.php';

if (isset($_POST['ids'])) {
    $ids = $_POST['ids'];  // Recibir los IDs como un string

    // Convertir el string de IDs en un array
    $idArray = explode(',', $ids);

    // Limpiar los valores de los IDs (prevención de inyección SQL)
    $idArray = array_map('intval', $idArray); 

    // Crear la consulta para eliminar múltiples usuarios
    if (count($idArray) > 0) {
        $idList = implode(',', $idArray); // Convertir el array en una lista separada por comas
        $sql = "DELETE FROM usuarios WHERE id IN ($idList)";

        // Ejecutar la consulta
        if ($conexion->query($sql) === TRUE) {
            // Redirigir con un mensaje de éxito
            header('Location: Crud.php?mensaje=eliminacion_exitosa');
        } else {
            // Redirigir con un mensaje de error
            header('Location: Crud.php?mensaje=error_eliminar');
        }
    }
} else {
    // Si no hay IDs, redirigir con un mensaje de error
    header('Location: Crud.php?mensaje=error_eliminar');
}
?>
