<?php
require 'conexion.php';

// Actualizar los datos cuando se envia el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id_libro'] ?? '';
    $titulo = trim($_POST['titulo'] ?? '');
    $isbn = trim($_POST['isbn'] ?? '');
    $ano = $_POST['ano_publicacion'] ?? '';
    $idioma = trim($_POST['idioma'] ?? '');
    $paginas = $_POST['numero_paginas'] ?? '';

    if (empty($titulo) || empty($isbn) || empty($idioma) || !is_numeric($ano) || (int)$ano <= 1500 || !is_numeric($paginas) || (int)$paginas <= 0) {
        die("Datos incorrectos, revise el formulario. <a href='index.php'>Volver</a>");
    }

    try {
        $sql = "UPDATE libro 
                SET titulo = :titulo, isbn = :isbn, ano_publicacion = :ano, idioma = :idioma, numero_paginas = :paginas 
                WHERE id_libro = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':titulo' => $titulo,
            ':isbn' => $isbn,
            ':ano' => (int)$ano,
            ':idioma' => $idioma,
            ':paginas' => (int)$paginas,
            ':id' => (int)$id
        ]);

        header("Location: index.php");
        exit;
    } catch (PDOException $e) {
        die("Error al actualizar el registro. <a href='index.php'>Volver</a>");
    }
}

// Cargar datos del libro por el id recibido en la URL
if (!isset($_GET['id_libro']) || !is_numeric($_GET['id_libro'])) {
    header("Location: index.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM libro WHERE id_libro = :id");
$stmt->execute([':id' => (int)$_GET['id_libro']]);
$libro = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$libro) {
    die("El libro no existe. <a href='index.php'>Volver</a>");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Libro - BiblioExpress</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5" style="max-width: 600px;">
    <div class="card">
        <div class="card-header bg-warning">
            <h4 class="mb-0">Editar Libro</h4>
        </div>
        <div class="card-body">
            <form action="editar.php" method="POST">
                <input type="hidden" name="id_libro" value="<?= htmlspecialchars($libro['id_libro']) ?>">
                <div class="mb-3">
                    <label class="form-label">Titulo</label>
                    <input type="text" name="titulo" class="form-control" value="<?= htmlspecialchars($libro['titulo']) ?>" required maxlength="150">
                </div>
                <div class="mb-3">
                    <label class="form-label">ISBN</label>
                    <input type="text" name="isbn" class="form-control" value="<?= htmlspecialchars($libro['isbn']) ?>" required maxlength="50">
                </div>
                <div class="mb-3">
                    <label class="form-label">Año de Publicacion</label>
                    <input type="number" name="ano_publicacion" class="form-control" value="<?= htmlspecialchars($libro['ano_publicacion']) ?>" min="1501" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Idioma</label>
                    <input type="text" name="idioma" class="form-control" value="<?= htmlspecialchars($libro['idioma']) ?>" required maxlength="50">
                </div>
                <div class="mb-3">
                    <label class="form-label">Numero de Paginas</label>
                    <input type="number" name="numero_paginas" class="form-control" value="<?= htmlspecialchars($libro['numero_paginas']) ?>" min="1" required>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="index.php" class="btn btn-secondary">Volver</a>
                    <button type="submit" class="btn btn-warning">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
