@extends('layouts.admin')
@section('title', 'Articles')
@section('page-title', 'Articles')

@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-gray-600 text-sm">{{ $articles->count() }} article(s)</p>
    <a href="{{ route('admin.articles.create') }}" class="px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-white rounded-lg font-semibold text-sm transition-colors flex items-center gap-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Nouvel article
    </a>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden overflow-x-auto">
    <table class="w-full text-sm min-w-[640px]">
        <thead class="bg-gray-50 border-b border-gray-100">
            <tr>
                <th class="text-left px-6 py-4 font-semibold text-gray-600">Image</th>
                <th class="text-left px-6 py-4 font-semibold text-gray-600">Titre</th>
                <th class="text-left px-6 py-4 font-semibold text-gray-600">Catégorie</th>
                <th class="text-left px-6 py-4 font-semibold text-gray-600">Date</th>
                <th class="text-right px-6 py-4 font-semibold text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @forelse($articles as $article)
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-6 py-4">
                    @if($article->main_image)
                    <img src="{{ $article->main_image }}" alt="" class="w-14 h-10 object-cover rounded-lg" />
                    @else
                    <div class="w-14 h-10 bg-gray-200 rounded-lg"></div>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <p class="font-semibold text-gray-900 line-clamp-1">{{ $article->title }}</p>
                    <p class="text-gray-400 text-xs mt-0.5 line-clamp-1">{{ $article->description }}</p>
                </td>
                <td class="px-6 py-4"><span class="px-2 py-1 bg-yellow-100 text-yellow-700 text-xs rounded-full font-medium">{{ $article->category }}</span></td>
                <td class="px-6 py-4 text-gray-500">{{ $article->date }}</td>
                <td class="px-6 py-4">
                    <div class="flex items-center justify-end gap-2">
                        <a href="{{ route('admin.articles.edit', $article) }}" class="px-3 py-1.5 bg-blue-50 hover:bg-blue-100 text-blue-600 rounded-lg text-xs font-medium transition-colors">Modifier</a>
                        <form method="POST" action="{{ route('admin.articles.destroy', $article) }}" onsubmit="return confirm('Supprimer cet article ?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="px-3 py-1.5 bg-red-50 hover:bg-red-100 text-red-600 rounded-lg text-xs font-medium transition-colors">Supprimer</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="px-6 py-12 text-center text-gray-500">Aucun article.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
