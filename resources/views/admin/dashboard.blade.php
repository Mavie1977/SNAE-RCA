@extends('layouts.snae')
@section('content')
<h1>Tableau de bord national</h1><div class='cards'><div class='card'><h3>Citoyens</h3><p>{{ $citoyensCount }}</p></div><div class='card'><h3>Ministères</h3><p>{{ $ministeresCount }}</p></div><div class='card'><h3>Services</h3><p>{{ $servicesCount }}</p></div><div class='card'><h3>Demandes</h3><p>{{ $demandesCount }}</p></div></div><p><a class='btn' href='{{ route('admin.ministeres') }}'>Ministères</a> <a class='btn' href='{{ route('admin.services') }}'>Services</a> <a class='btn' href='{{ route('admin.demandes') }}'>Demandes</a></p>
@endsection
