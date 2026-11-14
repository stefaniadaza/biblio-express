<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo'] ?? '');
    $isbn = trim($_POST['isbn'] ?? '');
    $ano = $_POST['ano_publicacion'] ?? '';
    $idioma = trim($_POST['idioma'] ?? '');
    $paginas = $_POST['numero_paginas'] ?? '';

    // Validar que los campos no esten vacios y los numeros sean correctos
    if (empty($titulo) || empty($isbn) || empty($idioma)) {
        die("Todos los campos son obligatorios. <a href='crear.php'>Volver</a>");
    }

    if (!is_numeric($ano) || (int)$ano <= 1500) {
        die("El año debe ser mayor a 1500. <a href='crear.php'>Volver</a>");
    }

    if (!is_numeric($paginas) || (int)$paginas <= 0) {
        die("El numero de paginas debe ser mayor a 0. <a href='crear.php'>Volver</a>");
    }

    try {
        $sql = "INSERT INTO libro (titulo, isbn, ano_publicacion, idioma, numero_paginas) 
                VALUES (:titulo, :isbn, :ano, :idioma, :paginas)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':titulo' => $titulo,
            ':isbn' => $isbn,
            ':ano' => (int)$ano,
            ':idioma' => $idioma,
            ':paginas' => (int)$paginas
        ]);

        header("Location: index.php");
        exit;
    } catch (PDOException $e) {
        die("No se pudo guardar el libro. Verifique que el ISBN no este repetido. <a href='crear.php'>Volver</a>");
    }
}
?>
