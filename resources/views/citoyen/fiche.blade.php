@extends('layouts.snae')

@section('content')
<div class="print-header">
    <h2>République Centrafricaine</h2>
    <p>Fiche citoyen - SNAE-RCA</p>
</div>

<button class="btn" onclick="window.print()">Imprimer la fiche</button>

<h1>Fiche citoyen</h1>

<table>
    <tr><th>NNI</th><td>{{ $citoyen->nni }}</td></tr>
    <tr><th>Nom</th><td>{{ $citoyen->nom }}</td></tr>
    <tr><th>Prénom</th><td>{{ $citoyen->prenom }}</td></tr>
    <tr><th>Sexe</th><td>{{ $citoyen->sexe }}</td></tr>
    <tr><th>Date de naissance</th><td>{{ $citoyen->date_naissance }}</td></tr>
    <tr><th>Lieu de naissance</th><td>{{ $citoyen->lieu_naissance }}</td></tr>
    <tr><th>Nationalité</th><td>{{ $citoyen->nationalite }}</td></tr>
    <tr><th>Téléphone</th><td>{{ $citoyen->telephone }}</td></tr>
    <tr><th>Email</th><td>{{ $citoyen->email }}</td></tr>
    <tr><th>Adresse</th><td>{{ $citoyen->adresse }}</td></tr>
</table>
@endsection