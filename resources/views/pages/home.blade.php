@extends('layouts.app')
@section('title', 'CREFER - Formation en Énergies Renouvelables')
@section('description', 'Formations professionnelles en électrotechnique, CAP électricité, BT électrotechnique et formations modulaires.')

@section('content')
@php
    $hero      = $content['hero']     ?? [];
    $stats     = $content['stats']    ?? [];
    $infobox   = $content['infobox']  ?? [];
    $story     = $content['story']    ?? [];
    $programs  = $content['programs'] ?? [];
    $whyus     = $content['whyus']    ?? [];
    $bg        = !empty($hero['backgroundImage']) ? $hero['backgroundImage'] : '/images/CHANTIER.jpg';
@endphp

{{-- Hero --}}
<section class="relative min-h-screen text-white flex items-center overflow-hidden bg-cover bg-center transition-all duration-1000"
         style="background-image: url('{{ $bg }}')">
    <div class="absolute inset-0 bg-black/55 z-10"></div>
    <div class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 pt-24 sm:pt-32 md:pt-20 lg:py-0 pb-12 lg:pb-0 relative z-20">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="text-white animate-fade-in-up">
                <div class="mb-6 inline-block animate-fade-in-up delay-100">
                    <span class="text-yellow-500 text-sm font-semibold tracking-widest uppercase">Bienvenue à CREFER</span>
                </div>
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold mb-6 leading-tight animate-fade-in-up delay-200" style="font-family:'Montserrat',sans-serif;letter-spacing:-0.5px;">
                    {{ $hero['titleMain'] ?? 'Formez-vous aux' }}<br/>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-500 to-yellow-400">{{ $hero['titleHighlight'] ?? 'Énergies Renouvelables' }}</span>
                </h1>
                <p class="text-xl lg:text-2xl text-blue-100 mb-8 leading-relaxed max-w-lg animate-fade-in-up delay-300">
                    {{ $hero['subtitle'] ?? 'Devenez expert en installation solaire et électrotechnique' }}
                </p>
                <div class="flex flex-col sm:flex-row gap-4 mb-12 animate-fade-in-up delay-400">
                    <a href="{{ route('admissions') }}" class="btn-modern px-8 py-4 bg-gradient-to-r from-amber-400 to-amber-500 text-white rounded-full hover:shadow-2xl font-bold text-lg text-center">
                        {{ $hero['cta1'] ?? 'Candidater maintenant' }}
                    </a>
                    <a href="{{ route('programmes') }}" class="btn-modern px-8 py-4 border-2 border-white text-white rounded-full hover:bg-white/10 backdrop-blur font-bold text-lg text-center transition-all">
                        {{ $hero['cta2'] ?? 'Nos programmes' }}
                    </a>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-sm animate-fade-in-up delay-500">
                    @foreach(['badge1'=>'Formation certifiante','badge2'=>'Stage garanti','badge3'=>'Emploi assuré'] as $key => $default)
                    <div class="flex items-center gap-3 bg-white/10 backdrop-blur px-4 py-3 rounded-full">
                        <svg class="w-5 h-5 text-yellow-300 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        <span class="text-white font-medium">{{ $hero[$key] ?? $default }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="hidden lg:block"></div>
        </div>
    </div>
</section>

