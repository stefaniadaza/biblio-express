<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Libro - BiblioExpress</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5" style="max-width: 600px;">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Registrar Libro</h4>
        </div>
        <div class="card-body">
            <form action="guardar.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Titulo</label>
                    <input type="text" name="titulo" class="form-control" required maxlength="150">
                </div>
                <div class="mb-3">
                    <label class="form-label">ISBN</label>
                    <input type="text" name="isbn" class="form-control" required maxlength="50">
                </div>
                <div class="mb-3">
                    <label class="form-label">Año de Publicacion</label>
                    <input type="number" name="ano_publicacion" class="form-control" min="1501" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Idioma</label>
                    <input type="text" name="idioma" class="form-control" required maxlength="50">
                </div>
                <div class="mb-3">
                    <label class="form-label">Numero de Paginas</label>
                    <input type="number" name="numero_paginas" class="form-control" min="1" required>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="index.php" class="btn btn-secondary">Volver</a>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
