<div class="container mt-5">
    <h1>{{ $actor->nombre }}</h1>
    <div class="row">
        <div class="col-md-8">
            <p><strong>DNI:</strong> {{ $actor->dni }}</p>
            <p><strong>Hobby:</strong> {{ $actor->hobby }}</p>
            <p><strong>Edad:</strong> {{ $actor->edad }}</p>
            <a href="/actores" class="btn btn-secondary">Tornar</a>
        </div>
    </div>
</div>