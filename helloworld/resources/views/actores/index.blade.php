<!DOCTYPE html>
<html lang="ca">
<head>
	<meta charset="UTF-8">
	<title>Videoteca - Llistat</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
	<h1 class="mb-4">Llistat de actors</h1>
	<h2 class="mb-4">Patricio Salazar Ccoa</h2>
	<a href="/actores/create" class="btn btn-success mb-3">Añadir un actor nuevo</a>
	<a href="/peliculas" class="btn btn-success mb-3">Ver peliculas</a>
	<a href="/pexact" class="btn btn-success mb-3">Ver Peliculas por actores</a>
	<a href="/actxpe" class="btn btn-success mb-3">Ver Actores por pelicula</a>
	<table class="table table-striped table-hover">
    	<thead class="table-dark">
        	<tr>
            	<th>Nombre</th>
            	<th>DNI</th>
            	<th>Hobby</th>
            	<th>Edad</th>
				<th>Acciones</th>
        	</tr>
    	</thead>
    	<tbody>
        	@forelse($actores as $actor)
            	<tr>
                	<td>{{ $actor->nombre }}</td>
                	<td>{{ $actor->dni }}</td>
                	<td>{{ $actor->hobby }}</td>
                	<td>{{ $actor->edad }}</td>
					<td>
						<a href="/actores/{{ $actor->id }}" class="btn btn-info btn-sm">Veure</a>
						<a href="/actores/eliminar/{{ $actor->id }}" class="btn btn-info btn-sm">Eliminar</a>
						<a href="/actores/editar/{{ $actor->id }}" class="btn btn-info btn-sm">Editar</a>
					</td>
            	</tr>
        	@empty
            	<tr>
                	<td colspan="4" class="text-center">No hay actores.</td>
            	</tr>
        	@endforelse
    	</tbody>
	</table>
</body>
</html>