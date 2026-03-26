<!DOCTYPE html>
<html lang="ca">
<head>
	<meta charset="UTF-8">
	<title>Videoteca - Llistat</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
	<h1 class="mb-4">Llistat de peliculas</h1>
	<h2 class="mb-4">Patricio Salazar Ccoa</h2>
	<a href="/peliculas/create" class="btn btn-success mb-3">Añadir una pelicula nueva</a>
	<a href="/actores" class="btn btn-success mb-3">Ver actores</a>
	<table class="table table-striped table-hover">
    	<thead class="table-dark">
        	<tr>
            	<th>Títol</th>
            	<th>ISBN</th>
            	<th>Duracion en minutos</th>
            	<th>Preu</th>
				<th>Acciones</th>
        	</tr>
    	</thead>
    	<tbody>
        	@forelse($peliculas as $pelicula)
            	<tr>
                	<td>{{ $pelicula->titol }}</td>
                	<td>{{ $pelicula->isbn }}</td>
                	<td>{{ $pelicula->duracion }}</td>
                	<td>{{ $pelicula->preu }} €</td>
					<td>
						<a href="/peliculas/{{ $pelicula->id }}" class="btn btn-info btn-sm">Veure</a>
						<a href="/peliculas/eliminar/{{ $pelicula->id }}" class="btn btn-info btn-sm">Eliminar</a>
						<a href="/peliculas/editar/{{ $pelicula->id }}" class="btn btn-info btn-sm">Editar</a>
					</td>
            	</tr>
        	@empty
            	<tr>
                	<td colspan="4" class="text-center">No hi ha peliculas a la biblioteca.</td>
            	</tr>
        	@endforelse
    	</tbody>
	</table>
</body>
</html>