{{-- Statistiques + Vidéo/Infobox --}}
<section class="section-spacing bg-gradient-to-b from-blue-50 via-cyan-50 to-blue-50 scroll-animate">
    <div class="max-w-7xl mx-auto">
        <div class="grid md:grid-cols-4 gap-8 mb-20">
            @foreach([['formesCount','1500','Jeunes Formés','yellow'],['emploiCount','850','En emploi','blue'],['partnersCount','30','Entreprises Partenaires','green'],['certifiesCount','3','Programmes Certifiants','purple']] as [$key,$def,$label,$color])
            <div class="card-modern p-8 text-center group animate-fade-in-up">
                <div class="text-6xl font-bold bg-gradient-to-r from-{{ $color }}-400 to-{{ $color }}-500 bg-clip-text text-transparent mb-3" style="font-family:'Montserrat',sans-serif;">
                    +{{ $stats[$key] ?? $def }}
                </div>
                <p class="text-gray-600 font-semibold text-lg">{{ $label }}</p>
            </div>
            @endforeach
        </div>

        <div class="grid lg:grid-cols-2 gap-8">
            {{-- Vidéo --}}
            <div class="relative bg-white rounded-3xl overflow-hidden shadow-2xl card-modern group animate-scale-up">
                @if($video && $video->youtube_id)
                <iframe src="https://www.youtube.com/embed/{{ $video->youtube_id }}"
                        class="w-full h-96" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                @else
                <div class="w-full h-96 bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                    <p class="text-gray-500">Vidéo bientôt disponible</p>
                </div>
                @endif
                <div class="absolute top-6 right-6 bg-white/95 backdrop-blur px-6 py-3 rounded-full shadow-lg z-10 pointer-events-none">
                    <p class="text-sm font-bold text-blue-900">2024-2025</p>
                </div>
            </div>

            {{-- Infobox --}}
            <div class="card-modern rounded-3xl p-10 animate-slide-in-right">
                <div class="inline-block mb-4 px-4 py-2 bg-yellow-100 rounded-full">
                    <span class="text-sm font-bold text-yellow-600 uppercase tracking-wide">Nouvelle session</span>
                </div>
                <h3 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-8" style="font-family:'Montserrat',sans-serif;letter-spacing:-1px;">
                    {{ $infobox['title'] ?? 'Rejoignez la prochaine promotion' }}
                </h3>
                <div class="space-y-6 mb-10">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-xl flex items-center justify-center text-white">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 font-semibold uppercase tracking-wide">Durée du programme</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $infobox['duration'] ?? '12 mois' }}</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-500 rounded-xl flex items-center justify-center text-white">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 font-semibold uppercase tracking-wide">Démarrage</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $infobox['startDate'] ?? 'Septembre 2025' }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-to-r from-yellow-50 to-blue-50 rounded-2xl p-6 mb-8 border border-yellow-200/50">
                    <p class="text-sm text-gray-600 font-semibold uppercase tracking-wide mb-2">Reconnaissance</p>
                    <p class="text-xl font-bold text-blue-900">{{ $infobox['recognition'] ?? 'Reconnu par l\'État togolais' }}</p>
                </div>
                <a href="{{ route('admissions') }}" class="btn-modern block text-center w-full px-8 py-4 bg-gradient-to-r from-yellow-400 to-yellow-500 text-white rounded-xl hover:shadow-2xl font-bold text-lg">
                    Candidater Maintenant
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Notre Histoire --}}
<section class="section-spacing bg-gray-50 scroll-animate">
    <div class="max-w-7xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="order-2 lg:order-1 animate-slide-in-left">
                <div class="relative">
                    <div class="absolute -inset-4 bg-gradient-to-r from-yellow-400 to-blue-500 rounded-3xl opacity-10 blur-2xl"></div>
                    <img src="{{ $story['image'] ?? '/images/CHANTIER2.jpg' }}" alt="Notre Histoire CREFER" loading="lazy"
                         class="w-full rounded-3xl shadow-2xl relative z-10 object-cover" />
                </div>
            </div>
            <div class="order-1 lg:order-2 animate-slide-in-right">
                <div class="inline-block mb-4 px-4 py-2 bg-yellow-100 rounded-full">
                    <span class="text-sm font-bold text-yellow-600 uppercase tracking-wide">Notre Histoire</span>
                </div>
                <h2 class="text-5xl lg:text-6xl font-bold text-gray-900 mb-8" style="font-family:'Montserrat',sans-serif;letter-spacing:-1.5px;">
                    {{ $story['title'] ?? 'Notre Histoire' }}
                </h2>
                <p class="text-2xl lg:text-3xl font-bold text-yellow-600 mb-6 leading-tight">"{{ $story['quote'] ?? 'Former pour transformer' }}"</p>
                <div class="space-y-6 mb-8">
                    <p class="text-lg text-gray-700 leading-relaxed font-light">{{ $story['text1'] ?? '' }}</p>
                    <div class="pl-6 border-l-4 border-yellow-400">
                        <p class="text-lg text-gray-700 leading-relaxed font-light">{{ $story['text2'] ?? '' }}</p>
                    </div>
                </div>
                <a href="{{ route('about') }}" class="btn-modern inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-yellow-400 to-yellow-500 text-white rounded-xl hover:shadow-2xl font-bold text-lg">
                    Découvrir notre histoire
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Programmes --}}
<section class="section-spacing bg-gradient-to-b from-white via-gray-50 to-white scroll-animate">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-fade-in-up">
            <span class="inline-block text-yellow-600 text-sm font-bold tracking-widest uppercase px-4 py-2 bg-yellow-100 rounded-full mb-4">Nos Programmes</span>
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mt-4 mb-6" style="font-family:'Montserrat',sans-serif;">Programmes d'études</h2>
            <div class="flex justify-center mb-6"><div class="w-20 h-1 bg-gradient-to-r from-yellow-400 to-yellow-600 rounded-full"></div></div>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">Découvrez notre offre de formation complète adaptée à vos ambitions professionnelles</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            @php
                $progs = [
                    ['p1','blue','cap','Niveau 1'],
                    ['p2','yellow','bt','Niveau 2'],
                    ['p3','green','modulaire','Flexible'],
                ];
            @endphp
            @foreach($progs as [$key, $color, $route, $badge])
            @php $p = $programs[$key] ?? []; @endphp
            <div class="card-modern relative p-8 rounded-2xl bg-white border-2 border-{{ $color }}-100 hover:border-{{ $color }}-400 group animate-fade-in-up transition-all shadow-lg hover:shadow-2xl overflow-hidden">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-{{ $color }}-400 to-{{ $color }}-400"></div>
                <div class="absolute top-4 right-4 px-3 py-1 bg-{{ $color }}-100 rounded-full text-xs font-bold text-{{ $color }}-700">{{ $badge }}</div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3 mt-4">{{ $p['title'] ?? '' }}</h3>
                <p class="text-gray-600 mb-6 leading-relaxed text-sm">{{ $p['desc'] ?? '' }}</p>
                <div class="space-y-2 mb-6 pb-6 border-b-2 border-{{ $color }}-100">
                    <div class="flex items-center gap-2 text-gray-700 text-sm"><span class="text-{{ $color }}-500 font-bold">⏱</span><span>Durée: {{ $p['duration'] ?? '' }}</span></div>
                    <div class="flex items-center gap-2 text-gray-700 text-sm"><span class="text-{{ $color }}-500 font-bold">📊</span><span>{{ $p['diploma'] ?? '' }}</span></div>
                </div>
                <ul class="space-y-2 mb-6">
                    @foreach(['feat1','feat2','feat3'] as $feat)
                    @if(!empty($p[$feat]))
                    <li class="flex items-start gap-2 text-gray-700 text-sm">
                        <svg class="w-5 h-5 text-{{ $color }}-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        <span>{{ $p[$feat] }}</span>
                    </li>
                    @endif
                    @endforeach
                </ul>
                <a href="{{ route($route) }}" class="w-full block text-center px-6 py-3 bg-gradient-to-r from-{{ $color }}-500 to-{{ $color }}-500 text-white font-semibold rounded-xl hover:shadow-lg transition-all">
                    Découvrir le programme
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Pourquoi CREFER --}}
<section class="section-spacing bg-gradient-to-b from-yellow-50 to-amber-50 scroll-animate">
    <div class="max-w-7xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-16 items-start">
            <div class="animate-slide-in-left">
                <div class="inline-block mb-4 px-4 py-2 bg-yellow-100 rounded-full">
                    <span class="text-sm font-bold text-yellow-600 uppercase tracking-wide">Pourquoi choisir CREFER?</span>
                </div>
                <h2 class="text-5xl lg:text-6xl font-bold text-gray-900 mb-8 leading-tight" style="font-family:'Montserrat',sans-serif;letter-spacing:-1.5px;">
                    {{ $whyus['heading'] ?? 'L\'excellence à votre service' }}
                </h2>
                <p class="text-xl text-gray-600 leading-relaxed mb-8 font-light">{{ $whyus['description'] ?? '' }}</p>
                <a href="{{ route('about') }}" class="btn-modern inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-xl font-bold text-lg hover:shadow-xl">
                    En savoir plus
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </a>
            </div>
            <div class="grid md:grid-cols-2 gap-6 animate-slide-in-right">
                @foreach([['feat1','yellow'],['feat2','blue'],['feat3','green'],['feat4','purple']] as [$feat,$color])
                <div class="card-modern p-8 group border-l-4 border-{{ $color }}-400">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $whyus[$feat.'Title'] ?? '' }}</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">{{ $whyus[$feat.'Text'] ?? '' }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- Partenaires --}}
