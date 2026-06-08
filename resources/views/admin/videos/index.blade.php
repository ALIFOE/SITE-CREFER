@extends('layouts.admin')
@section('title', 'Vidéos')
@section('page-title', 'Vidéos YouTube')

@section('content')
<div class="flex justify-between items-center mb-6">
    <p class="text-gray-600 text-sm">{{ $videos->count() }} vidéo(s)</p>
    <a href="{{ route('admin.videos.create') }}" class="px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-white rounded-lg font-semibold text-sm flex items-center gap-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Ajouter une vidéo
    </a>
</div>
<div class="grid md:grid-cols-2 gap-6">
    @forelse($videos as $video)
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        @if($video->youtube_id)
        <div class="aspect-video bg-black">
            <iframe src="https://www.youtube.com/embed/{{ $video->youtube_id }}"
                    class="w-full h-full" frameborder="0" allowfullscreen></iframe>
        </div>
        @endif
        <div class="p-4">
            <h3 class="font-bold text-gray-900 mb-1 line-clamp-1">{{ $video->title }}</h3>
            <p class="text-gray-500 text-xs mb-3">{{ $video->category }} • {{ $video->date }}</p>
            <div class="flex gap-2">
                <a href="{{ route('admin.videos.edit', $video) }}" class="flex-1 text-center py-2 bg-blue-50 hover:bg-blue-100 text-blue-600 rounded-lg text-sm font-medium">Modifier</a>
                <form method="POST" action="{{ route('admin.videos.destroy', $video) }}" onsubmit="return confirm('Supprimer ?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-50 hover:bg-red-100 text-red-600 rounded-lg text-sm font-medium">✕</button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-full text-center py-12 text-gray-500">Aucune vidéo.</div>
    @endforelse
</div>
@endsection
