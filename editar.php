<?php
$host = getenv('PGHOST');
$dbname = getenv('PGDATABASE');
$user = getenv('PGUSER');
$password = getenv('PGPASSWORD');

try {
    $conn = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
} catch (PDOException $e) {
    die("Conexión fallida: " . $e->getMessage());
}

$id = $_GET['id'] ?? null;
if (!$id) die("ID inválido");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST['nombre'];
    $anio = $_POST['anio'];
    $director = $_POST['director'];

    $stmt = $conn->prepare("UPDATE peliculas SET nombre = ?, anio = ?, director = ? WHERE id = ?");
    $stmt->execute([$nombre, $anio, $director, $id]);
    header("Location: index.php");
    exit;
} else {
    $stmt = $conn->prepare("SELECT * FROM peliculas WHERE id = ?");
    $stmt->execute([$id]);
    $pelicula = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$pelicula) die("Película no encontrada");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Película</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h2>Editar Película</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control" value="<?= htmlspecialchars($pelicula['nombre']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Año:</label>
            <input type="number" name="anio" class="form-control" value="<?= htmlspecialchars($pelicula['anio']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Director:</label>
            <input type="text" name="director" class="form-control" value="<?= htmlspecialchars($pelicula['director']) ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar Cambios</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>