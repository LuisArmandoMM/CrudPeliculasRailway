<?php include '../db.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Películas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1 class="mb-4">Lista de Películas</h1>
    <a href="agregar.php" class="btn btn-primary mb-3">Agregar película</a>
    <table class="table table-bordered">
        <thead>
            <tr><th>Nombre</th><th>Año</th><th>Director</th><th>Acciones</th></tr>
        </thead>
        <tbody>
            <?php
            $resultado = $conn->query("SELECT * FROM peliculas");
            while ($row = $resultado->fetch_assoc()):
            ?>
                <tr>
                    <td><?= htmlspecialchars($row['nombre']) ?></td>
                    <td><?= $row['anio'] ?></td>
                    <td><?= htmlspecialchars($row['director']) ?></td>
                    <td>
                        <a href="editar.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="eliminar.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm"
                           onclick="return confirm('¿Eliminar esta película?');">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
