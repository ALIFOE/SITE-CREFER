@extends('layouts.admin')
@section('title', 'Pages CMS')
@section('page-title', 'Gestion des pages')

@section('content')
<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($pages as $page)
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow">
        <div class="flex items-start justify-between mb-4">
            <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            </div>
            <span class="text-xs text-gray-400 bg-gray-100 px-2 py-1 rounded-full">{{ $page->sections_count }} section(s)</span>
        </div>
        <h3 class="font-bold text-gray-900 mb-1">{{ $page->title ?? $page->page_key }}</h3>
        <p class="text-xs text-gray-400 font-mono mb-4">{{ $page->page_key }}</p>
        <a href="{{ route('admin.pages.edit', $page) }}" class="block w-full text-center py-2 bg-yellow-50 hover:bg-yellow-100 text-yellow-700 rounded-lg text-sm font-semibold transition-colors">
            Éditer les sections
        </a>
    </div>
    @empty
    <div class="col-span-full text-center py-12 text-gray-500">Aucune page CMS configurée.</div>
    @endforelse
</div>
@endsection
