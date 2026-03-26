<div class="container mt-5">
    <h1>{{ $pelicula->titol }}</h1>
    <div class="row">
        <div class="col-md-4">
            @if($pelicula->imatge)
                <img src="{{ asset('portades/' . $pelicula->imatge) }}" class="img-fluid rounded">
            @else
                <img src="https://via.placeholder.com/300x400" class="img-fluid">
            @endif
        </div>
        <div class="col-md-8">
            <p><strong>ISBN:</strong> {{ $pelicula->isbn }}</p>
            <p><strong>Duración:</strong> {{ $pelicula->duracion }}</p>
            <p><strong>Preu:</strong> {{ $pelicula->preu }} €</p>
            <p><strong>Actores:</strong></p>
            <ul>
                @foreach($pelicula->actores as $actor)
                    <li>{{ $actor->nombre }}</li>
                @endforeach
            </ul>
            <a href="/peliculas" class="btn btn-secondary">Tornar</a>
        </div>
    </div>
</div>