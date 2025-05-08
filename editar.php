<?php
include 'db.php';
$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM peliculas WHERE id = ?");
$stmt->execute([$id]);
$p = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$p) { die("Película no encontrada."); }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $anio = $_POST['anio'];
    $director = $_POST['director'];
    $stmt = $conn->prepare("UPDATE peliculas SET nombre = ?, anio = ?, director = ? WHERE id = ?");
    $stmt->execute([$nombre, $anio, $director, $id]);
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
    <h1>Editar Película</h1>
    <form method="POST">
        <div class="mb-3"><label class="form-label">Nombre</label><input type="text" name="nombre" class="form-control" value="<?= htmlspecialchars($p['nombre']) ?>" required></div>
        <div class="mb-3"><label class="form-label">Año</label><input type="number" name="anio" class="form-control" value="<?= $p['anio'] ?>" required></div>
        <div class="mb-3"><label class="form-label">Director</label><input type="text" name="director" class="form-control" value="<?= htmlspecialchars($p['director']) ?>" required></div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>
