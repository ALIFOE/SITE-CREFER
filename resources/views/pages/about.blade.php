@extends('layouts.app')
@section('title', 'À Propos - CREFER')
@section('description', 'Découvrez notre histoire, nos valeurs et notre engagement envers l\'excellence.')

@section('content')
@php
    $hero    = $content['hero']         ?? [];
    $hist    = $content['histoire']     ?? [];
    $vm      = $content['visionmission']?? [];
    $valeurs = $content['valeurs']      ?? [];
@endphp

{{-- Hero --}}
<section class="relative min-h-screen text-white flex items-center overflow-hidden bg-cover bg-center"
         style="background-image:url('{{ !empty($hero['backgroundImage']) ? $hero['backgroundImage'] : '/images/theorie1.jpg' }}')">
    <div class="absolute inset-0 bg-black/55 z-10"></div>
    <div class="absolute inset-x-0 bottom-0 h-44 bg-gradient-to-t from-black/90 to-transparent"></div>
    <div class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 relative z-20 py-20 animate-fade-in-up">
        <div class="text-yellow-500 text-sm font-semibold tracking-widest uppercase mb-4">{{ $hero['badge'] ?? 'À propos de CREFER' }}</div>
        <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-6 leading-tight" style="font-family:'Montserrat',sans-serif;letter-spacing:-0.5px;">
            {{ $hero['title'] ?? 'Notre Centre d\'Excellence' }}
        </h1>
        <p class="text-xl text-blue-100 mb-8 animate-fade-in-up delay-200">
            {{ $hero['line1'] ?? 'Former les ' }}<span class="text-yellow-500">{{ $hero['line1Highlight'] ?? 'professionnels de demain' }}</span>
        </p>
        <a href="{{ route('programmes') }}" class="inline-block px-8 py-4 bg-yellow-400 text-gray-900 rounded-lg hover:bg-yellow-500 transition-colors font-bold text-lg hover:shadow-lg transform hover:-translate-y-1">
            {{ $hero['ctaText'] ?? 'Découvrir nos formations' }}
        </a>
    </div>
</section>

{{-- Histoire --}}
<section class="py-16 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-blue-50 to-cyan-50 scroll-animate">
    <div class="max-w-7xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6" style="font-family:'Montserrat',sans-serif;">{{ $hist['heading'] ?? 'Notre Histoire' }}</h2>
                <p class="text-lg text-gray-700 mb-6 leading-relaxed font-bold">{{ $hist['quote'] ?? '' }}</p>
                <p class="text-gray-600 mb-4 leading-relaxed">{{ $hist['text1'] ?? '' }}</p>
                <p class="text-gray-600 leading-relaxed">{{ $hist['text2'] ?? '' }}</p>
            </div>
            <div class="flex justify-center animate-fade-in-up delay-200">
                <img src="/images/theorie2.jpg" alt="Histoire CREFER"
                     class="w-full max-w-md rounded-lg shadow-lg h-96 object-cover hover:shadow-xl transition-shadow transform hover:scale-105" />
            </div>
        </div>
    </div>
</section>

{{-- Vision & Mission --}}
<section class="py-16 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-gray-50 to-gray-100 scroll-animate">
    <div class="max-w-7xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-12">
            <div class="animate-fade-in-up">
                <h2 class="text-3xl font-bold text-gray-900 mb-6" style="font-family:'Montserrat',sans-serif;">{{ $vm['visionTitle'] ?? 'Notre Vision' }}</h2>
                <p class="text-gray-700 leading-relaxed mb-4">{{ $vm['visionText1'] ?? '' }}</p>
                <p class="text-gray-700 leading-relaxed">{{ $vm['visionText2'] ?? '' }}</p>
            </div>
            <div class="animate-fade-in-up delay-100">
                <h2 class="text-3xl font-bold text-gray-900 mb-6" style="font-family:'Montserrat',sans-serif;">{{ $vm['missionTitle'] ?? 'Notre Mission' }}</h2>
                <p class="text-gray-700 leading-relaxed">{{ $vm['missionText'] ?? '' }}</p>
            </div>
        </div>
        <div class="grid lg:grid-cols-2 gap-8 mt-12">
            <img src="/images/CHANTIER.jpg" alt="Vision CREFER" class="rounded-lg shadow-lg h-64 object-cover w-full" loading="lazy" />
            <img src="/images/CHANTIER2.jpg" alt="Mission CREFER" class="rounded-lg shadow-lg h-64 object-cover w-full" loading="lazy" />
        </div>
    </div>
