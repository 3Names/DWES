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
	<a href="/actores" class="btn btn-success mb-3">Ver actores</a>
    <a href="/peliculas" class="btn btn-success mb-3">Ver peliculas</a>
    <a href="/pexact" class="btn btn-success mb-3">Ver Peliculas por actores</a>
	<a href="/actxpe" class="btn btn-success mb-3">Ver Actores por pelicula</a>
	<table class="table table-striped table-hover">
    	<thead class="table-dark">
        	<tr>
            	<th>Títol</th>
            	<th>Actores</th>
        	</tr>
    	</thead>
    	<tbody>
        	@forelse($peliculas as $pelicula)
            	<tr>
                	<td>{{ $pelicula->titol }}</td>
                    <td>
                        <ul>
                    @foreach($pelicula->actores as $actor)
                            <li>{{ $actor->nombre }}</li>
                    @endforeach
                        </ul>
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