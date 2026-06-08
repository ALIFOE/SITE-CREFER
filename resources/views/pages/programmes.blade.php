@extends('layouts.app')
@section('title', 'Programmes - CREFER')
@section('description', 'Consultez tous nos programmes de formation et choisissez celui qui vous convient.')

@section('content')
{{-- Hero --}}
<section class="relative min-h-[60vh] text-white flex items-center overflow-hidden bg-cover bg-center"
         style="background-image:url('/images/CHANTIER.jpg')">
    <div class="absolute inset-0 bg-black/55 z-10"></div>
    <div class="absolute inset-x-0 bottom-0 h-44 bg-gradient-to-t from-black/90 to-transparent"></div>
    <div class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 relative z-20 py-20">
        <div class="text-yellow-300 text-sm font-semibold tracking-widest uppercase mb-4">Nos Formations</div>
        <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-6" style="font-family:'Montserrat',sans-serif;">Programmes d'Études CREFER</h1>
        <p class="text-xl text-blue-100">Des formations certifiantes pour les métiers de l'énergie</p>
    </div>
</section>

{{-- Liste des programmes --}}
<section class="section-spacing bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-3 gap-10">
            @foreach([
                ['cap','CAP Électricité','12 mois','Niveau 1','Formation de base en installation électrique et solaire.','blue','/images/_DSC0294.jpg'],
                ['bt','BT Électrotechnique','24 mois','Niveau 2','Formation avancée en électrotechnique et systèmes énergétiques.','yellow','/images/theorie1.jpg'],
                ['modulaire','Formation Modulaire','Variable','Flexible','Modules spécialisés adaptés à votre besoin.','green','/images/CHANTIER2.jpg'],
            ] as [$route,$title,$duration,$level,$desc,$color,$img])
            <div class="card-modern rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all">
                <div class="relative h-48">
                    <img src="{{ $img }}" alt="{{ $title }}" class="w-full h-full object-cover" />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end p-4">
                        <span class="px-3 py-1 bg-{{ $color }}-400 text-white text-xs font-bold rounded-full">{{ $level }}</span>
                    </div>
                </div>
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-gray-900 mb-2" style="font-family:'Montserrat',sans-serif;">{{ $title }}</h2>
                    <p class="text-gray-600 mb-4 text-sm">{{ $desc }}</p>
                    <div class="flex items-center gap-4 text-sm text-gray-500 mb-6">
                        <span class="flex items-center gap-1">⏱ {{ $duration }}</span>
                    </div>
                    <a href="{{ route($route) }}" class="block w-full text-center px-6 py-3 bg-gradient-to-r from-{{ $color }}-500 to-{{ $color }}-500 text-white font-semibold rounded-xl hover:shadow-lg transition-all">
                        Voir le programme
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
