@extends('layouts.app')
@section('title', 'Galerie - CREFER')
@section('description', 'Découvrez la vie au CREFER à travers nos photos et vidéos.')

@section('content')
{{-- Hero --}}
<section class="relative min-h-[60vh] text-white flex items-center overflow-hidden bg-cover bg-center"
         style="background-image:url('/images/CHANTIER.jpg')">
    <div class="absolute inset-0 bg-black/55 z-10"></div>
    <div class="absolute inset-x-0 bottom-0 h-44 bg-gradient-to-t from-black/90 to-transparent z-15"></div>
    <div class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 relative z-20 py-20 animate-fade-in-up">
        <div class="text-yellow-300 text-sm font-semibold tracking-widest uppercase mb-4">Galerie</div>
        <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-6" style="font-family:'Montserrat',sans-serif;">GALERIE DES PROJETS & FORMATIONS</h1>
        <p class="text-xl text-blue-100 mb-8">Découvrez nos installations, nos étudiants et nos ateliers pratiques</p>
        <a href="{{ route('contact') }}"
           class="inline-flex items-center gap-2 px-8 py-4 bg-yellow-400 text-gray-900 rounded-lg hover:bg-yellow-500 transition-colors font-bold text-lg hover:shadow-lg transform hover:-translate-y-1">
            Demander une visite
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
            </svg>
        </a>
    </div>
</section>

{{-- Galerie avec filtre Alpine.js --}}
<section class="py-16 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-blue-50 to-cyan-50"
         x-data="{
            selected: 'Tous',
            lightbox: false,
            current: 0,
            items: {{ Js::from($items) }},
            get filtered() {
                if (this.selected === 'Tous') return this.items;
                return this.items.filter(i => i.category === this.selected);
            },
            open(idx) { this.current = idx; this.lightbox = true; },
            close() { this.lightbox = false; },
            prev() { if(this.current > 0) this.current--; },
            next() { if(this.current < this.filtered.length - 1) this.current++; }
         }"
         @keydown.escape.window="close()"
         @keydown.arrow-left.window="prev()"
         @keydown.arrow-right.window="next()">
    <div class="max-w-7xl mx-auto">
        {{-- Filtres --}}
        <div class="flex justify-center gap-4 mb-12 flex-wrap">
            <button @click="selected='Tous'"
                    :class="selected==='Tous' ? 'bg-yellow-400 text-gray-900 shadow-lg' : 'bg-white text-gray-700 border-2 border-gray-300 hover:border-yellow-400'"
                    class="px-6 py-2 rounded-full font-semibold transition-colors hover:scale-105 hover:shadow-lg">
                Tous
            </button>
            @foreach($categories as $cat)
            <button @click="selected='{{ $cat }}'"
                    :class="selected==='{{ $cat }}' ? 'bg-yellow-400 text-gray-900 shadow-lg' : 'bg-white text-gray-700 border-2 border-gray-300 hover:border-yellow-400'"
                    class="px-6 py-2 rounded-full font-semibold transition-colors hover:scale-105 hover:shadow-lg">
                {{ $cat }}
            </button>
            @endforeach
        </div>

        {{-- Grille --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <template x-for="(item, index) in filtered" :key="item.id">
                <div @click="open(index)"
                     class="group relative overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300 cursor-pointer">
                    <div class="w-full h-64 overflow-hidden">
                        <img :src="item.image" :alt="item.title" loading="lazy"
                             class="w-full h-full object-cover object-center group-hover:scale-110 transition-transform duration-500" />
                    </div>
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/60 transition-colors duration-300 flex items-end">
                        <div class="w-full p-6 text-white transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                            <h3 class="font-bold text-lg" style="font-family:'Montserrat',sans-serif;" x-text="item.title"></h3>
                            <p class="text-sm opacity-90" x-text="item.description"></p>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <p x-show="filtered.length === 0" class="text-center py-12 text-gray-500 text-lg">Aucune image dans cette catégorie</p>
    </div>

    {{-- Lightbox --}}
    <div x-show="lightbox" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
         class="fixed inset-0 bg-black/95 z-50 flex items-center justify-center p-4"
         @click.self="close()" style="display:none;">
        <button @click="close()" class="absolute top-6 right-6 text-white hover:text-yellow-400 transition-colors z-60">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
        <div class="relative max-w-5xl w-full h-5/6 flex flex-col justify-center">
            <div class="relative w-full h-full flex items-center justify-center">
                <img :src="filtered[current]?.image" :alt="filtered[current]?.title" class="w-full h-full object-contain rounded-lg" />
                <button @click="prev()" :disabled="current===0" class="absolute top-1/2 -translate-y-1/2 left-2 sm:left-4 bg-yellow-400/60 hover:bg-yellow-500/80 disabled:bg-gray-500/40 disabled:cursor-not-allowed text-gray-900 p-3 sm:p-4 rounded-full transition-colors z-20 hover:scale-110">
                    <svg class="w-6 sm:w-8 h-6 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <button @click="next()" :disabled="current===filtered.length-1" class="absolute top-1/2 -translate-y-1/2 right-2 sm:right-4 bg-yellow-400/60 hover:bg-yellow-500/80 disabled:bg-gray-500/40 disabled:cursor-not-allowed text-gray-900 p-3 sm:p-4 rounded-full transition-colors z-20 hover:scale-110">
                    <svg class="w-6 sm:w-8 h-6 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>
            <div class="mt-6 text-white text-center">
                <h3 class="text-2xl font-bold mb-2" style="font-family:'Montserrat',sans-serif;" x-text="filtered[current]?.title"></h3>
                <p class="text-gray-300 mb-4" x-text="filtered[current]?.description"></p>
                <p class="text-gray-400 text-sm" x-text="(current+1) + ' / ' + filtered.length"></p>
            </div>
        </div>
    </div>
</section>
@endsection
