<div class="print-header">
    <h2>République Centrafricaine</h2>
    <p>Système National d'Administration Électronique - SNAE-RCA</p>
</div>

<button class="btn" onclick="window.print()">Imprimer</button>

@extends('layouts.snae')
@section('content')
<h1>Services de mon ministère</h1><table>@foreach($services as $s)<tr><td>{{ $s->nom }}</td><td>{{ $s->delai_traitement }}</td></tr>@endforeach</table>
@endsection
