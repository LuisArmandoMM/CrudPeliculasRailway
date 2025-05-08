<?php
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $anio = $_POST['anio'];
    $director = $_POST['director'];
    $stmt = $conn->prepare("INSERT INTO peliculas (nombre, anio, director) VALUES (?, ?, ?)");
    $stmt->execute([$nombre, $anio, $director]);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva Película</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1>Agregar Película</h1>
    <form method="POST">
        <div class="mb-3"><label class="form-label">Nombre</label><input type="text" name="nombre" class="form-control" required></div>
        <div class="mb-3"><label class="form-label">Año</label><input type="number" name="anio" class="form-control" required></div>
        <div class="mb-3"><label class="form-label">Director</label><input type="text" name="director" class="form-control" required></div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>
