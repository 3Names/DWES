<div class="container mt-5">
    <h1>{{ $llibre->titol }}</h1>
    <div class="row">
        <div class="col-md-4">
            @if($llibre->imatge)
                <img src="{{ asset('portades/' . $llibre->imatge) }}" class="img-fluid rounded">
            @else
                <img src="https://via.placeholder.com/300x400" class="img-fluid">
            @endif
        </div>
        <div class="col-md-8">
            <p><strong>ISBN:</strong> {{ $llibre->isbn }}</p>
            <p><strong>Pàgines:</strong> {{ $llibre->pagines }}</p>
            <p><strong>Preu:</strong> {{ $llibre->preu }} €</p>
            <a href="/llibres" class="btn btn-secondary">Tornar</a>
        </div>
    </div>
</div>