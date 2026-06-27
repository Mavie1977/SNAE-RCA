@extends('layouts.snae')
@section('content')
<h1>Tableau de bord agent</h1><div class='cards'><div class='card'><h3>Demandes</h3><p>{{ $demandesCount }}</p></div><div class='card'><h3>En attente</h3><p>{{ $attenteCount }}</p></div></div><a class='btn' href='{{ route('agent.demandes') }}'>Demandes</a>
@endsection
