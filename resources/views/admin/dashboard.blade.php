@extends('layouts.admin')
@section('title', 'Tableau de bord')
@section('page-title', 'Tableau de bord')

@section('content')
{{-- Bienvenue --}}
<div class="mb-8 bg-gradient-to-r from-gray-900 to-gray-700 rounded-2xl p-6 text-white flex items-center justify-between">
    <div>
        <p class="text-gray-400 text-sm mb-1">Bonjour,</p>
        <h2 class="text-2xl font-bold" style="font-family:'Montserrat',sans-serif;">{{ auth()->user()->name ?? 'Administrateur' }}</h2>
        <p class="text-gray-300 text-sm mt-1">{{ now()->locale('fr')->isoFormat('dddd D MMMM YYYY') }}</p>
    </div>
    <div class="hidden sm:flex flex-col items-end gap-2">
        <a href="{{ url('/') }}" target="_blank" class="flex items-center gap-2 px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-gray-900 rounded-lg text-sm font-bold transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            Voir le site public
        </a>
    </div>
</div>

{{-- Stats --}}
<div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 mb-8">
    @foreach([
        ['articles',  'Articles',   'yellow', route('admin.articles'), '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>'],
        ['gallery',   'Galerie',    'blue',   route('admin.gallery'),  '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>'],
        ['videos',    'Vidéos',     'red',    route('admin.videos'),   '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.069A1 1 0 0121 8.82v6.36a1 1 0 01-1.447.89L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>'],
        ['pages',     'Pages CMS',  'green',  route('admin.pages'),    '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>'],
        ['admImages', 'Admissions', 'purple', route('admin.admissions'), '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>'],
        ['admDocs',   'Documents',  'indigo', route('admin.admissions'), '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>'],
    ] as [$key, $label, $color, $link, $icon])
    <a href="{{ $link }}" class="bg-white rounded-xl p-5 shadow-sm border border-gray-100 hover:shadow-md hover:border-{{ $color }}-200 transition-all group">
        <div class="flex items-center justify-between mb-3">
            <div class="w-9 h-9 bg-{{ $color }}-100 rounded-lg flex items-center justify-center group-hover:bg-{{ $color }}-200 transition-colors">
                <svg class="w-5 h-5 text-{{ $color }}-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $icon !!}</svg>
            </div>
            <svg class="w-4 h-4 text-gray-300 group-hover:text-{{ $color }}-400 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </div>
        <p class="text-2xl font-bold text-gray-900 mb-0.5">{{ $stats[$key] }}</p>
        <p class="text-xs text-gray-500 font-medium">{{ $label }}</p>
    </a>
    @endforeach
</div>

