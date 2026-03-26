<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Editar Pelicula</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1>Editar Pelicula: {{ $pelicula->titol }}</h1>
    
    <form action="/peliculas/editar/{{ $pelicula->id }}" method="POST" enctype="multipart/form-data" class="mt-4 p-4 border rounded bg-light">
        @csrf

        <div class="mb-3">
            <label class="form-label">Título de la pelicula</label>
            <input type="text" name="titol" class="form-control" value="{{ $pelicula->titol }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Codi ISBN</label>
            <input type="text" name="isbn" class="form-control" value="{{ $pelicula->isbn }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Duracion en minutos</label>
            <input type="number" name="duracion" class="form-control" value="{{ $pelicula->duracion }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Precio (€)</label>
            <input type="number" step="0.01" name="preu" class="form-control" value="{{ $pelicula->preu }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Selecciona els autors:</label>
            <select name="actores[]" class="form-select" multiple>
                @foreach($actores as $actor)
                    <option value="{{ $actor->id }}">{{ $actor->nombre }}</option>
                @endforeach
            </select>
            <small class="text-muted">Mantingues premut Ctrl per seleccionar-ne més d'un.</small>
        </div>

        <div class="mb-3">
            <label class="form-label">Portada actual</label>
            @if($pelicula->imatge)
                <div class="mb-2">
                    <img src="{{ asset('portades/' . $pelicula->imatge) }}" width="100" class="img-thumbnail">
                </div>
            @endif
            <input type="file" name="imatge" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Actualizar Pelicula</button>
        <a href="/peliculas" class="btn btn-secondary">Volver</a>
    </form>
</body>
</html>