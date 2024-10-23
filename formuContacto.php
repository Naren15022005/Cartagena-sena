<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contacto</title>
    <link rel="stylesheet" href="formuContacto.css">
</head>
<body>
    <div class="contenedor_formulario">
    <h1>Contactanos</h1>
     <p>Escribenos y en instantes nos pondremos en contacto contigo</p>

        <form action="formularioContacto_BD.php" method="POST" class="Contactoform">

            <label for="nombre"><b>Nombre </b> </label>
            <input type="text" id="nombre" name="nombre" required ><br>

            <label for="email"><b>Email </b></label>
            <input type="email" id="email" name="email" required><br>

            <label for="Telefono"><b>Telefono </b> </label>
            <input type="text" id="telefono" name="telefono" required ><br>
        
            <label for="mensaje"><b>Mensaje </b></label>
            <textarea id="mensaje" name="mensaje" required></textarea> <br>

            <input type="submit" name="enviar" value="Enviar" class="enviar">

            <p class="final"><b>* los campos son obligatorios</b></p>


        </form>
</div>
    <script src="Formulario.js"></script>
</body>
</html>