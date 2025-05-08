<?php
require_once 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $anio = $_POST["anio"];
    $director = $_POST["director"];
    $conn->query("INSERT INTO peliculas (nombre, anio, director) VALUES ('$nombre', '$anio', '$director')");
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva Película</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>Añadir Nueva Película</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Año</label>
            <input type="number" name="anio" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Director</label>
            <input type="text" name="director" class="form-control" required>
        </div>
        <button class="btn btn-success">Guardar</button>
        <a href="index.php" class="btn btn-secondary">Volver</a>
    </form>
</div>
</body>
</html>
