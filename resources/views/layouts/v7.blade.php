<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PNAE-RCA</title>
<style>
*{box-sizing:border-box}
body{margin:0;font-family:Arial,sans-serif;background:#f4f6f8;color:#17202a}
.header{background:#064635;color:white;padding:16px 28px;display:flex;gap:16px;align-items:center;flex-wrap:wrap}
.logo{font-size:22px;font-weight:bold;color:white;text-decoration:none}
.nav a,.btn,button{background:#0b5d46;color:white!important;border:0;border-radius:8px;padding:10px 14px;text-decoration:none;font-weight:bold}
.container{max-width:1200px;margin:28px auto;background:white;border-radius:14px;padding:28px;box-shadow:0 8px 24px #0001}
.hero{background:#064635;color:white;padding:60px 30px;text-align:center}
.theme-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:24px}
.theme-card{background:white;border:1px solid #ddd;border-radius:12px;padding:24px;min-height:240px;box-shadow:0 4px 12px #0002}
.theme-icon{font-size:58px;text-align:center}
.theme-card h2{color:#f07f2f;font-size:22px}
.table{width:100%;border-collapse:collapse}.table th,.table td{border:1px solid #ddd;padding:10px}.table th{background:#f1f5f9}
.cards{display:grid;grid-template-columns:repeat(4,1fr);gap:16px}.card{background:#f8fafc;border-left:5px solid #064635;padding:18px;border-radius:10px}
@media(max-width:900px){.theme-grid,.cards{grid-template-columns:1fr}}
</style>
</head>
<body>
<header class="header">
<a class="logo" href="{{ route('portal.home') }}">PNAE-RCA</a>
<nav class="nav">
<a href="{{ route('themes.index') }}">Démarches</a>
<a href="{{ route('portal.home') }}">Accueil</a>
</nav>
</header>
@yield('content')
</body>
</html>
