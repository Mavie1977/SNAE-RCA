@extends('layouts.snae')
@section('content')
<h1>Mon profil</h1><p>{{ $citoyen->nom }} {{ $citoyen->prenom }} - {{ $citoyen->nni }}</p>
@endsection
