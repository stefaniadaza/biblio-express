<?php
// Datos de conexion a la base de datos
$motor = 'mysql';
$host = 'localhost';
$bd = 'biblio_express';
$usuario = 'root';
$password = '';

try {
    $dsn = "$motor:host=$host;dbname=$bd;charset=utf8mb4";
    $pdo = new PDO($dsn, $usuario, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar con la base de datos.");
}
?>
