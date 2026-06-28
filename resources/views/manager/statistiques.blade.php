@extends('layouts.v7')
@section('content')
<main class="container">
<h1>Statistiques manager</h1>
<table class="table">
<tr><th>Période</th><th>Reçues</th><th>Traitées</th><th>Retard</th><th>Recettes</th></tr>
@foreach($indicateurs as $i)
<tr>
<td>{{ $i->periode }}</td>
<td>{{ $i->demandes_recues }}</td>
<td>{{ $i->demandes_traitees }}</td>
<td>{{ $i->demandes_retard }}</td>
<td>{{ number_format($i->recettes,0,',',' ') }} FCFA</td>
</tr>
@endforeach
</table>
</main>
@endsection
