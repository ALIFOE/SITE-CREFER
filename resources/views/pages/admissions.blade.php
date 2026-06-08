@extends('layouts.app')
@section('title', 'Admissions CREFER 2025-2026 - Formations CAP, BT & Modulaires')
@section('description', 'Découvrez les conditions d\'admission et les périodes de rentrée pour CAP, BT et formations modulaires.')

@section('content')
@php
    $hero       = $content['hero']       ?? [];
    $fiches     = $content['fiches']     ?? [];
    $conditions = $content['conditions'] ?? [];
    $cta        = $content['cta']        ?? [];
    $heroBg     = !empty($hero['backgroundImage'])  ? $hero['backgroundImage']  : '/images/_DSC4826.jpg';
    $ctaImg     = !empty($cta['image'])             ? $cta['image']             : '/images/distinction1-1200.jpg';
@endphp

{{-- ══════════════════════════════════════════
     HERO — plein écran, grille 2 colonnes
══════════════════════════════════════════ --}}
<section class="relative min-h-screen text-white flex items-center overflow-hidden bg-cover bg-center"
         style="background-image: url('{{ $heroBg }}')">
    <div class="absolute inset-0 bg-black/55 z-10"></div>
    <div class="absolute inset-x-0 bottom-0 h-44 bg-gradient-to-t from-black/90 to-transparent z-[15]"></div>

    <div class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 relative z-20 py-20">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            {{-- Contenu gauche --}}
            <div class="flex flex-col justify-center animate-fade-in-up">
                <div class="max-w-2xl">
                    <div class="text-yellow-500 text-sm font-semibold tracking-widest uppercase mb-4"
                         style="font-family:'Montserrat',sans-serif;">
                        {{ $hero['badge'] ?? 'Admission 2025' }}
                    </div>

                    <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-white mb-6 leading-tight animate-fade-in-up"
                        style="font-family:'Montserrat',sans-serif; letter-spacing:-0.5px;">
                        {{ $hero['title'] ?? 'RENTRÉE ACADÉMIQUE 2025-2026' }}
                    </h1>

                    <div class="space-y-3 mb-8 animate-fade-in-up">
                        <p class="text-lg md:text-xl lg:text-2xl font-bold leading-tight text-blue-100"
                           style="font-family:'Montserrat',sans-serif; letter-spacing:-0.3px;">
                            {{ $hero['capBtLabel'] ?? 'CAP & BT :' }}
                            <span class="text-yellow-400">{{ $hero['capBtDate'] ?? '15 SEPTEMBRE 2025' }}</span>
                        </p>
                        <p class="text-lg md:text-xl lg:text-2xl font-bold leading-tight text-blue-100"
                           style="font-family:'Montserrat',sans-serif; letter-spacing:-0.3px;">
                            {{ $hero['modulaireLabel'] ?? 'MODULAIRE :' }}
                            <span class="text-yellow-400">{{ $hero['modulaireDate'] ?? '13 AVRIL 2026' }}</span>
                        </p>
                    </div>

                    <a href="{{ route('contact') }}"
                       class="inline-block px-10 md:px-12 py-4 bg-yellow-400 text-gray-900 rounded-lg hover:bg-yellow-500 transition-all duration-300 font-bold text-lg hover:shadow-lg hover:-translate-y-1 animate-fade-in-up"
                       style="font-family:'Montserrat',sans-serif;">
                        {{ $hero['ctaText'] ?? 'Nous contacter' }}
                    </a>
                </div>
            </div>

            {{-- Colonne droite vide — laisse voir l'image de fond --}}
            <div class="hidden lg:block"></div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     FICHES & DOCUMENTS
══════════════════════════════════════════ --}}
<section class="py-16 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-blue-50 to-cyan-50">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-12"
            style="font-family:'Montserrat',sans-serif; letter-spacing:-0.5px;">
            {{ $fiches['heading'] ?? "Fiches d'Inscription & Documentation" }}
        </h2>

        <div class="grid lg:grid-cols-2 gap-12 items-start">

            {{-- Colonne gauche : galerie d'images --}}
            <div class="flex flex-col justify-start items-center order-2 lg:order-1 w-full">
                @if($images->count())
                    <div class="w-full space-y-6">
                        @foreach($images->take(4) as $img)
                        @if($img->image)
                        <img src="{{ $img->image }}"
                             alt="{{ $img->title ?? 'Image admission' }}"
                             class="w-full h-auto rounded-lg shadow-lg hover:shadow-2xl transition-shadow duration-300" />
                        @endif
                        @endforeach
                    </div>
                @else
                    <div class="w-full text-center py-12 text-gray-400">
                        <svg class="w-16 h-16 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <p>Aucune image disponible</p>
                    </div>
                @endif
            </div>

            {{-- Colonne droite : documents avec téléchargement --}}
            <div class="space-y-4 order-1 lg:order-2">
                @if($documents->count())
                    @foreach($documents as $i => $doc)
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center bg-white p-6 rounded-lg shadow hover:shadow-xl transition-all duration-300 hover:scale-[1.02] group animate-fade-in-up gap-4"
                         style="animation-delay: {{ $i * 100 }}ms">
                        <div class="flex items-center gap-4">
                            <div class="p-3 bg-blue-100 rounded-lg group-hover:bg-blue-200 transition-colors flex-shrink-0">
                                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3 class="text-lg font-semibold text-gray-900">{{ $doc->title }}</h3>
                                @if($doc->description)
                                <p class="text-sm text-gray-600 mt-1">{{ $doc->description }}</p>
                                @endif
                                @if($doc->type)
                                <span class="inline-block mt-1 px-2 py-0.5 bg-gray-100 text-gray-500 text-xs rounded-full font-medium">{{ $doc->type }}</span>
                                @endif
                            </div>
                        </div>

                        @if($doc->document || $doc->file_name)
                        <a href="{{ $doc->document ?? '/documents/'.$doc->file_name }}"
                           download="{{ $doc->file_name ?? $doc->title }}"
                           class="w-full sm:w-auto px-6 py-3 bg-yellow-400 text-white rounded-lg hover:bg-yellow-500 transition-all duration-300 font-bold flex items-center justify-center gap-2 hover:shadow-lg hover:-translate-y-1 whitespace-nowrap">
                            Télécharger
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                        </a>
                        @else
                        <span class="w-full sm:w-auto px-6 py-3 bg-gray-100 text-gray-400 rounded-lg font-bold flex items-center justify-center gap-2 whitespace-nowrap cursor-not-allowed">
                            Non disponible
                        </span>
                        @endif
                    </div>
                    @endforeach
                @else
                    <div class="text-center py-12 bg-white rounded-lg shadow">
                        <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <p class="text-gray-600">Aucun document disponible pour le moment.</p>
                    </div>
                @endif
            </div>
        </div>

        {{-- Info text --}}
        <div class="mt-12 bg-blue-50 border-l-4 border-blue-600 p-6 rounded">
            <p class="text-gray-700 text-center">
                <strong>Important :</strong> {{ $fiches['infoText'] ?? "La fiche d'inscription peut être imprimée, remplie et déposée au secrétariat de CREFER." }}
            </p>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     CONDITIONS D'ADMISSION
══════════════════════════════════════════ --}}
<section class="py-16 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-yellow-50 to-amber-50">
    <div class="max-w-5xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-900 mb-12"
            style="font-family:'Montserrat',sans-serif; letter-spacing:-0.5px;">
            {{ $conditions['heading'] ?? "Conditions d'Admission" }}
        </h2>

        <div class="grid md:grid-cols-2 gap-8">

            {{-- CAP & BT --}}
            <div class="bg-blue-50 p-8 rounded-lg animate-fade-in-up hover:scale-105 transition-transform duration-300 shadow-lg hover:shadow-xl">
                <div class="flex items-center gap-3 mb-6">
                    <svg class="w-8 h-8 text-blue-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                    </svg>
                    <h3 class="text-2xl font-bold text-blue-900" style="font-family:'Montserrat',sans-serif; letter-spacing:-0.3px;">
                        {{ $conditions['capBtTitle'] ?? 'CAP & BT' }}
                    </h3>
                </div>
                <ul class="space-y-4">
                    @foreach(['cap1','cap2','cap3','cap4','cap5'] as $k)
                    @php $val = $conditions[$k] ?? ''; @endphp
                    @if($val)
                    <li class="flex items-start gap-3">
                        <span class="text-yellow-400 font-bold text-lg mt-0.5">✓</span>
                        <span class="text-gray-700">{{ $val }}</span>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>

            {{-- Formation Modulaire --}}
            <div class="bg-green-50 p-8 rounded-lg animate-fade-in-up delay-100 hover:scale-105 transition-transform duration-300 shadow-lg hover:shadow-xl">
                <div class="flex items-center gap-3 mb-6">
                    <svg class="w-8 h-8 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                    <h3 class="text-2xl font-bold text-green-900" style="font-family:'Montserrat',sans-serif; letter-spacing:-0.3px;">
                        {{ $conditions['modulaireTitle'] ?? 'Formation Modulaire' }}
                    </h3>
                </div>
                <ul class="space-y-4">
                    @foreach(['mod1','mod2','mod3','mod4','mod5'] as $k)
                    @php $val = $conditions[$k] ?? ''; @endphp
                    @if($val)
                    <li class="flex items-start gap-3">
                        <span class="text-yellow-400 font-bold text-lg mt-0.5">✓</span>
                        <span class="text-gray-700">{{ $val }}</span>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- ══════════════════════════════════════════
     CTA FINAL
