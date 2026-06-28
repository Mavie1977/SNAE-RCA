@extends('layouts.v7')
@section('content')
<main class="container">
<h1>{{ $demarche->nom }}</h1>
<p>{{ $demarche->description }}</p>
<table class="table">
<tr><th>Délai</th><td>{{ $demarche->delai_traitement }}</td></tr>
<tr><th>Coût</th><td>{{ number_format($demarche->cout,0,',',' ') }} FCFA</td></tr>
<tr><th>Paiement</th><td>{{ $demarche->paiement_obligatoire ? 'Obligatoire' : 'Non obligatoire' }}</td></tr>
</table>
<form method="POST" action="{{ route('demarches.store', $demarche) }}">
@csrf
<br><button>Démarrer la demande</button>
</form>
</main>
@endsection