</section>

{{-- Deux Sites --}}
<section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-white to-blue-50 scroll-animate">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16 animate-fade-in-up">
            <span class="inline-block text-blue-600 text-sm font-bold tracking-widest uppercase px-4 py-2 bg-blue-100 rounded-full mb-4">Nos Sites</span>
            <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4" style="font-family:'Montserrat',sans-serif;">Deux Sites de Formation</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Deux campus modernes à Lomé pour vous accueillir dans les meilleures conditions.</p>
        </div>
        <div class="grid lg:grid-cols-3 gap-8 items-stretch">
            {{-- Siège --}}
            <div class="card-modern rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all animate-fade-in-up">
                <div class="relative h-56 overflow-hidden">
                    <img src="/images/batiment1-1200.jpg" alt="Siège CREFER"
                         class="w-full h-full object-cover hover:scale-110 transition-transform duration-500" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end p-6">
                        <h3 class="text-2xl font-bold text-white">Siège Principal</h3>
                    </div>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 leading-relaxed">Notre campus principal accueille les formations théoriques et pratiques dans des ateliers entièrement équipés.</p>
                </div>
            </div>
            {{-- Distance badge --}}
            <div class="flex flex-col items-center justify-center bg-gradient-to-br from-blue-600 to-blue-800 rounded-2xl p-8 text-white text-center shadow-xl animate-fade-in-up" style="animation-delay:0.15s;">
                <div class="text-6xl font-extrabold mb-3" style="font-family:'Montserrat',sans-serif;">800</div>
                <div class="text-3xl font-bold mb-4">mètres</div>
                <p class="text-blue-100 text-lg">séparent nos deux sites, tous deux facilement accessibles depuis le centre de Lomé.</p>
            </div>
            {{-- Annexe --}}
            <div class="card-modern rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all animate-fade-in-up" style="animation-delay:0.2s;">
                <div class="relative h-56 overflow-hidden">
                    <img src="/images/batiment2-1200.jpg" alt="Annexe CREFER"
                         class="w-full h-full object-cover hover:scale-110 transition-transform duration-500" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end p-6">
                        <h3 class="text-2xl font-bold text-white">Annexe Totsi</h3>
                    </div>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 leading-relaxed">L'annexe de Totsi abrite les formations modulaires et les nouvelles promotions avec des infrastructures modernes.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Formation Complète & Diversité --}}
<section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-gray-50 to-white scroll-animate">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16 animate-fade-in-up">
            <span class="inline-block text-yellow-600 text-sm font-bold tracking-widest uppercase px-4 py-2 bg-yellow-100 rounded-full mb-4">Notre Approche</span>
            <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4" style="font-family:'Montserrat',sans-serif;">Une Formation Complète</h2>
        </div>
        <div class="grid lg:grid-cols-3 gap-8">
            {{-- Carte 1 --}}
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all animate-fade-in-up">
                <div class="h-1 bg-green-500"></div>
                <div class="p-8">
                    <div class="w-14 h-14 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C6.5 6.253 2 10.998 2 17s4.5 10.747 10 10.747c5.5 0 10-4.998 10-10.747 0-6.002-4.5-10.747-10-10.747z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Formation Complète</h3>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-center gap-2"><span class="text-green-500 font-bold">✓</span>Cours techniques avancés</li>
                        <li class="flex items-center gap-2"><span class="text-green-500 font-bold">✓</span>Leadership & management</li>
                        <li class="flex items-center gap-2"><span class="text-green-500 font-bold">✓</span>Création d'entreprise</li>
                    </ul>
                </div>
            </div>
            {{-- Carte 2 --}}
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all animate-fade-in-up" style="animation-delay:0.1s;">
                <div class="h-1 bg-yellow-500"></div>
                <div class="p-8">
                    <div class="w-14 h-14 bg-yellow-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Diversité Énergétique</h3>
                    <ul class="space-y-2 text-gray-600">
                        <li class="flex items-center gap-2"><span class="text-yellow-500 font-bold">✓</span>Énergie solaire photovoltaïque</li>
                        <li class="flex items-center gap-2"><span class="text-yellow-500 font-bold">✓</span>Biogaz & énergies vertes</li>
                        <li class="flex items-center gap-2"><span class="text-yellow-500 font-bold">✓</span>Électricité générale</li>
                    </ul>
                </div>
            </div>
            {{-- Carte 3 --}}
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all animate-fade-in-up" style="animation-delay:0.2s;">
                <div class="h-1 bg-blue-500"></div>
                <div class="p-8">
                    <div class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Deux Rentrées par an</h3>
                    <div class="grid grid-cols-2 gap-3 mt-4">
                        <div class="bg-blue-50 rounded-lg p-3 text-center">
                            <p class="font-bold text-blue-700 text-sm">Septembre</p>
                            <p class="text-xs text-gray-600">Rentrée principale</p>
                        </div>
                        <div class="bg-blue-50 rounded-lg p-3 text-center">
                            <p class="font-bold text-blue-700 text-sm">Avril</p>
                            <p class="text-xs text-gray-600">Deuxième session</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Valeurs --}}
