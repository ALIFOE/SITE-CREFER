@extends('layouts.app')
@section('title', 'Actualités - CREFER')
@section('description', 'Consultez les dernières actualités, événements et annonces du CREFER.')

@section('content')
{{-- Hero --}}
<section class="relative py-8 px-4 sm:px-6 lg:px-8 overflow-hidden bg-cover bg-center"
         style="background-image:url('/images/theorie1.jpg')">
    <div class="absolute inset-0 bg-gradient-to-r from-black/70 to-black/50 z-10"></div>
    <div class="absolute inset-x-0 bottom-0 h-48 bg-gradient-to-t from-slate-950 via-black/60 to-transparent z-15"></div>
    <div class="max-w-6xl mx-auto relative z-20 pt-10 pb-8">
        <h1 class="text-4xl lg:text-6xl font-bold text-white mb-4 leading-tight" style="font-family:'Montserrat',sans-serif;letter-spacing:-0.5px;">Actualités & Projets</h1>
        <p class="text-lg lg:text-xl text-slate-200">Découvrez les dernières actualités et projets de CREFER</p>
    </div>
</section>

{{-- Vidéos --}}
@if($videos->count())
<section class="py-16 bg-gradient-to-b from-slate-50 via-red-50 to-slate-50">
    <div class="px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div class="mb-12">
            <h2 class="inline-block px-4 py-2 bg-yellow-400 text-2xl font-bold rounded" style="font-family:'Montserrat',sans-serif;">Echo du CREFER</h2>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            @foreach($videos as $video)
            <div class="group overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all duration-300 bg-white">
                <div class="w-full aspect-video bg-black overflow-hidden rounded-t-xl">
                    <iframe src="https://www.youtube.com/embed/{{ $video->youtube_id }}"
                            title="{{ $video->title }}" class="w-full h-full" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2" style="font-family:'Montserrat',sans-serif;">{{ $video->title }}</h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $video->description }}</p>
                    <div class="flex gap-4 text-sm text-gray-500 mb-4">
                        @if($video->date)<span>{{ $video->date }}</span>@endif
                        @if($video->category)<span>{{ $video->category }}</span>@endif
                    </div>
                    <a href="https://www.youtube.com/watch?v={{ $video->youtube_id }}" target="_blank" rel="noopener"
                       class="inline-flex items-center gap-2 py-2 px-4 rounded-lg bg-red-600 hover:bg-red-700 text-white font-semibold transition-all duration-200 shadow-sm hover:shadow">
                        <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                        </svg>
                        Voir sur YouTube
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Articles --}}
<section class="py-16 bg-gradient-to-b from-slate-50 via-white to-slate-50">
    <div class="px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
        <div class="mb-12">
            <h2 class="inline-block px-4 py-2 bg-yellow-400 text-gray-900 text-2xl font-bold rounded" style="font-family:'Montserrat',sans-serif;">Derniers articles</h2>
        </div>
        @if($articles->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($articles->take(8) as $article)
            <div class="group overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all duration-300 bg-white">
                <div class="w-full h-40 bg-gray-100 overflow-hidden rounded-t-xl">
                    @if($article->main_image)
                    <img src="{{ $article->main_image }}" alt="{{ $article->title }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
                    @else
                    <div class="w-full h-full bg-gradient-to-br from-blue-200 to-blue-400 flex items-center justify-center">
                        <svg class="w-12 h-12 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    @endif
                </div>
                <div class="p-4 flex flex-col justify-between h-48">
                    <a href="{{ route('article.show', $article->id) }}" class="text-base font-bold text-gray-900 hover:text-yellow-600 transition-colors line-clamp-3">
                        {{ $article->title }}
                    </a>
                    <div class="flex items-center gap-2 text-xs text-gray-500 mb-2">
                        @if($article->category)<span class="inline-block px-2 py-1 bg-gray-100 rounded text-xs font-semibold">{{ $article->category }}</span>@endif
                        @if($article->date)<span>{{ $article->date }}</span>@endif
                    </div>
                    <a href="{{ route('article.show', $article->id) }}" class="text-yellow-600 hover:text-yellow-700 font-semibold text-xs transition-colors">
                        Lire l'article »
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p class="text-center py-12 text-gray-600 text-lg">Aucun article disponible pour le moment.</p>
        @endif
    </div>
</section>
@endsection
