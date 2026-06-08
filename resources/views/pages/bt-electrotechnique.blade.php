@extends('layouts.app')
@section('title', 'BT Électrotechnique - CREFER')
@section('description', 'Formation BT Électrotechnique de 2-3 ans à CREFER. Devenez technicien supérieur en électrotechnique avec qualification professionnelle reconnue au Togo.')

@section('content')
<div class="min-h-screen bg-white">
    <div class="h-16 sm:h-20"></div>

    {{-- Hero Banner --}}
    <div class="relative h-96 sm:h-[500px] w-full overflow-hidden">
        <img src="/images/_DSC4863-1200.jpg" alt="BT Électrotechnique"
             class="w-full h-full object-cover" />
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-transparent flex items-end">
            <div class="w-full p-8 sm:p-12 lg:p-16 max-w-6xl mx-auto">
                <a href="{{ route('programmes') }}" class="flex items-center gap-2 mb-6 text-white hover:text-gray-200 transition w-fit">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    Retour
                </a>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-4" style="font-family:'Montserrat',sans-serif;">
                    BT Électrotechnique
                </h1>
                <p class="text-lg sm:text-xl text-gray-100 max-w-2xl">
                    Diplôme d'état pour devenir technicien supérieur en électrotechnique
                </p>
            </div>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

        {{-- Table des matières --}}
        <div class="bg-yellow-50 rounded-xl p-8 mb-12 border-l-4 border-yellow-600">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Sommaire</h2>
            <ul class="space-y-2 text-yellow-700">
                <li><a href="#qualification" class="hover:text-yellow-900 flex items-center gap-2"><span>➜</span> Niveau de Qualification</a></li>
                <li><a href="#duree" class="hover:text-yellow-900 flex items-center gap-2"><span>➜</span> Durée de la Formation</a></li>
                <li><a href="#objectifs" class="hover:text-yellow-900 flex items-center gap-2"><span>➜</span> Objectifs de la Formation</a></li>
                <li><a href="#debouches" class="hover:text-yellow-900 flex items-center gap-2"><span>➜</span> Débouchés Professionnels</a></li>
            </ul>
        </div>

        {{-- Section 1: Qualification --}}
        <article class="mb-16 scroll-mt-20" id="qualification">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center mb-8">
                <div class="flex flex-col justify-center space-y-4">
                    <div>
                        <h4 class="font-bold text-gray-900 mb-2 text-xl">Niveau de Qualification</h4>
                        <p class="text-gray-700 text-base leading-relaxed">Le BT est un diplôme d'état équivalent au baccalauréat professionnel, attestant d'une qualification technique approfondie.</p>
                    </div>
                    <div class="bg-yellow-50 rounded-lg p-6 border-l-4 border-yellow-500">
                        <p class="text-gray-800 font-semibold">
                            ⭐ Le BT vous prépare à assumer des responsabilités techniques et à gérer des projets électrotechniques complexes.
                        </p>
                    </div>
                </div>
                <div class="rounded-xl overflow-hidden shadow-lg">
                    <img src="/images/_DSC4864-1200.jpg" alt="Certification BT diplôme"
                         class="w-full h-64 object-cover" />
                </div>
            </div>
        </article>

        {{-- Section 2: Durée --}}
        <article class="mb-16 scroll-mt-20" id="duree">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center mb-8">
                <div class="rounded-xl overflow-hidden shadow-lg order-2 md:order-1">
                    <img src="/images/batiment1-1200.jpg" alt="Durée de formation 2-3 ans"
                         class="w-full h-64 object-cover" />
                </div>
                <div class="order-1 md:order-2 flex flex-col justify-center space-y-4">
                    <div>
                        <h4 class="font-bold text-gray-900 mb-2 text-xl">Durée de la Formation</h4>
                        <p class="text-gray-700 text-base leading-relaxed">La formation dure deux à trois ans avec un niveau d'entrée minimum de BEPC ou un CAP en électricité d'équipement.</p>
                    </div>
                    <div class="bg-amber-50 rounded-lg p-6 border-l-4 border-amber-500">
                        <p class="text-3xl font-bold text-amber-600 mb-2">2 à 3 ans</p>
                        <p class="text-gray-700">Formation complète avec alternance théorie et pratique avancée</p>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mt-2">
                        <div class="text-center p-4 bg-yellow-50 rounded-lg">
                            <p class="font-bold text-yellow-600 mb-1">Année 1</p>
                            <p class="text-xs text-gray-600">Technologie avancée</p>
                        </div>
                        <div class="text-center p-4 bg-yellow-50 rounded-lg">
                            <p class="font-bold text-yellow-600 mb-1">Année 2-3</p>
                            <p class="text-xs text-gray-600">Spécialisation & Projets</p>
                        </div>
                    </div>
                </div>
            </div>
        </article>

        {{-- Section 3: Objectifs --}}
        <article class="mb-16 scroll-mt-20" id="objectifs">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center mb-8">
                <div class="flex flex-col justify-center space-y-4">
                    <div>
                        <h4 class="font-bold text-gray-900 mb-2 text-xl">Objectifs de la Formation</h4>
                        <p class="text-gray-700 text-base leading-relaxed">Former des techniciens capables de concevoir, installer, gérer et maintenir des systèmes électrotechniques complexes, incluant la production, le transport, la distribution et l'utilisation de l'énergie électrique.</p>
                    </div>
                    <div class="space-y-3">
                        @foreach([
                            'Concevoir des systèmes électrotechniques',
                            'Gérer et optimiser des installations électriques',
                            'Assurer la maintenance des systèmes complexes',
                            'Piloter des équipes techniques',
                        ] as $obj)
                        <div class="flex items-start gap-3 p-3 bg-orange-50 rounded-lg">
                            <span class="text-orange-600 font-bold mt-1">✓</span>
                            <p class="text-gray-700">{{ $obj }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="rounded-xl overflow-hidden shadow-lg">
                    <img src="/images/batiment2-1200.jpg" alt="Systèmes électrotechniques"
                         class="w-full h-64 object-cover" />
                </div>
            </div>
        </article>

        {{-- Section 4: Débouchés --}}
        <article class="mb-16 scroll-mt-20" id="debouches">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center mb-8">
                <div class="rounded-xl overflow-hidden shadow-lg order-2 md:order-1">
                    <img src="/images/vision2-1200.jpg" alt="Débouchés professionnels technicien"
                         class="w-full h-64 object-cover" />
                </div>
                <div class="order-1 md:order-2 flex flex-col justify-center space-y-4">
                    <div>
                        <h4 class="font-bold text-gray-900 mb-2 text-xl">Débouchés Professionnels</h4>
                        <p class="text-gray-700 text-base leading-relaxed">Les diplômés peuvent occuper des postes de techniciens en électrotechnique, chefs de chantier ou poursuivre vers un BTS, Licence en électrotechnique.</p>
                    </div>
                    <div class="space-y-3">
                        @foreach([
                            ['Technicien en Électrotechnique','Concevoir, installer et maintenir des systèmes électrotechniques'],
                            ['Chef de Chantier Électrique','Superviser des installations électriques complexes et coordonner les équipes'],
                            ['Responsable Technique','Gérer la maintenance et l\'optimisation des installations'],
                            ['Poursuite d\'études supérieures','Accès au BTS, Licence en électrotechnique et formations spécialisées'],
                        ] as [$titre, $desc])
                        <div class="bg-purple-50 rounded-lg p-5 border-l-4 border-purple-500">
                            <p class="font-bold text-gray-900 mb-1">{{ $titre }}</p>
                            <p class="text-gray-700 text-sm">{{ $desc }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </article>

        <div class="border-t-2 border-gray-200 my-16"></div>

        {{-- Complément Formations Modulaires --}}
        <section class="mb-16 bg-blue-50 rounded-xl p-8 border-l-4 border-blue-600">
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0 w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-3">Complément : Formations Modulaires</h2>
                    <p class="text-gray-700 text-lg leading-relaxed">
                        Nos formations modulaires (6 ou 12 mois) offrent une grande flexibilité et permettent aux apprenants de développer des compétences spécifiques de manière progressive et adaptée à leurs besoins. La formation est sanctionnée par un certificat et une attestation de stage.
                    </p>
                    <a href="{{ route('modulaire') }}" class="text-blue-600 font-semibold hover:text-blue-700 inline-flex items-center gap-2 mt-4">
                        Découvrir les formations modulaires
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </a>
                </div>
            </div>
        </section>

        {{-- CTA --}}
        <div class="bg-gradient-to-r from-yellow-600 to-amber-700 rounded-2xl shadow-xl p-12 text-white text-center">
            <h2 class="text-3xl font-bold mb-4">Prêt à poursuivre vos études ?</h2>
            <p class="text-lg text-yellow-100 mb-8 max-w-2xl mx-auto">
                Rejoignez notre formation BT Électrotechnique et devenez un technicien supérieur reconnu.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('admissions') }}" class="bg-white text-yellow-600 font-bold py-4 px-8 rounded-xl hover:bg-gray-100 transition-all">
                    Demander une admission
                </a>
                <a href="{{ route('home') }}" class="border-2 border-white text-white font-bold py-4 px-8 rounded-xl hover:bg-yellow-700 transition-all">
                    Retour à l'accueil
                </a>
            </div>
        </div>

        {{-- Autres formations --}}
        <div class="mt-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Autres formations disponibles</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all">
                    <img src="/images/entreprenariat-1200.jpg" alt="CAP Électricité d'Équipement" class="h-48 w-full object-cover" />
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">CAP Électricité d'Équipement</h3>
                        <p class="text-gray-700 mb-4">
                            Diplôme d'état pour maîtriser l'installation et la maintenance des équipements électriques en 3 ans.
                        </p>
                        <a href="{{ route('cap') }}" class="text-blue-600 font-semibold hover:text-blue-700 inline-flex items-center gap-2">
                            En savoir plus
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                        </a>
                    </div>
                </div>
                <div class="rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all">
                    <img src="/images/mission1-1200.jpg" alt="Formations Modulaires" class="h-48 w-full object-cover" />
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Formations Modulaires</h3>
                        <p class="text-gray-700 mb-4">
                            Des formations flexibles et adaptées à vos besoins spécifiques pour perfectionnement ou reconversion.
                        </p>
                        <a href="{{ route('modulaire') }}" class="text-green-600 font-semibold hover:text-green-700 inline-flex items-center gap-2">
                            En savoir plus
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
