<?php
require_once 'db.php';
$id = $_GET['id'];
$conn->query("DELETE FROM peliculas WHERE id = $id");
header("Location: index.php");
exit;
?>