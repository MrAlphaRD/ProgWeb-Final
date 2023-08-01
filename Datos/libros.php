<?php
require_once 'conexion.php';

try {
    // Obtener los libros de la base de datos
    $stmt = $conn->query("SELECT titulo, tipo, precio, fecha_pub FROM titulos");
    $libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error al obtener los libros: " . $e->getMessage();
}

// Cerrar la conexión
$conn = null;
?>


    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-60 col-lg-9">
                <div class="title text-center">
                    <h1 class="mb-10">Libros Disponibles</h1>
                    <p>Libros</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Tipo</th>
                            <th>Precio</th>
                            <th>Fecha de Publicación</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($libros as $libro) : ?>
                            <tr>
                                <td><?= $libro['titulo'] ?></td>
                                <td><?= $libro['tipo'] ?></td>
                                <td><?= $libro['precio'] ?></td>
                                <td><?= $libro['fecha_pub'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

