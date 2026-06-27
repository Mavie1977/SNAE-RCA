@extends('layouts.snae')
@section('content')
<h1>Mes demandes</h1><table><tr><th>N°</th><th>Service</th><th>Objet</th><th>Statut</th></tr>@foreach($demandes as $d)<tr><td>{{ $d->numero_dossier }}</td><td>{{ $d->servicePublic->nom }}</td><td>{{ $d->objet }}</td><td>{{ $d->statut }}</td></tr>@endforeach</table>{{ $demandes->links() }}
@endsection
