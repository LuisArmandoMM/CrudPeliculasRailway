<?php
$host = getenv("PGHOST") ?: "localhost";
$port = getenv("PGPORT") ?: "5432";
$user = getenv("PGUSER") ?: "postgres";
$password = getenv("PGPASSWORD") ?: "";
$database = getenv("PGDATABASE") ?: "crud";

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$database", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Conexión fallida: " . $e->getMessage());
}
?>
