<?php

// Parámetros de conexión a la base de datos
$servername = "localhost"; 
$username = "root";
$password = "";
$dbname = "libreria";

try {
    // Crear una instancia de PDO para la conexión a la base de datos
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Establecer el modo de error a excepciones
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}

try {
    // Obtener los autores$autores de la base de datos
    $stmt = $conn->query("SELECT apellido, nombre, pais FROM autores");
    $autores = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error al obtener los autores: " . $e->getMessage();
}

// Cerrar la conexión
$conn = null;
?>


    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-60 col-lg-9">
                <div class="title text-center">
                    <h1 class="mb-10">Nuestros Autores</h1>
                    
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Apellido</th>
                            <th>Nombre</th>
                            <th>País</th>
                       
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($autores as $autor) : ?>
                            <tr>
                                <td><?= $autor['apellido'] ?></td>
                                <td><?= $autor['nombre'] ?></td>
                                <td><?= $autor['pais'] ?></td>
                              
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>