<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Nou Llibre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1>Afegir un nou llibre</h1>
    
    <form action="/llibres/create" method="POST" class="mt-4 p-4 border rounded bg-light">
        @csrf  <div class="mb-3">
            <label class="form-label">Títol del llibre</label>
            <input type="text" name="titol" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Codi ISBN</label>
            <input type="text" name="isbn" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Número de pàgines</label>
            <input type="number" name="pagines" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Preu (€)</label>
            <input type="number" step="0.01" name="preu" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Guardar a la biblioteca</button>
        <a href="/llibres" class="btn btn-link">Tornar enrere</a>
    </form>
</body>
</html>