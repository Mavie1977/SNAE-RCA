@extends('layouts.snae')

@section('content')
<div style="min-height:100vh;background:#064635;padding:80px 40px;">
    <div style="max-width:1100px;margin:auto;background:white;border-radius:18px;padding:42px;">
        <h1 style="text-align:center;color:#064635;font-size:38px;">SNAE-RCA</h1>
        <p style="text-align:center;color:#55627a;font-size:18px;">
            Système National d'Administration Électronique - 11 ministères connectés
        </p>

        <div class="grid">
            <div class="module">
                <h2>👤 Espace Citoyen</h2>
                <p>Créez votre compte personnel, déposez une demande et suivez vos dossiers.</p>
                <a class="btn" href="{{ route('register') }}">Créer un compte</a>
                <a class="btn btn-secondary" href="{{ route('login') }}">Connexion</a>
            </div>

            <div class="module">
                <h2>🏛️ Espace Agent Public</h2>
                <p>Traitez les demandes relevant de votre ministère ou service.</p>
                <a class="btn" href="{{ route('login') }}">Connexion agent</a>
            </div>

            <div class="module">
                <h2>⚙️ Administration</h2>
                <p>Supervision nationale, gestion des rôles, utilisateurs et audit.</p>
                <a class="btn" href="{{ route('login') }}">Connexion admin</a>
            </div>
        </div>
    </div>
</div>
@endsection