<section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-indigo-50 via-purple-50 to-blue-50 scroll-animate">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16 animate-fade-in-up">
            <span class="inline-block text-indigo-600 text-sm font-bold tracking-widest uppercase px-4 py-2 bg-indigo-100 rounded-full mb-4">Nos Principes</span>
            <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4" style="font-family:'Montserrat',sans-serif;">{{ $valeurs['heading'] ?? 'Nos Valeurs Fondamentales' }}</h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">{{ $valeurs['description'] ?? '' }}</p>
        </div>
        <div class="grid lg:grid-cols-3 gap-8">
            @foreach([['val1','blue'],['val2','yellow'],['val3','green']] as [$key,$color])
            <div class="group relative animate-fade-in-up hover:scale-105 transition-transform duration-300">
                <div class="relative bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-shadow duration-300 overflow-hidden h-full">
                    <div class="h-1 bg-gradient-to-r from-{{ $color }}-500 to-{{ $color }}-600"></div>
                    <div class="p-8">
                        <div class="relative w-16 h-16 bg-{{ $color }}-100 group-hover:bg-{{ $color }}-200 rounded-xl flex items-center justify-center mb-6 transition-colors">
                            <svg class="w-8 h-8 text-{{ $color }}-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-{{ $color }}-600 transition-colors">{{ $valeurs[$key.'Title'] ?? '' }}</h3>
                        <p class="text-gray-600 leading-relaxed mb-6">{{ $valeurs[$key.'Text'] ?? '' }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Distinctions et Collaborations --}}
<section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-white to-gray-50 scroll-animate">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16 animate-fade-in-up">
            <span class="inline-block text-amber-600 text-sm font-bold tracking-widest uppercase px-4 py-2 bg-amber-100 rounded-full mb-4">Reconnaissance</span>
            <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4" style="font-family:'Montserrat',sans-serif;">Distinctions &amp; Collaborations</h2>
        </div>
        <div class="grid lg:grid-cols-2 gap-10">
            {{-- Distinctions Honorifiques --}}
            <div class="card-modern rounded-2xl overflow-hidden animate-fade-in-up">
                <div class="relative h-64 overflow-hidden">
                    <img src="/images/distinction1-1200.jpg" alt="Distinctions CREFER"
                         class="w-full h-full object-cover" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-6">
                        <h3 class="text-2xl font-bold text-white">Distinctions Honorifiques</h3>
                    </div>
                </div>
                <div class="p-8">
                    <div class="space-y-4">
                        @foreach([
                            ['Décembre 2020','Meilleure école technique de la région'],
                            ['Novembre 2023','Prix de l\'innovation pédagogique'],
                            ['Décembre 2023','Reconnaissance nationale en énergies renouvelables'],
                        ] as [$date, $award])
                        <div class="flex items-start gap-3 p-3 bg-amber-50 rounded-lg">
                            <span class="flex-shrink-0 px-2 py-1 bg-amber-100 text-amber-700 text-xs font-bold rounded">{{ $date }}</span>
                            <p class="text-gray-700 text-sm">{{ $award }}</p>
                        </div>
                        @endforeach
                        <p class="text-sm text-gray-600 mt-4">Membre de la <strong>SAER-TOGO</strong> — Société Africaine des Énergies Renouvelables du Togo.</p>
                    </div>
                </div>
            </div>
            {{-- Collaborations Académiques --}}
            <div class="card-modern rounded-2xl overflow-hidden animate-fade-in-up" style="animation-delay:0.1s;">
                <div class="relative h-64 overflow-hidden">
                    <img src="/images/distinction2-1200.jpg" alt="Collaborations CREFER"
                         class="w-full h-full object-cover" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-6">
                        <h3 class="text-2xl font-bold text-white">Collaborations Académiques</h3>
                    </div>
                </div>
                <div class="p-8">
                    <p class="text-gray-600 leading-relaxed mb-6">
                        CREFER entretient des partenariats académiques et professionnels avec plusieurs institutions nationales et régionales pour garantir la qualité de ses formations.
                    </p>
                    <div class="flex items-start gap-3 p-4 bg-blue-50 rounded-xl">
                        <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <p class="font-bold text-gray-900">Collaboration CCS</p>
                            <p class="text-gray-600 text-sm">Partenariat avec le Centre de Compétences Solaires pour le développement des formations en énergie solaire.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Programmes d'Excellence --}}
