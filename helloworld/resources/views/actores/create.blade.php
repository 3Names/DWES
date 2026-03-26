<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Nuevo actor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1>Añadir actor</h1>
    
    <form action="/actores/create" method="POST" enctype="multipart/form-data" class="mt-4 p-4 border rounded bg-light">
        @csrf  <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">DNI</label>
            <input type="text" name="dni" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Hobby</label>
            <input type="text" name="hobby" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Edad</label>
            <input type="number" name="edad" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Guardar actor</button>
        <a href="/peliculas" class="btn btn-link">Tornar enrere</a>
    </form>
</body>
</html>