<section class="section-spacing bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 scroll-animate">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16 animate-fade-in-up">
            <div class="inline-block mb-4 px-4 py-2 bg-green-100 rounded-full">
                <span class="text-sm font-bold text-green-600 uppercase tracking-wide">Partenariats</span>
            </div>
            <h2 class="text-5xl lg:text-6xl font-bold text-gray-900 mb-6" style="font-family:'Montserrat',sans-serif;letter-spacing:-1.5px;">
                Ils nous font<br/><span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-green-500">Confiance</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto font-light">
                Partenaires prestigieux qui reconnaissent notre excellence dans la formation aux énergies renouvelables.
            </p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach([
                ['egent-logo.0384ff91.jpg','EGENT'],
                ['part2.e6602420.png','Partenaire 2'],
                ['part3.fe0f87cf.jpg','Partenaire 3'],
                ['télécharger.jpg','Partenaire 4'],
            ] as [$logo, $alt])
            <div class="card-modern rounded-2xl h-32 flex items-center justify-center animate-fade-in-up hover:shadow-lg">
                <img src="/images/{{ $logo }}" alt="{{ $alt }}"
                     class="max-w-[10rem] h-16 object-contain opacity-80 hover:opacity-100 transition-opacity" />
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Actualités --}}
<section class="section-spacing bg-gradient-to-br from-yellow-50 via-rose-50 to-yellow-50 scroll-animate">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between mb-16 gap-8">
            <div class="animate-fade-in-up">
                <div class="inline-block mb-4 px-4 py-2 bg-yellow-100 rounded-full">
                    <span class="text-sm font-bold text-yellow-600 uppercase tracking-wide">Dernières actualités</span>
                </div>
                <h2 class="text-5xl lg:text-6xl font-bold text-gray-900 mb-4" style="font-family:'Montserrat',sans-serif;letter-spacing:-1.5px;">
                    Nos<br/><span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-yellow-600">Actualités</span>
                </h2>
            </div>
            <a href="{{ route('articles') }}" class="btn-modern px-8 py-4 bg-gradient-to-r from-yellow-400 to-yellow-500 text-white rounded-2xl font-bold text-lg inline-flex items-center gap-3 hover:shadow-lg transition-all">
                Voir plus
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($articles as $i => $article)
            @php $gradients = ['from-yellow-400 to-yellow-600','from-blue-400 to-blue-600','from-green-400 to-green-600']; @endphp
            <div class="card-modern rounded-3xl overflow-hidden animate-fade-in-up" style="animation-delay: {{ $i * 0.1 }}s;">
                <div class="relative h-48 bg-gradient-to-br {{ $gradients[$i % 3] }} overflow-hidden">
                    @if($article->main_image)
                    <img src="{{ $article->main_image }}" alt="{{ $article->title }}" class="w-full h-full object-cover opacity-90 hover:scale-110 transition-transform duration-500" />
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2" style="font-family:'Montserrat',sans-serif;">{{ $article->title }}</h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ $article->description }}</p>
                    <a href="{{ route('article.show', $article->id) }}" class="text-yellow-600 font-bold text-sm hover:text-yellow-700 flex items-center gap-2">
                        Lire l'article »
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/></svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Portes Ouvertes 2026 --}}
<section class="section-spacing bg-gradient-to-br from-yellow-50 via-white to-yellow-50 scroll-animate">
    <div class="max-w-7xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            {{-- Contenu texte --}}
            <div class="animate-fade-in-up order-2 lg:order-1">
                <div class="inline-block mb-6 px-4 py-2 bg-yellow-100 rounded-full">
                    <span class="text-sm font-bold text-yellow-700 uppercase tracking-wide">📅 13 Avril 2026</span>
                </div>
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-8" style="font-family:'Montserrat',sans-serif;letter-spacing:-1.5px;">
                    Portes Ouvertes<br/><span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-yellow-600">CREFER 2026</span>
                </h2>
                <p class="text-lg text-gray-700 mb-8 leading-relaxed">
                    Vous souhaitez maîtriser les métiers d'avenir à CREFER ? Profitez de la deuxième fixée au <span class="font-bold text-yellow-600">13 avril 2026</span>.
                </p>
                <div class="mb-10">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center gap-3">
                        <svg class="w-6 h-6 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M11.3 1.046A1 1 0 0010 2v5H4a2 2 0 00-2 2v5a2 2 0 002 2h5v5a1 1 0 001.823.567l2.94-7.86a1 1 0 00-.99-1.373H13V2a1 1 0 00-1.7-.954l-1 1.318z"/></svg>
                        Filières disponibles
                    </h3>
                    <div class="space-y-5">
                        <div class="bg-white/70 backdrop-blur rounded-xl p-6 border-l-4 border-yellow-400 hover:shadow-lg transition-all">
                            <h4 class="font-bold text-lg text-gray-900 mb-3">SPV (Système Photovoltaïque)</h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach(['Électricité','Énergie solaire','Biogaz','Plomberie*','Froid climatisation*'] as $tag)
                                <span class="inline-block px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm font-medium">{{ $tag }}</span>
                                @endforeach
                            </div>
                        </div>
                        <div class="bg-white/70 backdrop-blur rounded-xl p-6 border-l-4 border-yellow-600 hover:shadow-lg transition-all">
                            <h4 class="font-bold text-lg text-gray-900 mb-3">SST (Système de Sécurité &amp; Télécom)</h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach(['Réseau','Alarmes','Caméras surveillance','Antennes paraboliques'] as $tag)
                                <span class="inline-block px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm font-medium">{{ $tag }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-y-4 mb-8">
                    <div class="flex gap-4 items-start">
                        <svg class="w-6 h-6 text-yellow-500 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
                        <div><p class="font-bold text-gray-900">Lieu</p><p class="text-gray-700">L'annexe, situé au bord des pavés de Totsi non loin de l'agence Yas</p></div>
                    </div>
                    <div class="flex gap-4 items-start">
                        <svg class="w-6 h-6 text-yellow-500 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00-.293.707l-.707.707a1 1 0 101.414 1.414L9 9.414V6z" clip-rule="evenodd"/></svg>
                        <div><p class="font-bold text-gray-900">Horaires</p><p class="text-gray-700">Cours du jour et du soir disponibles</p></div>
                    </div>
                    <div class="flex gap-4 items-start">
                        <svg class="w-6 h-6 text-yellow-500 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/></svg>
                        <div><p class="font-bold text-gray-900">Durée</p><p class="text-gray-700">06 ou 12 mois</p></div>
                    </div>
                </div>
                <a href="{{ route('admissions') }}" class="btn-modern inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-yellow-400 to-yellow-600 text-gray-900 rounded-full font-bold text-lg hover:shadow-xl transition-all">
                    S'inscrire maintenant
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </a>
            </div>
            {{-- Image principale (lightbox Alpine) --}}
            <div class="animate-fade-in-up order-1 lg:order-2"
                 x-data="{ lightbox: false }">
                <div class="col-span-2 rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all cursor-pointer"
                     @click="lightbox = true">
                    <img src="/images/imageprin01.jpeg" alt="Portes ouvertes CREFER 2026"
                         class="w-full object-cover hover:scale-110 transition-transform duration-500"
                         style="aspect-ratio: 1 / 1.414;" />
                </div>
                {{-- Lightbox --}}
                <div x-show="lightbox" x-cloak
                     class="fixed inset-0 bg-black/95 z-50 flex items-center justify-center p-4"
                     @click="lightbox = false" @keydown.escape.window="lightbox = false">
                    <button @click="lightbox = false" class="absolute top-6 right-6 text-white hover:text-yellow-400 transition-colors z-60">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                    <div class="relative max-w-2xl w-full flex flex-col items-center" @click.stop>
                        <img src="/images/imageprin01.jpeg" alt="Portes Ouvertes" class="w-full h-auto rounded-lg object-contain" />
                        <p class="text-white text-center mt-4 text-sm">Appuyez sur ESC pour fermer</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Témoignages --}}
