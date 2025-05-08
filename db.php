<?php
$host = getenv("MYSQLHOST") ?: "localhost";
$db = getenv("MYSQLDATABASE") ?: "crud";
$user = getenv("MYSQLUSER") ?: "root";
$pass = getenv("MYSQLPASSWORD") ?: "";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>