@extends('layouts.app')
@section('title', 'Formations Modulaires - SPV & SST à CREFER')
@section('description', 'Formations modulaires flexibles à CREFER. SPV (Énergies Renouvelables) et SST (Sécurité & Télécommunications). Certificats professionnels reconnus.')

@section('content')
<div class="min-h-screen bg-white">
    <div class="h-16 sm:h-20"></div>

    {{-- Hero Banner --}}
    <div class="relative h-96 sm:h-[500px] w-full overflow-hidden">
        <img src="/images/_DSC4863-1200.jpg" alt="Formations Modulaires"
             class="w-full h-full object-cover" />
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-transparent flex items-end">
            <div class="w-full p-8 sm:p-12 lg:p-16 max-w-6xl mx-auto">
                <a href="{{ route('programmes') }}" class="flex items-center gap-2 mb-6 text-white hover:text-gray-200 transition w-fit">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    Retour
                </a>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-4" style="font-family:'Montserrat',sans-serif;">
                    Formations Modulaires
                </h1>
                <p class="text-lg sm:text-xl text-gray-100 max-w-2xl">
                    Des formations flexibles et adaptées à vos besoins spécifiques
                </p>
            </div>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

        {{-- Introduction --}}
        <div class="bg-green-50 rounded-xl p-8 mb-12 border-l-4 border-green-600">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Formations Modulaires Flexibles</h2>
            <p class="text-gray-700 text-lg leading-relaxed">
                Nos formations modulaires sont conçues pour vous offrir une flexibilité maximale. Que vous souhaitiez vous perfectionner, vous reconvertir ou acquérir de nouvelles compétences, nous proposons deux grandes filières regroupant 9 formations spécialisées.
            </p>
        </div>

        {{-- FILIÈRE SPV --}}
        <article class="mb-16">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center mb-8">
                <div class="flex flex-col justify-center space-y-4">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-yellow-400 to-amber-500 rounded-lg flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold text-gray-900">Filière SPV</h2>
                            <p class="text-gray-600">Systèmes Photovoltaïques et Énergies Renouvelables</p>
                        </div>
                    </div>
                    <div class="bg-amber-50 rounded-lg p-6 border-l-4 border-amber-500">
                        <p class="text-gray-800 font-semibold">
                            Maîtrisez les technologies des énergies renouvelables : électricité, solaire thermique et photovoltaïque, biogaz, plomberie et climatisation.
                        </p>
                    </div>
                </div>
                <div class="rounded-xl overflow-hidden shadow-lg">
                    <img src="/images/théorie-1200.jpg" alt="Énergie solaire photovoltaïque"
                         class="w-full h-96 object-cover" />
                </div>
            </div>

            @foreach([
                ['blue','Électricité Bâtiment et Industrielle','Acquisition de compétences complètes pour les installations électriques dans le bâtiment et l\'industrie. Maîtrisez les techniques essentielles, les normes de sécurité, et les meilleures pratiques du secteur.'],
                ['green','Efficacité Énergétique','Formation pour devenir expert en réduction de la consommation d\'énergie. Apprenez à optimiser les installations, réaliser des audits énergétiques, et mettre en place des solutions durables.'],
                ['yellow','Énergie Solaire Photovoltaïque','Apprentissage complet des techniques d\'installation des systèmes solaires photovoltaïques et thermiques. Formation pratique couvrant la conception, l\'installation, et la maintenance des systèmes solaires.'],
                ['emerald','Biogaz','Maîtrise du processus de transformation des déchets organiques en énergie verte. Formation axée sur la conception, la construction, l\'exploitation et la maintenance des digesteurs biogaz pour applications domestiques et agricoles.'],
                ['cyan','Plomberie','Formation pratique sur l\'installation et l\'entretien des réseaux d\'eau (froide et chaude), des équipements sanitaires, et des systèmes de distribution. Idéal pour les chantiers résidentiels, industriels et les énergies renouvelables intégrées.'],
                ['sky','Froid & Climatisation','Développement de compétences techniques dans l\'installation, le dépannage et l\'entretien des systèmes de réfrigération et de climatisation, avec une sensibilisation à l\'efficacité énergétique et aux normes environnementales.'],
            ] as [$color, $titre, $desc])
            <div class="mb-8 bg-gray-50 rounded-xl p-8 border-l-4 border-{{ $color }}-500 flex flex-col justify-center space-y-4">
                <h4 class="font-bold text-gray-900 text-lg">{{ $titre }}</h4>
                <p class="text-gray-700 text-base leading-relaxed">{{ $desc }}</p>
            </div>
            @endforeach
        </article>

        <div class="border-t-2 border-gray-200 my-16"></div>

        {{-- FILIÈRE SST --}}
        <article class="mb-16">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center mb-8">
                <div class="flex flex-col justify-center space-y-4">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-red-500 to-purple-600 rounded-lg flex items-center justify-center">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold text-gray-900">Filière SST</h2>
                            <p class="text-gray-600">Systèmes de Sécurité et Télécommunications</p>
                        </div>
                    </div>
                    <div class="bg-red-50 rounded-lg p-6 border-l-4 border-red-500">
                        <p class="text-gray-800 font-semibold">
                            🔒 Devenez expert en sécurité et télécommunications : réseaux, alarmes, éclairage de sécurité, caméras et antennes paraboliques.
                        </p>
                    </div>
                </div>
                <div class="rounded-xl overflow-hidden shadow-lg">
                    <img src="/images/pratique-1200.jpg" alt="Systèmes de sécurité et télécommunications"
                         class="w-full h-96 object-cover" />
                </div>
            </div>

            @foreach([
                ['indigo','Réseau et Télécommunication','Conception, déploiement et gestion des infrastructures et services de réseaux et de télécommunications. Maîtrisez les technologies modernes et les meilleures pratiques du secteur.'],
                ['orange','Système d\'Alarme et Éclairage de Sécurité','Maîtrise de l\'installation de systèmes d\'éclairage pour la sécurité des bâtiments. Apprenez à mettre en place des solutions fiables et conformes aux normes de sécurité.'],
                ['teal','Installation et Configuration de Caméras et Antennes Paraboliques','Formation à l\'installation et à la configuration de caméras et d\'antennes paraboliques, avec des solutions alimentées par des panneaux solaires. Devenez expert en surveillance et télécommunications modernes.'],
            ] as [$color, $titre, $desc])
            <div class="mb-8 bg-gray-50 rounded-xl p-8 border-l-4 border-{{ $color }}-500 flex flex-col justify-center space-y-4">
                <h4 class="font-bold text-gray-900 text-lg">{{ $titre }}</h4>
                <p class="text-gray-700 text-base leading-relaxed">{{ $desc }}</p>
            </div>
            @endforeach
        </article>

        <div class="border-t-2 border-gray-200 my-16"></div>

        {{-- Pourquoi choisir --}}
        <section class="mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Pourquoi Choisir nos Formations Modulaires ?</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach([
                    ['blue','Flexibilité Maximale','Adaptez votre apprentissage à votre emploi du temps et vos objectifs professionnels.','M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a4 4 0 118 0'],
                    ['green','Pratique Intensive','Des formations centrées sur la pratique avec matériel moderne et équipé.','M13 10V3L4 14h7v7l9-11h-7z'],
                    ['yellow','Experts Formateurs','Apprenez auprès de professionnels expérimentés du secteur.','M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                    ['purple','Débouchés Professionnels','Accédez à des emplois recherchés dans les énergies renouvelables et la sécurité.','M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'],
                ] as [$color, $titre, $desc, $icon])
                <div class="flex items-start gap-4 p-6 bg-{{ $color }}-50 rounded-xl">
                    <div class="flex-shrink-0 w-10 h-10 bg-{{ $color }}-500 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/></svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">{{ $titre }}</h3>
                        <p class="text-gray-700 text-sm">{{ $desc }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </section>

        {{-- CTA --}}
        <div class="bg-gradient-to-r from-green-600 to-emerald-700 rounded-2xl shadow-xl p-12 text-white text-center">
            <h2 class="text-3xl font-bold mb-4">Prêt à vous former ?</h2>
            <p class="text-lg text-green-100 mb-8 max-w-2xl mx-auto">
                Découvrez nos formations modulaires et développez vos compétences dans les secteurs d'avenir.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('admissions') }}" class="bg-white text-green-600 font-bold py-4 px-8 rounded-xl hover:bg-gray-100 transition-all">
                    S'inscrire à une formation
                </a>
                <a href="{{ route('home') }}" class="border-2 border-white text-white font-bold py-4 px-8 rounded-xl hover:bg-green-700 transition-all">
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
                            Diplôme d'état reconnu pour maîtriser l'installation et la maintenance des équipements électriques en 3 ans.
                        </p>
                        <a href="{{ route('cap') }}" class="text-blue-600 font-semibold hover:text-blue-700 inline-flex items-center gap-2">
                            En savoir plus
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                        </a>
                    </div>
                </div>
                <div class="rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all">
                    <img src="/images/distinction2-1200.jpg" alt="BT Électrotechnique" class="h-48 w-full object-cover" />
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">BT Électrotechnique</h3>
                        <p class="text-gray-700 mb-4">
                            Brevet de Technicien pour accéder à des postes de technicien supérieur en électrotechnique.
                        </p>
                        <a href="{{ route('bt') }}" class="text-yellow-600 font-semibold hover:text-yellow-700 inline-flex items-center gap-2">
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