<section class="section-spacing bg-gradient-to-b from-amber-50 to-yellow-50 scroll-animate">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16 animate-fade-in-up">
            <div class="inline-block mb-4 px-4 py-2 bg-blue-100 rounded-full">
                <span class="text-sm font-bold text-blue-600 uppercase tracking-wide">Ils nous font confiance</span>
            </div>
            <h2 class="text-5xl lg:text-6xl font-bold text-gray-900 mb-6" style="font-family:'Montserrat',sans-serif;letter-spacing:-1.5px;">
                Témoignages de nos<br/><span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-yellow-500">Anciens Étudiants</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto font-light">
                Découvrez les success stories de nos étudiants qui ont transformé leur carrière chez CREFER.
            </p>
        </div>
        @php
        $stars = '<div class="flex gap-1 text-yellow-400">' . str_repeat('<svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>', 5) . '</div>';
        @endphp
        <div class="grid md:grid-cols-3 gap-8">
            {{-- Témoignage 1 --}}
            <div class="card-modern rounded-2xl p-8 flex flex-col animate-fade-in-up" style="animation-delay:0.1s;">
                <div class="flex gap-4 items-start mb-6">
                    <img src="/images/temois1.jpg" alt="MELA D'Kigma Solmba"
                         class="w-16 h-16 rounded-full object-cover ring-2 ring-yellow-400" />
                    <div class="flex-1">
                        <h3 class="text-lg font-bold text-gray-900">MELA D'Kigma Solmba</h3>
                        <p class="text-sm text-yellow-600 font-semibold">Alumni promotion 12</p>
                    </div>
                </div>
                <p class="text-gray-600 text-sm leading-relaxed flex-1 mb-4">
                    "{{ $content['testimonials']['t1Quote'] ?? 'Une formation exceptionnelle qui m\'a ouvert les portes du marché de l\'emploi dans les énergies renouvelables.' }}"
                </p>
                {!! $stars !!}
            </div>

            {{-- Témoignage 2 --}}
            <div class="card-modern rounded-2xl p-8 flex flex-col animate-fade-in-up" style="animation-delay:0.2s;"
                 x-data="{ expanded: false }">
                <div class="flex gap-4 items-start mb-6">
                    <img src="/images/temoins02.jpg" alt="YAO Amivi Emefa"
                         class="w-16 h-16 rounded-full object-cover ring-2 ring-blue-400" />
                    <div class="flex-1">
                        <h3 class="text-lg font-bold text-gray-900">YAO Amivi Emefa</h3>
                        <p class="text-sm text-blue-600 font-semibold">Alumni promotion 8</p>
                    </div>
                </div>
                <p class="text-gray-600 text-sm leading-relaxed flex-1 mb-4">
                    <span x-show="!expanded">"Je suis YAO Amivi Emefa, ancienne étudiante de la Promotion 8 de CREFER. Je travaille actuellement à la centrale solaire de Blitta..."</span>
                    <span x-show="expanded" x-cloak>"Je suis YAO Amivi Emefa, ancienne étudiante de la Promotion 8 de CREFER. Je travaille actuellement à la centrale solaire de Blitta. Je voudrais lancer un appel à toutes les jeunes filles : inscrivez-vous à CREFER, surtout en cette période où beaucoup se demandent « Que vais-je faire ? Où m'inscrire ? » Si j'ai pu trouver ma voie grâce à CREFER, vous le pouvez aussi. Je vous encourage vivement à rejoindre le programme Énergies Renouvelables et Électricité, une formation qui ouvre de réelles opportunités."</span>
                </p>
                <button @click="expanded = !expanded" class="text-blue-600 hover:text-blue-800 font-semibold text-sm mb-4 transition-colors text-left">
                    <span x-show="!expanded">Voir plus</span>
                    <span x-show="expanded" x-cloak>Voir moins</span>
                </button>
                {!! $stars !!}
            </div>

            {{-- Témoignage 3 --}}
            <div class="card-modern rounded-2xl p-8 flex flex-col animate-fade-in-up" style="animation-delay:0.3s;"
                 x-data="{ expanded: false }">
                <div class="flex gap-4 items-start mb-6">
                    <img src="/images/temoins3.jpg" alt="SOW Kerfala"
                         class="w-16 h-16 rounded-full object-cover ring-2 ring-green-400" />
                    <div class="flex-1">
                        <h3 class="text-lg font-bold text-gray-900">SOW Kerfala</h3>
                        <p class="text-sm text-green-600 font-semibold">Étudiant Promotion 13</p>
                    </div>
                </div>
                <p class="text-gray-600 text-sm leading-relaxed flex-1 mb-4">
                    <span x-show="!expanded">"Je suis Guinéen, au départ, j'étais venu simplement pour suivre les cours en énergie renouvelable..."</span>
                    <span x-show="expanded" x-cloak>"Je suis Guinéen, au départ, j'étais venu simplement pour suivre les cours en énergie renouvelable et me former dans ce domaine. Mais ce que j'ai réussi à accomplir aujourd'hui me donne une véritable perception de mon potentiel. Ce que j'apprends ici ne se limite plus seulement au énergie renouvelable: je veux suivre l'exemple de mes encadreurs, m'inspirer de leurs parcours et élargir mes compétences."</span>
                </p>
                <button @click="expanded = !expanded" class="text-blue-600 hover:text-blue-800 font-semibold text-sm mb-4 transition-colors text-left">
                    <span x-show="!expanded">Voir plus</span>
                    <span x-show="expanded" x-cloak>Voir moins</span>
                </button>
                {!! $stars !!}
            </div>
        </div>
    </div>
