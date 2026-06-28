
<div class="print-header">
    <h2>République Centrafricaine</h2>
    <p>Système National d'Administration Électronique - SNAE-RCA</p>
</div>

<button class="btn" onclick="window.print()">Imprimer</button>
@extends('layouts.snae')
@section('content')
<h1>Mon profil</h1><p>{{ $citoyen->nom }} {{ $citoyen->prenom }} - {{ $citoyen->nni }}</p>
@endsection
