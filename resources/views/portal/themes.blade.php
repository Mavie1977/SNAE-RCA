@extends('layouts.v7')
@section('content')
<main class="container">
<h1>Démarches par thème</h1>
<div class="theme-grid">
@foreach($themes as $theme)
<div class="theme-card">
<div class="theme-icon">{{ $theme->icone }}</div>
<h2>{{ $theme->nom }}</h2>
<p>{{ $theme->description }}</p>
<a class="btn" href="{{ route('themes.show', $theme) }}">Ouvrir</a>
</div>
@endforeach
</div>
</main>
@endsection
