
<div class="print-header">
    <h2>République Centrafricaine</h2>
    <p>Système National d'Administration Électronique - SNAE-RCA</p>
</div>

<button class="btn" onclick="window.print()">Imprimer</button>
@extends('layouts.snae')
@section('content')
<h1>Tableau de bord agent</h1><div class='cards'><div class='card'><h3>Demandes</h3><p>{{ $demandesCount }}</p></div><div class='card'><h3>En attente</h3><p>{{ $attenteCount }}</p></div></div><a class='btn' href='{{ route('agent.demandes') }}'>Demandes</a>
@endsection
<a class="btn" href="{{ route('citoyen.fiche') }}">Imprimer ma fiche</a>