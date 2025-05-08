<?php
$host = getenv('PGHOST');
$port = getenv('PGPORT') ?: 5432;
$dbname = getenv('PGDATABASE');
$user = getenv('PGUSER');
$password = getenv('PGPASSWORD');

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Conexión fallida: " . $e->getMessage());
}

// Mostrar películas
$stmt = $pdo->query("SELECT * FROM peliculas ORDER BY id DESC");
$peliculas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>CRUD de Películas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
  <h1 class="mb-4">Películas</h1>
  <form action="insertar.php" method="post" class="mb-4">
    <div class="row g-2">
      <div class="col-md">
        <input class="form-control" name="nombre" placeholder="Nombre de la película" required>
      </div>
      <div class="col-md">
        <input class="form-control" name="anio" placeholder="Año" type="number" required>
      </div>
      <div class="col-md">
        <input class="form-control" name="director" placeholder="Director" required>
      </div>
      <div class="col-md">
        <button class="btn btn-primary w-100">Agregar</button>
      </div>
    </div>
  </form>
  <table class="table table-striped">
    <thead><tr><th>ID</th><th>Nombre</th><th>Año</th><th>Director</th><th>Acciones</th></tr></thead>
    <tbody>
      <?php foreach ($peliculas as $p): ?>
        <tr>
          <td><?= $p['id'] ?></td>
          <td><?= $p['nombre'] ?></td>
          <td><?= $p['anio'] ?></td>
          <td><?= $p['director'] ?></td>
          <td>
            <a href="eliminar.php?id=<?= $p['id'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
          </td>
           <td>
            <a href="editar.php?id=<?= $p['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
        </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>
