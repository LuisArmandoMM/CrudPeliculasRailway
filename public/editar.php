<?php
include '../db.php';
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM peliculas WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$pelicula = $resultado->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $anio = $_POST['anio'];
    $director = $_POST['director'];
    $update = $conn->prepare("UPDATE peliculas SET nombre=?, anio=?, director=? WHERE id=?");
    $update->bind_param("sisi", $nombre, $anio, $director, $id);
    $update->execute();
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Película</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Editar película</h2>
    <form method="POST">
        <div class="mb-3"><label class="form-label">Nombre</label><input type="text" name="nombre" value="<?= $pelicula['nombre'] ?>" class="form-control" required></div>
        <div class="mb-3"><label class="form-label">Año</label><input type="number" name="anio" value="<?= $pelicula['anio'] ?>" class="form-control" required></div>
        <div class="mb-3"><label class="form-label">Director</label><input type="text" name="director" value="<?= $pelicula['director'] ?>" class="form-control" required></div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>
