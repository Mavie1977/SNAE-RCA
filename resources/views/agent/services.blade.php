@extends('layouts.snae')
@section('content')
<h1>Services de mon ministère</h1><table>@foreach($services as $s)<tr><td>{{ $s->nom }}</td><td>{{ $s->delai_traitement }}</td></tr>@endforeach</table>
@endsection
