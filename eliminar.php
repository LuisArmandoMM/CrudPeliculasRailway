<?php
$pdo = new PDO("pgsql:host=" . getenv('PGHOST') . ";port=5432;dbname=" . getenv('PGDATABASE'), getenv('PGUSER'), getenv('PGPASSWORD'));
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id = $_GET['id'] ?? 0;
$pdo->prepare("DELETE FROM peliculas WHERE id = ?")->execute([$id]);

header("Location: index.php");
