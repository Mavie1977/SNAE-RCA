@extends('layouts.v7')
@section('content')
<main class="container">
<h1>{{ $theme->icone }} {{ $theme->nom }}</h1>
<p>{{ $theme->description }}</p>
<table class="table">
<tr><th>Démarche</th><th>Délai</th><th>Coût</th><th>Action</th></tr>
@foreach($theme->demarches as $d)
<tr>
<td>{{ $d->nom }}</td>
<td>{{ $d->delai_traitement }}</td>
<td>{{ number_format($d->cout,0,',',' ') }} FCFA</td>
<td><a class="btn" href="{{ route('demarches.show', $d) }}">Faire une demande</a></td>
</tr>
@endforeach
</table>
</main>
@endsection
