@extends('layouts.snae')

@section('content')
<style>
.theme-home{background:#eee;min-height:100vh;padding:50px 20px}
.theme-wrap{max-width:1200px;margin:auto}
.theme-head{text-align:left;margin-bottom:35px}
.theme-head p{color:#555;font-size:24px;font-weight:bold;margin:0 0 10px}
.theme-head h1{color:#064635;font-size:42px;margin:0;font-weight:900}
.theme-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:28px}
.theme-card{background:white;padding:28px 24px;min-height:285px;box-shadow:0 4px 12px #0002;border-radius:2px}
.theme-icon{text-align:center;font-size:64px;margin-bottom:18px}
.theme-card h2{color:#f07f2f;font-size:23px;text-transform:uppercase;margin:0 0 20px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.theme-card ul{font-size:19px;color:#666;line-height:1.5;padding-left:20px;margin:0 0 20px}
.theme-card a{display:block;text-align:right;color:#064635;font-size:22px;font-weight:bold;text-decoration:none}
@media(max-width:1000px){.theme-grid{grid-template-columns:repeat(2,1fr)}}
@media(max-width:600px){.theme-grid{grid-template-columns:repeat(2,1fr);gap:16px}.theme-home{padding:25px 12px}.theme-card{padding:18px 14px}.theme-head h1{font-size:30px}.theme-card h2{font-size:18px}.theme-card ul{font-size:15px}.theme-icon{font-size:48px}}
</style>

<section class="theme-home">
    <div class="theme-wrap">
        <div class="theme-head">
            <h1>VOS DÉMARCHES EN LIGNE</h1>
        </div>

        <div class="theme-grid">
            @foreach([
                ['📋','PAPIER',['État civil','Nationalité et identité','Légalisation']],
                ['🎓','ÉDUCATION',['Enseignement supérieur','Bourses','Diplômes']],
                ['🏥','SANTÉ',['Documents médicaux','Hôpitaux','Protection sociale']],
                ['⚖️','JUSTICE',['Casier judiciaire','Procédures','Certificats']],
                ['🚗','TRANSPORTS',['Permis de conduire','Carte grise','Contrôle technique']],
                ['🏠','LOGEMENT',['Questions foncières','Urbanisme','Habitat']],
                ['💼','SERVICES',['Commerce','Entreprise','Poste en ligne']],
                ['🏛️','ADMINISTRATION',['Fonction publique','Agents publics','Ministères']],
            ] as $theme)
                <div class="theme-card">
                    <div class="theme-icon">{{ $theme[0] }}</div>
                    <h2>{{ $theme[1] }}</h2>
                    <ul>
                        @foreach($theme[2] as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                    <a href="{{ route('login') }}">[+] voir plus</a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection