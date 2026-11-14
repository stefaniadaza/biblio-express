<?php
require 'conexion.php';

if (isset($_GET['id_libro']) && is_numeric($_GET['id_libro'])) {
    try {
        $stmt = $pdo->prepare("DELETE FROM libro WHERE id_libro = :id");
        $stmt->execute([':id' => (int)$_GET['id_libro']]);
    } catch (PDOException $e) {
        die("Error al eliminar el libro. <a href='index.php'>Volver</a>");
    }
}

header("Location: index.php");
exit;
?>
