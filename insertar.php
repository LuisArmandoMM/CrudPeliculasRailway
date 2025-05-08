<?php
$pdo = new PDO("pgsql:host=" . getenv('PGHOST') . ";port=5432;dbname=" . getenv('PGDATABASE'), getenv('PGUSER'), getenv('PGPASSWORD'));
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$nombre = $_POST['nombre'];
$anio = $_POST['anio'];
$director = $_POST['director'];

$sql = "INSERT INTO peliculas (nombre, anio, director) VALUES (?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$nombre, $anio, $director]);

header("Location: index.php");
