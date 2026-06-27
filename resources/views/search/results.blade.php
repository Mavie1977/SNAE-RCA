@extends('layouts.snae')
@section('content')
<h1>Recherche rapide</h1><form><input name='q' value='{{ $q }}'><button>Rechercher</button></form>@if($q)<h2>Citoyens</h2><table>@foreach($citoyens as $c)<tr><td>{{ $c->nni }}</td><td>{{ $c->nom }} {{ $c->prenom }}</td></tr>@endforeach</table><h2>Agents</h2><table>@foreach($agents as $a)<tr><td>{{ $a->matricule }}</td><td>{{ $a->nom }}</td></tr>@endforeach</table><h2>Demandes</h2><table>@foreach($demandes as $d)<tr><td>{{ $d->numero_dossier }}</td><td>{{ $d->objet }}</td></tr>@endforeach</table>@endif
@endsection
