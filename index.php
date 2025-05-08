<?php
include 'db.php';
$stmt = $conn->query("SELECT * FROM peliculas ORDER BY id DESC");
$peliculas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Películas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1>Listado de Películas</h1>
    <a href="nueva.php" class="btn btn-success mb-3">Agregar nueva película</a>
    <table class="table table-striped">
        <thead><tr><th>ID</th><th>Nombre</th><th>Año</th><th>Director</th><th>Acciones</th></tr></thead>
        <tbody>
            <?php foreach ($peliculas as $p): ?>
            <tr>
                <td><?= $p['id'] ?></td>
                <td><?= htmlspecialchars($p['nombre']) ?></td>
                <td><?= $p['anio'] ?></td>
                <td><?= htmlspecialchars($p['director']) ?></td>
                <td>
                    <a href="editar.php?id=<?= $p['id'] ?>" class="btn btn-primary btn-sm">Editar</a>
                    <a href="eliminar.php?id=<?= $p['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
