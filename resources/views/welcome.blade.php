@extends('layouts.snae')

@section('content')
<section class="theme-home">
    <div class="theme-head">
        <p>PARTICULIERS</p>
        <h1>VOS DÉMARCHES PAR THÈME</h1>
    </div>

    <div class="theme-grid">
        @php
            $themes = [
                ['📋','PAPIER', ['État civil','Nationalité et identité','Légalisation, authentification']],
                ['🎓','ÉDUCATION - FORMATION', ['Enseignement supérieur','Enseignement technique','Bourses et diplômes']],
                ['🏥','SANTÉ - PROTECTION SOCIALE', ['Documents médicaux','Santé et hôpitaux','Protection sociale']],
                ['⚖️','JUSTICE', ['Casier judiciaire','Procédures','Certificats judiciaires']],
                ['🚗','TRANSPORTS', ['Permis de conduire','Carte grise','Contrôle technique']],
                ['🏠','LOGEMENT - HABITAT', ['Questions foncières','Location et achat','Urbanisme']],
                ['💼','PRODUITS ET SERVICES', ['Commerce','Entreprise','Poste en ligne']],
                ['🏛️','ADMINISTRATION', ['Fonction publique','Agents publics','Ministères']],
            ];
        @endphp

        @foreach($themes as $theme)
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
</section>
@endsection