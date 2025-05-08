<?php
$host = getenv("PGHOST") ?: "dpg-d0eg28h5pdvs73am6k70-a";
$port = getenv("PGPORT") ?: "5432";
$user = getenv("PGUSER") ?: "user";
$password = getenv("PGPASSWORD") ?: "FFKkiZNouu5kJB1bdGwbeFz7UnJ5NX6y";
$database = getenv("PGDATABASE") ?: "moviesdb_qwm7";

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$database", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Conexión fallida: " . $e->getMessage());
}
?>
