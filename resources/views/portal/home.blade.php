@extends('layouts.v7')
@section('content')
<section class="hero">
    <h1>SNAE-RCA V7 Enterprise</h1>
    <p>Portail national des démarches administratives en ligne</p>
</section>
<main class="container">
    <h2>Vos démarches par thème</h2>
    <div class="theme-grid">
        @foreach($themes as $theme)
            <div class="theme-card">
                <div class="theme-icon">{{ $theme->icone }}</div>
                <h2>{{ $theme->nom }}</h2>
                <p>{{ $theme->description }}</p>
                <p>{{ $theme->demarches_count }} démarches disponibles</p>
                <a class="btn" href="{{ route('themes.show', $theme) }}">Voir les démarches</a>
            </div>
        @endforeach
    </div>
</main>
@endsection
