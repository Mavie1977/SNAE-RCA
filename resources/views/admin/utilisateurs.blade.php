@extends('layouts.snae')
@section('content')
<h1>Utilisateurs</h1><table><tr><th>Nom</th><th>Email</th><th>Rôle</th></tr>@foreach($users as $u)<tr><td>{{ $u->name }}</td><td>{{ $u->email }}</td><td>{{ $u->role }}</td></tr>@endforeach</table>{{ $users->links() }}
@endsection
