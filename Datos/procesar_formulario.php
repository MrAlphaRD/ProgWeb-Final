<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesamiento del Formulario</title>
    <!-- Agrega el enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <?php
        // Obtener los datos del formulario
        $fecha = $_POST['fecha'];
        $correo = $_POST['correo'];
        $nombre = $_POST['nombre'];
        $asunto = $_POST['asunto'];
        $comentario = $_POST['comentario'];

        // Incluir el archivo de conexión a la base de datos
        require_once 'conexion.php';

        try {
            // Preparar la consulta para insertar los datos en la tabla utilizando consultas preparadas
            $sql = "INSERT INTO contacto (fecha, correo, nombre, asunto, comentario) VALUES (:fecha, :correo, :nombre, :asunto, :comentario)";
            $stmt = $conn->prepare($sql);

            // Vincular los parámetros
            $stmt->bindParam(':fecha', $fecha);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':asunto', $asunto);
            $stmt->bindParam(':comentario', $comentario);

            // Ejecutar la consulta
            $stmt->execute();

            echo "<div class='alert alert-success' role='alert'>
                Los datos se han guardado correctamente.
            </div>";
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger' role='alert'>
                Error al guardar los datos: " . $e->getMessage() . "
            </div>";
        }

        // Cerrar la conexión
        $conn = null;
        ?>
        <a href="../index.html" class="btn btn-primary">Regresar a la página principal</a>
    </div>
    <!-- Agrega el enlace a Bootstrap JS y jQuery (opcional para ciertas funcionalidades) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