<section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-yellow-50 to-amber-50 scroll-animate">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16 animate-fade-in-up">
            <span class="inline-block text-yellow-600 text-sm font-bold tracking-widest uppercase px-4 py-2 bg-yellow-100 rounded-full mb-4">Nos Formations</span>
            <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4" style="font-family:'Montserrat',sans-serif;">Programmes d'Excellence</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Des formations pratiques et certifiantes reconnues au niveau national.</p>
        </div>
        <div class="grid lg:grid-cols-3 gap-8 mb-12">
            @foreach([
                ['/images/pe4.jpg','Électricité Bâtiment','CAP Électricité d\'Équipement','3 ans de formation certifiante','cap'],
                ['/images/pe2.jpg','Efficacité Énergétique','BT Électrotechnique','2 à 3 ans de formation avancée','bt'],
                ['/images/pe3.jpg','Énergie Solaire','Formation Modulaire','6 à 12 mois flexibles','modulaire'],
            ] as [$img, $subtitle, $title, $desc, $route])
            <div class="card-modern rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all animate-fade-in-up group">
                <div class="relative h-56 overflow-hidden">
                    <img src="{{ $img }}" alt="{{ $title }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                </div>
                <div class="p-6">
                    <p class="text-yellow-600 text-sm font-semibold uppercase mb-1">{{ $subtitle }}</p>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $title }}</h3>
                    <p class="text-gray-600 text-sm mb-4">{{ $desc }}</p>
                    <a href="{{ route($route) }}" class="text-blue-600 font-semibold hover:text-blue-700 inline-flex items-center gap-2 text-sm">
                        En savoir plus
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center">
            <a href="{{ route('programmes') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-yellow-400 to-yellow-500 text-white rounded-xl font-bold text-lg hover:shadow-xl transition-all">
                Voir tous les programmes
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
        </div>
    </div>
</section>

{{-- Notre Méthode --}}
<section class="py-16 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-yellow-50 to-amber-50 scroll-animate">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-12 text-center" style="font-family:'Montserrat',sans-serif;">Notre Méthode Pédagogique</h2>
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <p class="text-lg text-gray-700 leading-relaxed mb-6">CREFER combine théorie, pratique et stage en entreprise pour garantir une insertion professionnelle rapide.</p>
                <div class="space-y-3">
                    @foreach(['Formation théorique approfondie','Ateliers pratiques équipés','Stages en entreprises partenaires','Accompagnement à l\'insertion professionnelle'] as $point)
                    <div class="flex items-start gap-3">
                        <span class="text-yellow-400 font-bold text-xl">✓</span>
                        <span class="text-gray-700">{{ $point }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                @foreach(['/images/theorie1.jpg','/images/theorie2.jpg','/images/CHANTIER3.jpg','/images/CHANTIER4.jpg'] as $img)
                <img src="{{ $img }}" alt="Méthode" class="rounded-lg shadow-lg h-40 w-full object-cover hover:shadow-xl transition-shadow hover:scale-105" loading="lazy" />
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- CTA Final --}}
<section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-r from-gray-800 to-yellow-600 scroll-animate">
    <div class="max-w-4xl mx-auto text-center">
        <h2 class="text-4xl lg:text-5xl font-bold text-white mb-6" style="font-family:'Montserrat',sans-serif;">
            Prêt à rejoindre CREFER ?
        </h2>
        <p class="text-xl text-gray-200 mb-10 font-light">
            Faites le premier pas vers une carrière dans les énergies durables. Nos équipes sont là pour vous accompagner.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('admissions') }}"
               class="px-10 py-4 bg-white text-gray-900 font-bold text-lg rounded-2xl hover:shadow-2xl transition-all hover:scale-105 inline-flex items-center gap-3">
                Nos Admissions
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
            </a>
            <a href="{{ route('contact') }}"
               class="px-10 py-4 border-2 border-white text-white font-bold text-lg rounded-2xl hover:bg-white/10 transition-all inline-flex items-center gap-3">
                Nous Contacter
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </a>
        </div>
    </div>
</section>

@endsection
