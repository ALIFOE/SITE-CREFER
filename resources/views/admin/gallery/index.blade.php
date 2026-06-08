@extends('layouts.admin')
@section('title', 'Galerie')
@section('page-title', 'Galerie')

@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-gray-600 text-sm">{{ $items->count() }} image(s)</p>
    <a href="{{ route('admin.gallery.create') }}" class="px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-white rounded-lg font-semibold text-sm transition-colors flex items-center gap-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Ajouter une image
    </a>
</div>

<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @forelse($items as $item)
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden group">
        <div class="relative h-40">
            @if($item->image)
            <img src="{{ $item->image }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
            @else
            <div class="w-full h-full bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
            @endif
            @if($item->category)
            <span class="absolute top-2 left-2 px-2 py-0.5 bg-black/60 text-white text-xs rounded-full">{{ $item->category }}</span>
            @endif
        </div>
        <div class="p-3">
            <p class="font-semibold text-gray-900 text-sm truncate">{{ $item->title }}</p>
            <div class="flex gap-2 mt-2">
                <a href="{{ route('admin.gallery.edit', $item) }}" class="flex-1 text-center py-1.5 bg-blue-50 hover:bg-blue-100 text-blue-600 rounded-lg text-xs font-medium transition-colors">Modifier</a>
                <form method="POST" action="{{ route('admin.gallery.destroy', $item) }}" onsubmit="return confirm('Supprimer ?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="px-3 py-1.5 bg-red-50 hover:bg-red-100 text-red-600 rounded-lg text-xs font-medium transition-colors">✕</button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-full text-center py-12 text-gray-500">Aucune image dans la galerie.</div>
    @endforelse
</div>
@endsection
