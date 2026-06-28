<<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SNAE-RCA</title>

<style>
*{box-sizing:border-box}
body{margin:0;font-family:Arial,sans-serif;background:#f4f6f8;color:#17202a}
.topbar{background:#064635;color:white;padding:14px 24px;display:flex;align-items:center;gap:18px;flex-wrap:wrap}
.logo{font-size:22px;font-weight:bold;color:white;text-decoration:none}
.nav{display:flex;gap:10px;align-items:center;flex-wrap:wrap}
.nav a,.nav button,.btn{background:#0b5d46;color:white!important;border:0;border-radius:7px;padding:9px 13px;text-decoration:none;font-weight:bold;cursor:pointer}
.search-form{display:flex;gap:6px;flex:1;min-width:260px}
.search-form input{flex:1;padding:10px;border:1px solid #cbd5e1;border-radius:7px}
.user-info{margin-left:auto;font-weight:bold}
.container{max-width:1200px;margin:28px auto;background:white;padding:28px;border-radius:14px;box-shadow:0 8px 24px rgba(0,0,0,.08)}
.cards{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;margin:20px 0}
.card,.module{border:1px solid #e2e8f0;border-radius:12px;padding:22px;background:#fff}
.card h3,.module h2{color:#064635;margin-top:0}
.card p{font-size:28px;font-weight:bold;margin:8px 0}
.grid{display:grid;grid-template-columns:repeat(3,1fr);gap:22px;margin-top:28px}
table{width:100%;border-collapse:collapse;margin-top:18px}
th,td{border:1px solid #ddd;padding:10px;text-align:left}
th{background:#f1f5f9}
input,select,textarea{padding:10px;border:1px solid #cbd5e1;border-radius:7px}
.home-box{min-height:calc(100vh - 70px);background:#064635;padding:70px 25px}
.home-card{max-width:1100px;margin:auto;background:white;border-radius:18px;padding:42px}
.home-title{text-align:center;color:#064635;font-size:38px}
.home-subtitle{text-align:center;color:#55627a;font-size:18px}
@media(max-width:900px){.cards,.grid{grid-template-columns:1fr}.topbar{display:block}.search-form{margin:12px 0}.user-info{margin:10px 0}}
</style>
</head>

<body>
<header class="topbar">
    <a class="logo" href="{{ route('home') }}">SNAE-RCA</a>

    <nav class="nav">
        <a href="{{ route('home') }}">Accueil</a>

        @if(session('role') === 'admin')
            <a href="{{ route('admin.dashboard') }}">Tableau de bord</a>
        @endif

        @if(session('role') === 'citoyen')
            <a href="{{ route('citoyen.dashboard') }}">Mon espace</a>
        @endif

        @if(session('role') === 'agent_public')
            <a href="{{ route('agent.dashboard') }}">Espace agent</a>
        @endif
    </nav>

    @if(session('user_id'))
        <form class="search-form" method="GET" action="{{ route('search') }}">
            <input name="q" placeholder="Recherche rapide..." value="{{ request('q') }}">
            <button type="submit">Rechercher</button>
        </form>

        <div class="user-info">
            {{ session('name') }} - {{ session('role') }}
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Déconnexion</button>
        </form>
    @else
        <nav class="nav">
            <a href="{{ route('login') }}">Connexion</a>
            <a href="{{ route('register') }}">Créer un compte</a>
        </nav>
    @endif
</header>

@if(request()->routeIs('home'))
    @yield('content')
@else
    <main class="container">
        @yield('content')
    </main>
@endif

</body>
</html>