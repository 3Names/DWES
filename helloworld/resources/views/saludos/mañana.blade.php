<body style="background-color: lightcyan;">
<h1>🌞 {{ $text_salutacio }}</h1>
<p>Benvingut al sistema. Són les {{ $hora_actual }}.</p>

@if($es_mati)
    <p>Recorda fer un bon cafè!</p>
@endif
</body>
