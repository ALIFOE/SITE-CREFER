@extends('layouts.app')
@section('title', 'Contact - CREFER')
@section('description', 'Contactez-nous pour toute question sur nos formations ou services.')

@section('content')
@php $hero = $content['hero'] ?? []; @endphp

{{-- Hero --}}
<section class="relative min-h-[50vh] text-white flex items-center overflow-hidden bg-cover bg-center"
         style="background-image:url('{{ !empty($hero['backgroundImage']) ? $hero['backgroundImage'] : '/images/theorie2.jpg' }}')">
    <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-black/50 z-10"></div>
    <div class="absolute inset-x-0 bottom-0 h-48 bg-gradient-to-t from-black/80 to-transparent z-10"></div>
    <div class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 relative z-20 pt-32 pb-12 animate-fade-in-up">
        <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight" style="font-family:'Montserrat',sans-serif;letter-spacing:-0.5px;">
            {{ $hero['title'] ?? 'Restons en contact' }}
        </h1>
        <p class="text-lg lg:text-xl text-slate-200 max-w-2xl">
            {{ $hero['subtitle'] ?? 'Nous sommes là pour vous aider. Envoyez-nous un message et nous vous répondrons dans les meilleurs délais.' }}
        </p>
    </div>
</section>

{{-- Contact Form + Infos --}}
<section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-slate-50 via-white to-slate-50">
    <div class="max-w-6xl mx-auto">
        <div class="mb-12">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-3">Envoyez-nous un message</h2>
            <p class="text-gray-600 text-lg">Notre équipe répondra à votre demande dès que possible</p>
        </div>

        @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 px-6 py-4 rounded-xl mb-8 flex items-center gap-3">
            <svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
            {{ session('success') }}
        </div>
        @endif

        <form method="POST" action="{{ route('contact.send') }}">
            @csrf
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-12">
                {{-- Left: fields --}}
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2">Nom &amp; prénom *</label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                               class="w-full px-4 py-3.5 bg-white border border-gray-300 rounded-xl focus:ring-2 focus:ring-yellow-400 focus:border-transparent outline-none transition shadow-sm hover:border-gray-400 @error('name') border-red-400 @enderror"
                               placeholder="Votre nom complet" />
                        @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2">Email *</label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                               class="w-full px-4 py-3.5 bg-white border border-gray-300 rounded-xl focus:ring-2 focus:ring-yellow-400 focus:border-transparent outline-none transition shadow-sm hover:border-gray-400 @error('email') border-red-400 @enderror"
                               placeholder="votre@email.com" />
                        @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2">Téléphone</label>
                        <input type="tel" name="phone" value="{{ old('phone') }}"
                               class="w-full px-4 py-3.5 bg-white border border-gray-300 rounded-xl focus:ring-2 focus:ring-yellow-400 focus:border-transparent outline-none transition shadow-sm hover:border-gray-400"
                               placeholder="+228 XX XX XX XX" />
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-900 mb-2">Sujet *</label>
                        <select name="subject" required
                                class="w-full px-4 py-3.5 bg-white border border-gray-300 rounded-xl focus:ring-2 focus:ring-yellow-400 focus:border-transparent outline-none transition shadow-sm hover:border-gray-400">
                            <option value="">Sélectionnez un sujet</option>
                            <option value="admission" {{ old('subject') === 'admission' ? 'selected' : '' }}>Admission</option>
                            <option value="formation" {{ old('subject') === 'formation' ? 'selected' : '' }}>Formation</option>
                            <option value="partenariat" {{ old('subject') === 'partenariat' ? 'selected' : '' }}>Partenariat</option>
                            <option value="autre" {{ old('subject') === 'autre' ? 'selected' : '' }}>Autre</option>
                        </select>
                        @error('subject')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <button type="submit"
                            class="w-full px-6 py-3.5 bg-gradient-to-r from-yellow-400 to-yellow-500 text-white rounded-xl hover:from-yellow-500 hover:to-yellow-600 transition-all font-bold text-lg mt-4 shadow-lg hover:shadow-xl btn-modern">
                        Envoyer le message
                    </button>
                </div>

                {{-- Right: message --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-900 mb-2">Message *</label>
                    <textarea name="message" rows="15" required
                              class="w-full px-4 py-3.5 bg-white border border-gray-300 rounded-xl focus:ring-2 focus:ring-yellow-400 focus:border-transparent outline-none transition shadow-sm hover:border-gray-400 resize-none @error('message') border-red-400 @enderror"
                              placeholder="Écrivez votre message ici...">{{ old('message') }}</textarea>
                    @error('message')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
            </div>
        </form>
    </div>
</section>

{{-- Info Cards --}}
<section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-white via-slate-50 to-white">
    <div class="max-w-6xl mx-auto">
        <div class="mb-14">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-3" style="font-family:'Montserrat',sans-serif;letter-spacing:-0.5px;">
                Autres moyens de nous contacter
            </h2>
            <p class="text-gray-600 text-lg">Nous vous répondrons rapidement via le canal de votre choix</p>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            {{-- Adresse --}}
            <div class="group bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 p-8 border border-gray-100 hover:border-yellow-200">
                <div class="w-14 h-14 bg-gradient-to-br from-yellow-100 to-yellow-50 rounded-xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-7 h-7 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-3">Adresse</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Lomé-TOGO,<br />
                    Siège Social quartier Totsi — Gblenkômé<br />
                    près de la salle des témoins de Jéhovah<br />
                    Annexe au bord des pavés de Totsi non loin de l'agence TogoCom
                </p>
            </div>

            {{-- Email --}}
            <div class="group bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 p-8 border border-gray-100 hover:border-blue-200">
                <div class="w-14 h-14 bg-gradient-to-br from-blue-100 to-blue-50 rounded-xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-7 h-7 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-3">Email</h3>
                <a href="mailto:contact@crefer.tech" class="text-blue-600 hover:text-blue-700 font-semibold transition-colors hover:underline text-sm">
                    contact@crefer.tech
                </a>
            </div>

            {{-- Téléphone --}}
            <div class="group bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 p-8 border border-gray-100 hover:border-green-200">
                <div class="w-14 h-14 bg-gradient-to-br from-green-100 to-green-50 rounded-xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-3">Téléphone</h3>
                <div class="text-sm space-y-2">
                    <a href="tel:+22891204373" class="text-green-600 hover:text-green-700 font-semibold transition-colors hover:underline block">(+228) 91 20 43 73</a>
                    <a href="tel:+22892531455" class="text-green-600 hover:text-green-700 font-semibold transition-colors hover:underline block">(+228) 92 53 14 55</a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Map --}}
<section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-slate-50 via-indigo-50 to-slate-50">
    <div class="max-w-6xl mx-auto">
        <div class="mb-10">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-2" style="font-family:'Montserrat',sans-serif;letter-spacing:-0.5px;">Localisation</h2>
            <p class="text-gray-600 text-lg">Trouvez-nous facilement à Lomé</p>
        </div>
        <div class="w-full h-96 rounded-2xl shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition-shadow duration-300">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.2441234567894!2d1.1030607!3d6.1883976!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1021590e04739e1f%3A0xeb6875f1fa1aca85!2sLom%C3%A9!5e0!3m2!1sfr!2stg!4v1234567890"
                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="mt-8 text-center">
            <a href="https://www.google.com/maps/search/Totsi+Lomé+Togo" target="_blank" rel="noopener noreferrer"
               class="inline-block px-8 py-3.5 bg-gradient-to-r from-yellow-400 to-yellow-500 text-white rounded-xl hover:from-yellow-500 hover:to-yellow-600 transition-all font-semibold shadow-lg hover:shadow-xl hover:scale-105">
                Ouvrir dans Google Maps
            </a>
        </div>
    </div>
</section>

@endsection
