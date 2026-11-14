<?php
require 'conexion.php';

$stmt = $pdo->query("SELECT * FROM libro ORDER BY id_libro DESC");
$libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>BiblioExpress - Lista de Libros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>BiblioExpress - Catalogo de Libros</h2>
        <a href="crear.php" class="btn btn-primary">Nuevo Libro</a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>ISBN</th>
                        <th>Año</th>
                        <th>Idioma</th>
                        <th>Paginas</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($libros) > 0): ?>
                        <?php foreach ($libros as $libro): ?>
                            <tr>
                                <td><?= htmlspecialchars($libro['id_libro']) ?></td>
                                <td><?= htmlspecialchars($libro['titulo']) ?></td>
                                <td><?= htmlspecialchars($libro['isbn']) ?></td>
                                <td><?= htmlspecialchars($libro['ano_publicacion']) ?></td>
                                <td><?= htmlspecialchars($libro['idioma']) ?></td>
                                <td><?= htmlspecialchars($libro['numero_paginas']) ?></td>
                                <td>
                                    <a href="editar.php?id_libro=<?= $libro['id_libro'] ?>" class="btn btn-sm btn-warning">Editar</a>
                                    <a href="eliminar.php?id_libro=<?= $libro['id_libro'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que desea eliminar este libro?')">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center">No hay libros registrados todavia.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
       </table>
        </div>
    </div>
</div>
</body>
</html>