══════════════════════════════════════════ --}}
<section class="relative bg-gradient-to-r from-yellow-600 to-white py-20 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-12 items-center">

            {{-- Contenu gauche --}}
            <div class="animate-fade-in-up">
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6 drop-shadow-lg"
                    style="font-family:'Montserrat',sans-serif; letter-spacing:-0.5px;">
                    {{ $cta['heading'] ?? 'PRÊT À NOUS REJOINDRE ?' }}
                </h2>
                <p class="text-lg text-gray-800 mb-8 drop-shadow-md">
                    {{ $cta['description'] ?? "Faites un pas de plus vers votre carrière dans l'énergie solaire et l'électricité !" }}
                </p>
                <a href="{{ route('contact') }}"
                   class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-yellow-600 to-yellow-700 text-white rounded-lg hover:shadow-lg transition-all duration-300 font-bold text-lg hover:-translate-y-1 hover:scale-105 drop-shadow-lg">
                    <span>{{ $cta['buttonText'] ?? 'Nous contacter' }}</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            </div>

            {{-- Image droite --}}
            <div class="hidden lg:flex justify-center">
                <img src="{{ $ctaImg }}"
                     alt="Inscrivez-vous à CREFER"
                     class="w-full max-w-md h-96 rounded-lg shadow-2xl object-cover hover:shadow-3xl transition-shadow" />
            </div>
        </div>
    </div>
</section>

@endsection
