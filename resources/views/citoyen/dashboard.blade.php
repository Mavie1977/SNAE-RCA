@extends('layouts.snae')
@section('content')
<h1>Mon espace citoyen</h1><div class='cards'><div class='card'><h3>Mes demandes</h3><p>{{ $demandesCount }}</p></div><div class='card'><h3>Traitées</h3><p>{{ $traiteesCount }}</p></div><div class='card'><h3>NNI</h3><p style='font-size:18px'>{{ $citoyen->nni }}</p></div></div><a class='btn' href='{{ route('citoyen.demandes.create') }}'>Nouvelle demande</a> <a class='btn' href='{{ route('citoyen.demandes') }}'>Mes demandes</a>
@endsection
