<?php
require_once 'db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM peliculas WHERE id = $id");
$pelicula = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $anio = $_POST["anio"];
    $director = $_POST["director"];
    $conn->query("UPDATE peliculas SET nombre='$nombre', anio='$anio', director='$director' WHERE id=$id");
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Película</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>Editar Película</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?= $pelicula['nombre'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Año</label>
            <input type="number" name="anio" class="form-control" value="<?= $pelicula['anio'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Director</label>
            <input type="text" name="director" class="form-control" value="<?= $pelicula['director'] ?>" required>
        </div>
        <button class="btn btn-primary">Actualizar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
