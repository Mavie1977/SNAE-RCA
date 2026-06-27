@extends('layouts.snae')
@section('content')
<h1>Demandes de mon ministère</h1><table><tr><th>N°</th><th>Citoyen</th><th>Service</th><th>Statut</th><th>Action</th></tr>@foreach($demandes as $d)<tr><td>{{ $d->numero_dossier }}</td><td>{{ $d->citoyen->nom }} {{ $d->citoyen->prenom }}</td><td>{{ $d->servicePublic->nom }}</td><td>{{ $d->statut }}</td><td><form method='POST' action='{{ route('agent.demandes.statut',$d) }}'>@csrf<select name='statut'><option>En attente</option><option>En cours</option><option>Traitée</option><option>Refusée</option></select><button>OK</button></form></td></tr>@endforeach</table>{{ $demandes->links() }}
@endsection
