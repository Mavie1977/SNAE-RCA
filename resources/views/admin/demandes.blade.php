@extends('layouts.snae')
@section('content')
<h1>Demandes</h1><table><tr><th>N°</th><th>Citoyen</th><th>Service</th><th>Statut</th></tr>@foreach($demandes as $d)<tr><td>{{ $d->numero_dossier }}</td><td>{{ $d->citoyen->nom }} {{ $d->citoyen->prenom }}</td><td>{{ $d->servicePublic->nom }}</td><td>{{ $d->statut }}</td></tr>@endforeach</table>{{ $demandes->links() }}
@endsection
