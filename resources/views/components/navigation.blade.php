@php $current = request()->path(); @endphp

<nav class="fixed top-12 left-0 right-0 z-50 backdrop-blur-2xl bg-gradient-to-b from-black/70 via-black/50 to-transparent shadow-sm"
     x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex-shrink-0 group transition-all duration-300">
                <img src="/images/crefer Logo2.png" alt="CREFER Logo" class="h-10 w-auto group-hover:scale-110 transition-all duration-300" />
            </a>

            {{-- Desktop links --}}
            <div class="hidden lg:flex items-center space-x-8">
                @php
                    $links = [
                        ['/', 'Accueil'],
                        ['admissions', 'Admissions'],
                        ['about', 'À propos'],
                        ['gallery', 'Galerie'],
                        ['contact', 'Contact'],
                        ['articles', 'Actualités'],
                    ];
                @endphp
                @foreach($links as [$path, $label])
                    @php $active = ('/' === $path ? $current === '' : str_starts_with('/'.$current, $path)); @endphp
                    <a href="{{ url($path) }}"
                       class="relative text-white font-medium text-sm transition-all duration-300 hover:text-yellow-300 group px-3 py-1 rounded-lg bg-black/20 {{ $active ? 'bg-yellow-500 font-semibold' : 'hover:bg-black/40' }}">
                        {{ $label }}
                        <span class="absolute bottom-0 left-0 h-1 bg-gradient-to-r from-yellow-400 to-yellow-500 group-hover:w-full transition-all duration-300 {{ $active ? 'w-0' : 'w-0' }}"></span>
                    </a>
                @endforeach
            </div>

            {{-- CTA --}}
            <div class="hidden lg:block">
                <a href="{{ route('contact') }}"
                   class="px-6 py-2.5 bg-gradient-to-r from-yellow-400 to-yellow-500 text-white rounded-xl hover:shadow-lg hover:scale-105 transition-all duration-300 font-semibold text-sm">
                    Candidater
                </a>
            </div>

            {{-- Mobile button --}}
            <button @click="open = !open"
                    class="lg:hidden inline-flex items-center justify-center p-2.5 rounded-lg hover:bg-white/20 focus:outline-none transition-colors duration-300">
                <svg x-show="!open" class="h-6 w-6 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="open" class="h-6 w-6 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24" style="display:none;">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Mobile menu --}}
        <div x-show="open" x-transition class="lg:hidden pb-4 space-y-1" style="display:none;">
            @foreach($links as [$path, $label])
                @php $active = ('/' === $path ? $current === '' : str_starts_with('/'.$current, $path)); @endphp
                <a href="{{ url($path) }}" @click="open=false"
                   class="block px-4 py-3 rounded-lg hover:bg-black/40 text-white hover:text-yellow-300 transition-colors duration-300 font-medium text-sm {{ $active ? 'bg-yellow-500' : '' }}">
                    {{ $label }}
                </a>
            @endforeach
            <a href="{{ route('contact') }}" @click="open=false"
               class="block w-full mt-4 px-6 py-3 bg-gradient-to-r from-yellow-400 to-yellow-500 text-white rounded-xl hover:shadow-lg transition-all duration-300 font-semibold text-center text-sm">
                Candidater
            </a>
        </div>
    </div>
</nav>
