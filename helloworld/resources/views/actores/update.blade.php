<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Editar actor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1>Editar actor: {{ $actor->nombre }}</h1>
    
    <form action="/actores/editar/{{ $actor->id }}" method="POST" enctype="multipart/form-data" class="mt-4 p-4 border rounded bg-light">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $actor->nombre }}">
        </div>

        <div class="mb-3">
            <label class="form-label">DNI</label>
            <input type="text" name="dni" class="form-control" value="{{ $actor->dni }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Hobby</label>
            <input type="text" name="hobby" class="form-control" value="{{ $actor->hobby }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Edad</label>
            <input type="number" name="edad" class="form-control" value="{{ $actor->edad }}">
        </div>

        <button type="submit" class="btn btn-success">Actualizar actor</button>
        <a href="/actores" class="btn btn-secondary">Volver</a>
    </form>
</body>
</html>