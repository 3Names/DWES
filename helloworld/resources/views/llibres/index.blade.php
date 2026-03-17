<!DOCTYPE html>
<html lang="ca">
<head>
	<meta charset="UTF-8">
	<title>Biblioteca - Llistat</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
	<h1 class="mb-4">Llistat de Llibres</h1>
	<h2 class="mb-4">Patricio Salazar Ccoa</h2>
	<a href="/llibres/create" class="btn btn-success mb-3">Afegir un llibre nou</a>
	<table class="table table-striped table-hover">
    	<thead class="table-dark">
        	<tr>
            	<th>Títol</th>
            	<th>ISBN</th>
            	<th>Pàgines</th>
            	<th>Preu</th>
				<th>Acciones</th>
        	</tr>
    	</thead>
    	<tbody>
        	@forelse($llibres as $llibre)
            	<tr>
                	<td>{{ $llibre->titol }}</td>
                	<td>{{ $llibre->isbn }}</td>
                	<td>{{ $llibre->pagines }}</td>
                	<td>{{ $llibre->preu }} €</td>
					<td>
						<a href="/llibres/{{ $llibre->id }}" class="btn btn-info btn-sm">Veure</a>
						<a href="/llibres/eliminar/{{ $llibre->id }}" class="btn btn-info btn-sm">Eliminar</a>
					</td>
            	</tr>
        	@empty
            	<tr>
                	<td colspan="4" class="text-center">No hi ha llibres a la biblioteca.</td>
            	</tr>
        	@endforelse
    	</tbody>
	</table>
</body>
</html>