@extends('layouts.snae')
@section('content')
<h1>Services publics</h1><table><tr><th>Ministère</th><th>Service</th><th>Délai</th></tr>@foreach($services as $s)<tr><td>{{ $s->ministere->nom }}</td><td>{{ $s->nom }}</td><td>{{ $s->delai_traitement }}</td></tr>@endforeach</table>{{ $services->links() }}
@endsection
