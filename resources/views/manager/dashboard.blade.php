@extends('layouts.v7')
@section('content')
<main class="container">
<h1>Tableau de bord manager</h1>
<div class="cards">
<div class="card"><h3>Paiements</h3><p>{{ $paiements }}</p></div>
<div class="card"><h3>Recettes</h3><p>{{ number_format($recettes,0,',',' ') }} FCFA</p></div>
<div class="card"><h3>Retards</h3><p>0</p></div>
<div class="card"><h3>Délai moyen</h3><p>0 j</p></div>
</div>
<a class="btn" href="{{ route('manager.stats') }}">Voir statistiques</a>
</main>
@endsection
