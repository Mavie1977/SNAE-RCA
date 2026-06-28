@extends('layouts.snae')

@section('content')
<div class="print-header">
    <h2>République Centrafricaine</h2>
    <p>Fiche agent public - SNAE-RCA</p>
</div>

<button class="btn" onclick="window.print()">Imprimer la fiche</button>

<h1>Fiche agent public</h1>

@if($agent)
<table>
    <tr><th>Matricule</th><td>{{ $agent->matricule }}</td></tr>
    <tr><th>Nom</th><td>{{ $agent->nom }}</td></tr>
    <tr><th>Prénom</th><td>{{ $agent->prenom }}</td></tr>
    <tr><th>Sexe</th><td>{{ $agent->sexe }}</td></tr>
    <tr><th>Ministère</th><td>{{ $agent->ministere }}</td></tr>
    <tr><th>Direction</th><td>{{ $agent->direction }}</td></tr>
    <tr><th>Service</th><td>{{ $agent->service }}</td></tr>
    <tr><th>Grade</th><td>{{ $agent->grade }}</td></tr>
    <tr><th>Échelon</th><td>{{ $agent->echelon }}</td></tr>
    <tr><th>Date recrutement</th><td>{{ $agent->date_recrutement }}</td></tr>
    <tr><th>Statut</th><td>{{ $agent->statut }}</td></tr>
</table>
@else
<p>Aucune fiche agent trouvée pour ce compte.</p>
@endif
@endsection