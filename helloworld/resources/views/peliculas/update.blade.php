<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Editar Pelicula</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1>Editar Pelicula</h1>
    
    <form action="/peliculas/create" method="POST" enctype="multipart/form-data" class="mt-4 p-4 border rounded bg-light">
        @csrf  <div class="mb-3">
            <label class="form-label">Título de la pelicula</label>
            <input type="text" name="titol" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Codi ISBN</label>
            <input type="text" name="isbn" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Número de pàginas</label>
            <input type="number" name="pagines" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Precio (€)</label>
            <input type="number" step="0.01" name="preu" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Portada de la pelicula</label>
            <input type="file" name="imatge" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Guardar en la videoteca</button>
        <a href="/peliculas" class="btn btn-link">Volver</a>
    </form>
</body>
</html>