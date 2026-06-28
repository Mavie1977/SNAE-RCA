
<div class="print-header">
    <h2>République Centrafricaine</h2>
    <p>Système National d'Administration Électronique - SNAE-RCA</p>
</div>

<button class="btn" onclick="window.print()">Imprimer</button>
@extends('layouts.snae')
@section('content')
<h1>Nouvelle demande</h1><form method='POST' action='{{ route('citoyen.demandes.store') }}'>@csrf<label>Service</label><select name='service_public_id'>@foreach($services as $s)<option value='{{ $s->id }}'>{{ $s->ministere->nom }} - {{ $s->nom }}</option>@endforeach</select><label>Objet</label><input name='objet'><label>Description</label><textarea name='description'></textarea><button>Envoyer</button></form>
@endsection