</section>

{{-- Prêt à nous rejoindre --}}
<section class="section-spacing bg-gradient-to-r from-yellow-600 to-white relative overflow-hidden scroll-animate">
    <div class="absolute top-0 right-0 w-96 h-96 bg-white/10 rounded-full blur-3xl -mr-48 -mt-48"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-white/10 rounded-full blur-3xl -ml-48 -mb-48"></div>
    <div class="max-w-6xl mx-auto relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="animate-slide-in-left">
                <div class="inline-block mb-6 px-4 py-2 bg-black/15 backdrop-blur-sm rounded-full border border-black/25">
                    <span class="text-sm font-bold text-gray-900 uppercase tracking-wide">Ton Avenir Démarre Ici</span>
                </div>
                <h2 class="text-6xl lg:text-7xl font-bold text-gray-900 mb-8 drop-shadow-lg" style="font-family:'Montserrat',sans-serif;letter-spacing:-1.5px;">
                    Prêt à nous Rejoindre ?
                </h2>
                <p class="text-xl text-gray-800 mb-10 leading-relaxed font-light drop-shadow-md">
                    Transforme ta carrière avec CREFER. Rejoins une communauté de plus de 5000 experts formés et propulse ton avenir dans les énergies renouvelables.
                </p>
                <div class="flex flex-col sm:flex-row gap-6 items-start">
                    <a href="{{ route('admissions') }}"
                       class="btn-modern px-10 py-4 bg-gradient-to-r from-yellow-600 to-yellow-700 text-white font-bold text-lg rounded-2xl hover:shadow-2xl transition-all hover:scale-105 inline-flex items-center gap-3 drop-shadow-lg">
                        Postuler Maintenant
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </a>
                    <a href="{{ route('contact') }}"
                       class="px-10 py-4 border-2 border-gray-900 text-gray-900 font-bold text-lg rounded-2xl hover:bg-gray-900/10 transition-all inline-flex items-center gap-3 bg-white/70 drop-shadow-md">
                        Plus d'Infos
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                    </a>
                </div>
            </div>
            <div class="animate-slide-in-right relative">
                <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                    <img src="/images/_DSC4676-1200.jpg" alt="Étudiants CREFER"
                         class="w-full object-cover object-center" style="height:28rem;" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                    <div class="absolute bottom-6 left-6 card-modern p-4 max-w-xs">
                        <p class="text-black/80 text-sm font-light mb-1">Taux de réussite</p>
                        <p class="text-black/80 text-3xl font-bold">95%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- About Section (3 cartes + 4 stats) --}}
