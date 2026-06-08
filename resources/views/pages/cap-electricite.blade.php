@extends('layouts.app')
@section('title', 'CAP Électricité d\'Équipement - CREFER')
@section('description', 'Formation CAP Électricité d\'Équipement à CREFER. Diplôme d\'état reconnu, 3 ans de formation, débouchés professionnels garantis.')

@section('content')
<div class="min-h-screen bg-white">
    <div class="h-16 sm:h-20"></div>

    {{-- Hero Banner --}}
    <div class="relative h-96 sm:h-[500px] w-full overflow-hidden">
        <img src="/images/_DSC4865-1200.jpg" alt="CAP Électricité d'Équipement"
             class="w-full h-full object-cover" />
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-transparent flex items-end">
            <div class="w-full p-8 sm:p-12 lg:p-16 max-w-6xl mx-auto">
                <a href="{{ route('programmes') }}" class="flex items-center gap-2 mb-6 text-white hover:text-gray-200 transition w-fit">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    Retour
                </a>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-4" style="font-family:'Montserrat',sans-serif;">
                    CAP Électricité d'Équipement
                </h1>
                <p class="text-lg sm:text-xl text-gray-100 max-w-2xl">
                    Diplôme d'état pour maîtriser l'installation et la maintenance des équipements électriques
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
                        <p class="text-gray-700 text-base leading-relaxed">Le CAP est un diplôme d'état reconnu au niveau national, attestant d'une qualification professionnelle dans le domaine de l'électricité d'équipement.</p>
                    </div>
                    <div class="bg-yellow-50 rounded-lg p-6 border-l-4 border-yellow-500">
                        <p class="text-gray-800 font-semibold">
                            ⭐ Le CAP vous ouvre les portes du marché de l'emploi en tant qu'électricien qualifié, reconnu par les entreprises togolaises et régionales.
                        </p>
                    </div>
                </div>
                <div class="rounded-xl overflow-hidden shadow-lg">
                    <img src="/images/_DSC4864-1200.jpg" alt="Certification CAP Électricité"
                         class="w-full h-64 object-cover" />
                </div>
            </div>
        </article>

        {{-- Section 2: Durée --}}
        <article class="mb-16 scroll-mt-20" id="duree">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center mb-8">
                <div class="rounded-xl overflow-hidden shadow-lg order-2 md:order-1">
                    <img src="/images/batiment2-1200.jpg" alt="Campus de formation"
                         class="w-full h-64 object-cover" />
                </div>
                <div class="order-1 md:order-2 flex flex-col justify-center space-y-4">
                    <div>
                        <h4 class="font-bold text-gray-900 mb-2 text-xl">Durée de la Formation</h4>
                        <p class="text-gray-700 text-base leading-relaxed">La formation dure trois ans avec un niveau d'entrée minimum de CEPE ou un intérêt pour les métiers de l'électricité.</p>
                    </div>
                    <div class="bg-amber-50 rounded-lg p-6 border-l-4 border-amber-500">
                        <p class="text-3xl font-bold text-amber-600 mb-2">3 ans</p>
                        <p class="text-gray-700">Formation complète avec alternance théorie et pratique</p>
                    </div>
                    <div class="grid grid-cols-3 gap-3 mt-2">
                        <div class="text-center p-4 bg-yellow-50 rounded-lg">
                            <p class="font-bold text-yellow-600 mb-1">Année 1</p>
                            <p class="text-xs text-gray-600">Bases électriques</p>
                        </div>
                        <div class="text-center p-4 bg-yellow-50 rounded-lg">
                            <p class="font-bold text-yellow-600 mb-1">Année 2</p>
                            <p class="text-xs text-gray-600">Approfondissement</p>
                        </div>
                        <div class="text-center p-4 bg-yellow-50 rounded-lg">
                            <p class="font-bold text-yellow-600 mb-1">Année 3</p>
                            <p class="text-xs text-gray-600">Stage & spécialisation</p>
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
                        <p class="text-gray-700 text-base leading-relaxed">Former des techniciens capables de réaliser, installer et maintenir des équipements électriques dans le bâtiment et l'industrie, en conformité avec les normes de sécurité.</p>
                    </div>
                    <div class="space-y-3">
                        @foreach([
                            'Installer des équipements électriques domestiques et industriels',
                            'Réaliser des installations solaires photovoltaïques',
                            'Assurer la maintenance et le dépannage électrique',
                            'Respecter les normes de sécurité électrique',
                        ] as $obj)
                        <div class="flex items-start gap-3 p-3 bg-green-50 rounded-lg">
                            <span class="text-green-600 font-bold mt-1">✓</span>
                            <p class="text-gray-700">{{ $obj }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="rounded-xl overflow-hidden shadow-lg">
                    <img src="/images/entreprenariat-1200.jpg" alt="Objectifs formation CAP"
                         class="w-full h-64 object-cover" />
                </div>
            </div>
        </article>

        {{-- Section 4: Débouchés --}}
        <article class="mb-16 scroll-mt-20" id="debouches">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center mb-8">
                <div class="rounded-xl overflow-hidden shadow-lg order-2 md:order-1">
                    <img src="/images/distinction1-1200.jpg" alt="Débouchés professionnels"
                         class="w-full h-64 object-cover" />
                </div>
                <div class="order-1 md:order-2 flex flex-col justify-center space-y-4">
                    <div>
                        <h4 class="font-bold text-gray-900 mb-2 text-xl">Débouchés Professionnels</h4>
                        <p class="text-gray-700 text-base leading-relaxed">Les diplômés peuvent exercer immédiatement comme techniciens ou poursuivre vers le BT Électrotechnique pour évoluer vers des postes de responsabilité.</p>
                    </div>
                    <div class="space-y-3">
                        @foreach([
                            ['Électricien d\'équipement','Installation et maintenance des équipements électriques'],
                            ['Installateur électrique','Réalisation d\'installations électriques résidentielles'],
                            ['Maintenancier électrique','Entretien et dépannage des systèmes électriques'],
                            ['Poursuite études BT','Accès au Brevet Technique Électrotechnique'],
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

        {{-- CTA --}}
        <div class="bg-gradient-to-r from-blue-600 to-cyan-600 rounded-2xl shadow-xl p-12 text-white text-center">
            <h2 class="text-3xl font-bold mb-4">Prêt à commencer votre formation ?</h2>
            <p class="text-lg text-blue-100 mb-8 max-w-2xl mx-auto">
                Rejoignez notre formation CAP Électricité et lancez votre carrière dans l'électricité et les énergies renouvelables.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('admissions') }}" class="bg-white text-blue-600 font-bold py-4 px-8 rounded-xl hover:bg-gray-100 transition-all">
                    Demander une admission
                </a>
                <a href="{{ route('home') }}" class="border-2 border-white text-white font-bold py-4 px-8 rounded-xl hover:bg-blue-700 transition-all">
                    Retour à l'accueil
                </a>
            </div>
        </div>

        {{-- Autres formations --}}
        <div class="mt-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Autres formations disponibles</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all">
                    <img src="/images/pratique-1200.jpg" alt="BT Électrotechnique" class="h-48 w-full object-cover" />
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">BT Électrotechnique</h3>
                        <p class="text-gray-700 mb-4">
                            Brevet Technique pour accéder à des postes de technicien supérieur en électrotechnique.
                        </p>
                        <a href="{{ route('bt') }}" class="text-yellow-600 font-semibold hover:text-yellow-700 inline-flex items-center gap-2">
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
