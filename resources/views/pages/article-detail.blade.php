@extends('layouts.app')
@section('title', $article->title . ' - CREFER')
@section('description', $article->description)

@section('content')
<article class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    {{-- Breadcrumb --}}
    <nav class="flex items-center gap-2 text-sm text-gray-500 mb-8">
        <a href="{{ route('home') }}" class="hover:text-yellow-600">Accueil</a>
        <span>/</span>
        <a href="{{ route('articles') }}" class="hover:text-yellow-600">Actualités</a>
        <span>/</span>
        <span class="text-gray-900 line-clamp-1">{{ $article->title }}</span>
    </nav>

    {{-- Header --}}
    <header class="mb-10">
        @if($article->category)
        <span class="inline-block px-4 py-1 bg-yellow-100 text-yellow-700 text-sm font-bold rounded-full mb-4">{{ $article->category }}</span>
        @endif
        <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-gray-900 mb-6 leading-tight" style="font-family:'Montserrat',sans-serif;">{{ $article->title }}</h1>
        @if($article->date)
        <p class="text-gray-500 text-sm">{{ $article->date }}</p>
        @endif
    </header>

    {{-- Image principale --}}
    @if($article->main_image)
    <div class="relative rounded-2xl overflow-hidden mb-10 shadow-xl">
        <img src="{{ $article->main_image }}" alt="{{ $article->title }}" class="w-full h-96 object-cover" />
    </div>
    @endif

    {{-- Contenu --}}
    <div class="prose prose-lg prose-yellow max-w-none text-gray-700 leading-relaxed mb-12">
        {!! nl2br(e($article->full_content ?? $article->description)) !!}
    </div>

    {{-- Images supplémentaires --}}
    @if($article->images->count())
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-12">
        @foreach($article->images as $img)
        <img src="{{ $img->image_url }}" alt="" class="rounded-xl shadow-md object-cover h-40 w-full" loading="lazy" />
        @endforeach
    </div>
    @endif

    {{-- Retour --}}
    <div class="border-t pt-8">
        <a href="{{ route('articles') }}" class="inline-flex items-center gap-2 text-yellow-600 hover:text-yellow-700 font-semibold">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
            Retour aux actualités
        </a>
    </div>
</article>

{{-- Articles liés --}}
@if($related->count())
<section class="bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-8" style="font-family:'Montserrat',sans-serif;">Articles liés</h2>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach($related as $r)
            <a href="{{ route('article.show', $r->id) }}" class="card-modern rounded-2xl overflow-hidden hover:shadow-xl transition-all">
                @if($r->main_image)<img src="{{ $r->main_image }}" alt="{{ $r->title }}" class="w-full h-40 object-cover" />@endif
                <div class="p-5">
                    <h3 class="font-bold text-gray-900 line-clamp-2 hover:text-yellow-600 transition-colors">{{ $r->title }}</h3>
                    <p class="text-sm text-gray-500 mt-2">{{ $r->date }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