<section class="section-spacing bg-gradient-to-b from-white via-slate-50 to-gray-100 relative overflow-hidden scroll-animate">
    <div class="absolute top-10 right-10 w-72 h-72 bg-blue-200/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-purple-200/20 rounded-full blur-3xl"></div>
    <div class="max-w-7xl mx-auto relative z-10">
        <div class="text-center mb-20 animate-fade-in-up">
            <div class="inline-flex items-center gap-2 mb-4 px-4 py-2 bg-gradient-to-r from-purple-100 to-blue-100 rounded-full border border-purple-200">
                <svg class="w-5 h-5 text-purple-600" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                <span class="text-sm font-bold text-purple-600 uppercase tracking-wide">À propos de CREFER</span>
            </div>
            <h2 class="text-5xl lg:text-7xl font-bold text-gray-900 mb-6" style="font-family:'Montserrat',sans-serif;letter-spacing:-1.5px;">
                Leader en Formation Énergies Durables
            </h2>
            <p class="text-lg text-gray-700 max-w-3xl mx-auto font-light leading-relaxed">
                Depuis bientôt 10 ans, CREFER forme les experts en énergies renouvelables qui façonnent l'avenir de l'Afrique.
            </p>
        </div>

        {{-- 3 Feature Cards --}}
        <div class="grid md:grid-cols-3 gap-8 mb-20">
            @foreach([
                ['blue','Formation Qualifiante',"Programmes CAP, BT et modules spécialisés reconnus par l'État et les professionnels du secteur.",'M12 6.253v13m0-13C6.5 6.253 2 10.998 2 17s4.5 10.747 10 10.747c5.5 0 10-4.998 10-10.747 0-6.002-4.5-10.747-10-10.747z'],
                ['yellow','Expertise Reconnue',"Formateurs experts avec une expérience combinée de plus de 200 ans dans l'électricité et les énergies renouvelables.",'M13 10V3L4 14h7v7l9-11h-7z'],
                ['green','Placement Assuré',"95% de nos diplômés trouvent un emploi dans les 3 mois suivant leur formation grâce à notre réseau de partenaires.",'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
            ] as [$color, $title, $text, $icon])
            <div class="group relative animate-fade-in-up hover:-translate-y-2 transition-all duration-500">
                <div class="absolute inset-0 bg-gradient-to-r from-{{ $color }}-500/20 to-{{ $color }}-600/20 rounded-3xl blur-xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative card-modern rounded-3xl p-10 border border-{{ $color }}-100/50 bg-gradient-to-br from-white to-{{ $color }}-50/30 hover:shadow-2xl transition-all duration-500 h-full">
                    <div class="w-20 h-20 mb-8 bg-gradient-to-br from-{{ $color }}-400 to-{{ $color }}-600 rounded-2xl flex items-center justify-center drop-shadow-lg transform group-hover:scale-110 transition-transform duration-500">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $icon }}"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4" style="font-family:'Montserrat',sans-serif;">{{ $title }}</h3>
                    <p class="text-gray-700 leading-relaxed mb-6">{{ $text }}</p>
                    <div class="flex items-center gap-2 text-{{ $color }}-600 font-semibold group-hover:gap-4 transition-all duration-300">
                        <a href="{{ route('about') }}">En savoir plus</a>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- 4 Stats --}}
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([
                ['yellow','+1500','Jeunes Formés'],
                ['blue','+1200','En Emploi'],
                ['green','50','Entreprises Partenaires'],
                ['purple','6','Programmes Certifiants'],
            ] as [$color, $val, $label])
            <div class="group relative animate-fade-in-up">
                <div class="absolute inset-0 bg-gradient-to-r from-{{ $color }}-500/30 to-{{ $color }}-600/30 rounded-2xl blur-xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="relative card-modern rounded-2xl p-8 text-center bg-gradient-to-br from-white to-{{ $color }}-50/40 border border-{{ $color }}-100/50 hover:shadow-xl transition-all duration-500 group-hover:scale-105">
                    <div class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-{{ $color }}-500 to-{{ $color }}-600 mb-3">{{ $val }}</div>
                    <p class="text-gray-700 font-semibold">{{ $label }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Call to Action Final --}}