<div class="grid lg:grid-cols-2 gap-8">
    {{-- Derniers articles --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center justify-between mb-6">
            <h2 class="font-bold text-gray-900 text-lg flex items-center gap-2">
                <span class="w-1 h-5 bg-yellow-400 rounded inline-block"></span>Derniers articles
            </h2>
            <a href="{{ route('admin.articles.create') }}" class="flex items-center gap-1 text-xs px-3 py-1.5 bg-yellow-400 hover:bg-yellow-500 text-white rounded-lg font-semibold transition-colors">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Nouvel article
            </a>
        </div>
        @forelse($latestArticles as $article)
        <div class="flex items-center gap-4 py-3 border-b border-gray-50 last:border-0">
            @if($article->main_image)
            <img src="{{ $article->main_image }}" alt="" class="w-12 h-12 rounded-lg object-cover flex-shrink-0 border border-gray-100" />
            @else
            <div class="w-12 h-12 bg-gray-100 rounded-lg flex-shrink-0 flex items-center justify-center">
                <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01"/></svg>
            </div>
            @endif
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-gray-900 truncate">{{ $article->title }}</p>
                <p class="text-xs text-gray-400 mt-0.5">
                    @if($article->category)<span class="inline-block px-1.5 py-0.5 bg-yellow-100 text-yellow-700 rounded text-xs mr-1">{{ $article->category }}</span>@endif
                    {{ $article->date }}
                </p>
            </div>
            <div class="flex gap-1 flex-shrink-0">
                <a href="{{ route('article.show', $article->id) }}" target="_blank" class="p-1.5 text-gray-400 hover:text-green-600 hover:bg-green-50 rounded transition-colors" title="Voir">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </a>
                <a href="{{ route('admin.articles.edit', $article) }}" class="p-1.5 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded transition-colors" title="Modifier">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                </a>
            </div>
        </div>
        @empty
        <div class="text-center py-8">
            <svg class="w-10 h-10 text-gray-200 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            <p class="text-gray-400 text-sm">Aucun article pour l'instant.</p>
            <a href="{{ route('admin.articles.create') }}" class="mt-2 inline-block text-xs text-yellow-600 hover:text-yellow-700 font-semibold">Créer le premier →</a>
        </div>
        @endforelse
        @if($latestArticles->count())
        <div class="mt-4 pt-4 border-t border-gray-50">
            <a href="{{ route('admin.articles') }}" class="text-sm text-yellow-600 hover:text-yellow-700 font-semibold flex items-center gap-1">
                Voir tous les articles
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
        @endif
    </div>

    {{-- Pages CMS + Accès rapide --}}
    <div class="space-y-6">
        {{-- Pages CMS --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-5">
                <h2 class="font-bold text-gray-900 text-lg flex items-center gap-2">
                    <span class="w-1 h-5 bg-green-400 rounded inline-block"></span>Pages du site
                </h2>
                <a href="{{ route('admin.pages') }}" class="text-sm text-green-600 hover:text-green-700 font-medium">Gérer →</a>
            </div>
            @forelse($pages as $page)
            <div class="flex items-center justify-between py-2.5 border-b border-gray-50 last:border-0">
                <div class="flex items-center gap-3">
                    <div class="w-7 h-7 bg-green-100 rounded-lg flex items-center justify-center">
                        <svg class="w-3.5 h-3.5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-900">{{ $page->title ?? $page->page_key }}</p>
                        <p class="text-xs text-gray-400 font-mono">{{ $page->page_key }}</p>
                    </div>
                </div>
                <a href="{{ route('admin.pages.edit', $page) }}" class="text-xs px-3 py-1.5 bg-green-50 hover:bg-green-100 text-green-700 rounded-lg font-medium transition-colors">Éditer</a>
            </div>
            @empty
            <p class="text-gray-400 text-sm text-center py-4">Aucune page configurée.</p>
            @endforelse
        </div>

        {{-- Accès rapide --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h2 class="font-bold text-gray-900 text-lg mb-4 flex items-center gap-2">
                <span class="w-1 h-5 bg-blue-400 rounded inline-block"></span>Accès rapide
            </h2>
            <div class="grid grid-cols-2 gap-3">
                <a href="{{ route('admin.videos.create') }}" class="flex items-center gap-2 p-3 bg-red-50 hover:bg-red-100 text-red-700 rounded-lg text-sm font-semibold transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Nouvelle vidéo
                </a>
                <a href="{{ route('admin.gallery.create') }}" class="flex items-center gap-2 p-3 bg-blue-50 hover:bg-blue-100 text-blue-700 rounded-lg text-sm font-semibold transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Ajouter photo
                </a>
                <a href="{{ route('admin.admissions') }}" class="flex items-center gap-2 p-3 bg-purple-50 hover:bg-purple-100 text-purple-700 rounded-lg text-sm font-semibold transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197"/></svg>
                    Admissions
                </a>
                <a href="{{ route('admin.videos') }}" class="flex items-center gap-2 p-3 bg-gray-50 hover:bg-gray-100 text-gray-700 rounded-lg text-sm font-semibold transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.069A1 1 0 0121 8.82v6.36a1 1 0 01-1.447.89L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                    Vidéos YouTube
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
