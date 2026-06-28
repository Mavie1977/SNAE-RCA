@extends('layouts.v7')
@section('content')
<main class="container">
<h1>Paiement du service</h1>
<form method="POST" action="{{ route('payments.store', $demandeId) }}">
@csrf
<label>Montant</label><br>
<input name="montant" value="1000"><br><br>
<label>Moyen de paiement</label><br>
<select name="moyen_paiement">
<option>Mobile Money</option><option>Carte bancaire</option><option>Paiement au guichet</option><option>Virement bancaire</option>
</select><br><br>
<button>Valider le paiement</button>
</form>
</main>
@endsection
