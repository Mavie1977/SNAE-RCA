@extends('layouts.snae')
@section('content')
<h1>Ministères</h1><table><tr><th>Nom</th><th>Description</th><th>Services</th></tr>@foreach($ministeres as $m)<tr><td>{{ $m->nom }}</td><td>{{ $m->description }}</td><td>{{ $m->services_publics_count }}</td></tr>@endforeach</table>{{ $ministeres->links() }}
@endsection
