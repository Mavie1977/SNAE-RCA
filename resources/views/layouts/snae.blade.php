<!doctype html><html lang="fr">
<head><meta charset="utf-8">
<title>SNAE-RCA</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])
<link rel="stylesheet" href="{{ asset('css/snae.css') }}">
</head>
<body><header class="topbar"><strong>SNAE-RCA</strong>

<a class="btn" href="{{ route('home') }}">Accueil</a>

@if(session('role') === 'admin')
    <a class="btn" href="{{ route('admin.dashboard') }}">Tableau de bord</a>
@endif

@if(session('role') === 'citoyen')
    <a class="btn" href="{{ route('citoyen.dashboard') }}">Mon espace</a>
@endif

@if(session('role') === 'agent_public')
    <a class="btn" href="{{ route('agent.dashboard') }}">Espace agent</a>
@endif

@if(session('user_id'))
<form class="search-form" method="GET" action="{{ route('search') }}"><input name="q" placeholder="Recherche rapide..." value="{{ request('q') }}"><button>Rechercher</button></form><span>{{ session('name') }} - {{ session('role') }}</span><form method="POST" action="{{ route('logout') }}">@csrf<button>Déconnexion</button></form>@else<nav><a href="{{ route('login') }}">Connexion</a> <a href="{{ route('register') }}">Créer un compte</a></nav>@endif</header><main class="container">@if(session('success'))<div class="ok">{{ session('success') }}</div>@endif @yield('content')</main></body></html>
