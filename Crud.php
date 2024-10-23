<?php
// Incluir la conexión
include 'Conexion_BD.php';

// Consulta para obtener todos los usuarios
$sql = "SELECT id, nombre, email, telefono, mensaje FROM usuarios";
$query = $conexion->query($sql); // Ejecutar la consulta

// Verificar si la consulta fue exitosa
if (!$query) {
    echo "<p>Error en la consulta: " . $conexion->error . "</p>";
}

if (isset($_GET['mensaje'])) {
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>"; // Incluir SweetAlert2

    if ($_GET['mensaje'] === 'actualizacion_exitosa') {
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: '¡Actualización exitosa!',
                text: 'Los datos del usuario se actualizaron correctamente.',
                showConfirmButton: false,
                timer: 2000
            });
        </script>";
    } elseif ($_GET['mensaje'] === 'eliminacion_exitosa') {
        echo "<script>
            Swal.fire({
                icon: 'success',
                title: '¡Eliminación exitosa!',
                text: 'El usuario ha sido eliminado correctamente.',
                showConfirmButton: false,
                timer: 2000
            });
        </script>";
    } elseif ($_GET['mensaje'] === 'error_eliminar') {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error al eliminar',
                text: 'Hubo un problema al eliminar el usuario. Por favor, intenta de nuevo.',
                showConfirmButton: true,
                confirmButtonText: 'Cerrar'
            });
        </script>";
    }
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="crud5.css">
</head>
<body>
    <h2>Gestión de Usuarios</h2>
    <table>
        <thead>
            <tr>
                <th><input type="checkbox" id="select-all"></th>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Mensaje</th>
                <th>Acción</th>
                <th> 
                <svg class="canecota" id="delete-icon" style="pointer-events:none; opacity:0.5;" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                <path fill="currentColor" d="M18 19a3 3 0 0 1-3 3H8a3 3 0 0 1-3-3V7H4V4h4.5l1-1h4l1 1H19v3h-1zM6 7v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V7zm12-1V5h-4l-1-1h-3L9 5H5v1zM8 9h1v10H8zm6 0h1v10h-1z"/>
            </svg>               
                 </th>
            </tr>
        </thead>
        <tbody>
            <?php if ($query->num_rows > 0): ?>
                <?php while ($row = $query->fetch_assoc()): ?>
                    <tr>
                        <td><input class="selectRow" type="checkbox"></td>
                        <td class="id" ><?php echo $row['id']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['telefono']; ?></td>
                        <td><?php echo $row['mensaje']; ?></td>
                        <td class="actions">
                            <!-- Botón Editar con atributos data-* para pasar la información del usuario -->
                            <button class="edit-button" 
                                data-id="<?php echo $row['id']; ?>"
                                data-nombre="<?php echo $row['nombre']; ?>"
                                data-email="<?php echo $row['email']; ?>"
                                data-telefono="<?php echo $row['telefono']; ?>"
                                data-mensaje="<?php echo $row['mensaje']; ?>"
                            >Editar</button>
                        </td>
                        <td class='elimi'>
                            <a href='delete.php?id=<?php echo $row['id']; ?>' onclick='return confirm("¿Estás seguro de que quieres eliminar este usuario?");'>
                                <svg class='canequita' xmlns='http://www.w3.org/2000/svg' width='1em' height='1em' viewBox='0 0 24 24'>
                                    <path fill='currentColor' d='M18 19a3 3 0 0 1-3 3H8a3 3 0 0 1-3-3V7H4V4h4.5l1-1h4l1 1H19v3h-1zM6 7v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V7zm12-1V5h-4l-1-1h-3L9 5H5v1zM8 9h1v10H8zm6 0h1v10h-1z'/>
                                </svg>
                            </a>
                        </td>

                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No hay usuarios registrados.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Modal -->
    <div  class="modal" id="modal" style="display:none;">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <h2>Editar Usuario</h2>
            <form class="contenido" id="editForm" action="update.php" method="POST">
                <input type="hidden" name="id" id="edit-id">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="edit-nombre">
                <label for="email">Email:</label>
                <input type="email" name="email" id="edit-email">
                <label for="telefono">Teléfono:</label>
                <input type="text" name="telefono" id="edit-telefono">
                <label for="mensaje">Mensaje:</label>
                <input type="text" name="mensaje" id="edit-mensaje">
                <button  id="saveChanges" type="submit">Guardar Cambios</button>

            </form>
        </div>
    </div>

    <form id="deleteForm" action="delete_multiple.php" method="POST" style="display:none;">
    <input type="hidden" name="ids" id="idsToDelete"> <!-- Aquí se almacenarán los IDs seleccionados -->
</form>

    <script>