<section class="section-spacing bg-gradient-to-r from-yellow-600 to-white relative overflow-hidden scroll-animate">
    <div class="absolute top-0 left-0 w-96 h-96 bg-black/5 rounded-full blur-3xl -ml-48 -mt-48"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-black/5 rounded-full blur-3xl -mr-48 -mb-48"></div>
    <div class="max-w-4xl mx-auto text-center relative z-10 animate-fade-in-up">
        <h2 class="text-5xl lg:text-6xl font-bold text-gray-900 mb-6 drop-shadow-lg" style="font-family:'Montserrat',sans-serif;letter-spacing:-1.5px;">
            Commence Ton Voyage Vers l'excellence
        </h2>
        <p class="text-xl text-gray-800 mb-12 font-light drop-shadow-md">
            Les places pour les sessions 2025-2026 sont limitées. Inscris-toi maintenant et rejoins la révolution des énergies durables.
        </p>
        <div class="flex flex-col sm:flex-row gap-6 items-center justify-center">
            <a href="{{ route('admissions') }}"
               class="btn-modern px-10 py-4 bg-gradient-to-r from-yellow-600 to-yellow-700 text-white font-bold text-lg rounded-2xl hover:shadow-2xl transition-all hover:scale-105 inline-flex items-center gap-3 drop-shadow-lg">
                Candidater Maintenant
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"/></svg>
            </a>
            <a href="{{ route('contact') }}"
               class="px-10 py-4 border-2 border-gray-900 text-gray-900 font-bold text-lg rounded-2xl hover:bg-gray-900/10 transition-all inline-flex items-center gap-3 bg-white/70 drop-shadow-md">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773c.26 1.043 1.1 2.863 2.513 4.276s3.233 2.253 4.276 2.513l.773-1.548a1 1 0 011.06-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2.57c-8.835 0-16-7.165-16-16V3z"/></svg>
                Appelle-Nous
            </a>
        </div>
    </div>
</section>

@endsection