document.getElementById('delete-icon').addEventListener('click', function() {
    const checkedRows = document.querySelectorAll('.selectRow:checked'); 
    const ids = [];

    checkedRows.forEach(checkbox => {
        const row = checkbox.closest('tr');
        const userId = row.querySelector('.id').textContent;
        ids.push(userId);
    });

    console.log('IDs seleccionados para eliminar:', ids); // Verifica si los IDs están capturados

    if (ids.length > 0) {
        document.getElementById('idsToDelete').value = ids.join(',');

        if (confirm('¿Estás seguro de que deseas eliminar los usuarios seleccionados?')) {
            document.getElementById('deleteForm').submit(); 
        }
    } else {
        alert('Por favor, selecciona al menos un usuario para eliminar.');
    }
});


    document.getElementById('delete-icon').addEventListener('click', function() {
    const checkedRows = document.querySelectorAll('.selectRow:checked'); // Seleccionamos los checkboxes marcados
    const ids = [];

    // Iteramos sobre los checkboxes seleccionados para obtener los IDs
    checkedRows.forEach(checkbox => {
        const row = checkbox.closest('tr'); // Encuentra la fila correspondiente
        const userId = row.querySelector('.id').textContent; // Obtiene el ID de la fila
        ids.push(userId); // Agrega el ID al array
    });

    if (ids.length > 0) {
        // Pasamos los IDs al campo oculto del formulario
        document.getElementById('idsToDelete').value = ids.join(',');

        // Confirmamos antes de enviar el formulario
        if (confirm('¿Estás seguro de que deseas eliminar los usuarios seleccionados?')) {
            document.getElementById('deleteForm').submit(); // Envía el formulario
        }
    } else {
        alert('Por favor, selecciona al menos un usuario para eliminar.');
    }
});




// Lógica de eliminación múltiple
document.getElementById('delete-icon').addEventListener('click', function() {
            const checkedRows = document.querySelectorAll('.selectRow:checked'); 
            const ids = [];

            checkedRows.forEach(checkbox => {
                const row = checkbox.closest('tr');
                const userId = row.querySelector('.id').textContent.trim();
                ids.push(userId);
            });

            if (ids.length > 0) {
                document.getElementById('idsToDelete').value = ids.join(',');

                if (confirm('¿Estás seguro de que deseas eliminar los usuarios seleccionados?')) {
                    document.getElementById('deleteForm').submit();
                }
            } else {
                alert('Por favor, selecciona al menos un usuario para eliminar.');
            }
        });

        // Lógica para activar/desactivar el icono de la caneca
        document.addEventListener('DOMContentLoaded', function() {
            const selectAllCheckbox = document.getElementById('select-all');
            const rowCheckboxes = document.querySelectorAll('.selectRow');
            const deleteIcon = document.getElementById('delete-icon');

            function toggleDeleteIcon() {
                const checkedRows = document.querySelectorAll('.selectRow:checked').length;
                if (checkedRows > 0) {
                    deleteIcon.style.pointerEvents = 'auto';  
                    deleteIcon.style.opacity = '1';           
                } else {
                    deleteIcon.style.pointerEvents = 'none';  
                    deleteIcon.style.opacity = '0.5';         
                }
            }

            selectAllCheckbox.addEventListener('change', function() {
                rowCheckboxes.forEach(checkbox => {
                    checkbox.checked = selectAllCheckbox.checked; 
                    const row = checkbox.closest('tr');
                    row.classList.toggle('selected-row', checkbox.checked);
                });
                toggleDeleteIcon();
            });

            rowCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const row = this.closest('tr');
                    row.classList.toggle('selected-row', this.checked);
                    toggleDeleteIcon();
                });
            });
        });

        // Función para abrir el modal con la información del usuario
        document.querySelectorAll('.edit-button').forEach(button => {
            button.addEventListener('click', function() {
                const userId = this.getAttribute('data-id');
                const userName = this.getAttribute('data-nombre');
                const userEmail = this.getAttribute('data-email');
                const userPhone = this.getAttribute('data-telefono');
                const userMessage = this.getAttribute('data-mensaje');
                
                // Rellenar los campos del modal con la información del usuario
                document.getElementById('edit-id').value = userId;
                document.getElementById('edit-nombre').value = userName;
                document.getElementById('edit-email').value = userEmail;
                document.getElementById('edit-telefono').value = userPhone;
                document.getElementById('edit-mensaje').value = userMessage;
                
                // Mostrar el modal
                document.getElementById('modal').style.display = 'block';
            });
        });



        // Función para cerrar el modal
        document.getElementById('closeModal').addEventListener('click', function() {
            document.getElementById('modal').style.display = 'none';
        });

           // Cerrar el modal al presionar la tecla ESC
           document.onkeydown = function(event) {
            if (event.key === "Escape") { // Verificar si la tecla presionada es "ESC"
                modal.style.display = "none"; // Ocultar el modal
            }
        }

        // Cerrar el modal si se hace clic fuera de él
        window.addEventListener('click', function(event) {
            const modal = document.getElementById('modal');
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        });
    </script>

    <?php
    // Cerrar la conexión
    $conexion->close();
    ?>
</body>
</html>
