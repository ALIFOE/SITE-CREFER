@extends('layouts.admin')
@section('title', $video ? 'Modifier la vidéo' : 'Nouvelle vidéo')
@section('page-title', $video ? 'Modifier la vidéo' : 'Nouvelle vidéo')

@section('content')
<div class="max-w-3xl" x-data="youtubeForm()">
    <div class="mb-6">
        <a href="{{ route('admin.videos') }}" class="text-sm text-gray-500 hover:text-gray-700 flex items-center gap-1">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
            Retour aux vidéos
        </a>
    </div>

    <form method="POST" action="{{ $video ? route('admin.videos.update', $video) : route('admin.videos.store') }}" class="space-y-6">
        @csrf
        @if($video) @method('PUT') @endif

        <div class="grid lg:grid-cols-2 gap-6">
            {{-- Formulaire --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 space-y-5">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Titre *</label>
                    <input type="text" name="title" value="{{ old('title', $video?->title) }}" required
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-yellow-400 outline-none transition" />
                </div>

                {{-- URL YouTube (auto-extraction) --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        URL ou ID YouTube
                        <span class="text-xs font-normal text-gray-400 ml-1">— coller l'URL complète ou l'ID</span>
                    </label>
                    <input type="text" x-model="urlInput" @input="extractId()"
                           placeholder="https://www.youtube.com/watch?v=... ou ID seul"
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-yellow-400 outline-none transition text-sm" />
                    <p class="text-xs text-gray-400 mt-1">L'ID est extrait automatiquement depuis l'URL YouTube</p>
                </div>

                {{-- Champ caché avec l'ID extrait --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">ID YouTube extrait</label>
                    <div class="flex items-center gap-2">
                        <input type="text" name="youtube_id" x-model="youtubeId"
                               class="flex-1 px-4 py-3 border rounded-xl outline-none transition text-sm font-mono"
                               :class="youtubeId ? 'border-green-300 bg-green-50 focus:ring-2 focus:ring-green-400' : 'border-gray-300 focus:ring-2 focus:ring-yellow-400'" />
                        <span x-show="youtubeId" class="text-green-500">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        </span>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Catégorie</label>
                        <input type="text" name="category" value="{{ old('category', $video?->category) }}"
                               placeholder="ex: Formation, Événement..."
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-yellow-400 outline-none transition" />
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Date</label>
                        <input type="date" name="date" value="{{ old('date', $video?->date) }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-yellow-400 outline-none transition" />
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                    <textarea name="description" rows="3"
                              class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-yellow-400 outline-none transition resize-none">{{ old('description', $video?->description) }}</textarea>
                </div>
            </div>

            {{-- Prévisualisation --}}
            <div class="space-y-4">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                    <p class="text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                        <svg class="w-4 h-4 text-red-500" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        Prévisualisation YouTube
                    </p>
                    <div class="aspect-video bg-gray-100 rounded-lg overflow-hidden">
                        <template x-if="youtubeId">
                            <iframe :src="'https://www.youtube.com/embed/' + youtubeId"
                                    class="w-full h-full" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                        </template>
                        <template x-if="!youtubeId">
                            <div class="w-full h-full flex flex-col items-center justify-center text-gray-400 gap-2">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10l4.553-2.069A1 1 0 0121 8.82v6.36a1 1 0 01-1.447.89L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                                <p class="text-sm">Entrez un ID YouTube pour voir la prévisualisation</p>
                            </div>
                        </template>
                    </div>
                    <template x-if="youtubeId">
                        <a :href="'https://www.youtube.com/watch?v=' + youtubeId" target="_blank"
                           class="mt-3 flex items-center justify-center gap-2 w-full py-2 bg-red-50 hover:bg-red-100 text-red-600 rounded-lg text-sm font-semibold transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                            Ouvrir sur YouTube
                        </a>
                    </template>
                </div>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="px-8 py-3 bg-yellow-400 hover:bg-yellow-500 text-white rounded-xl font-bold transition-colors flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                {{ $video ? 'Mettre à jour' : 'Ajouter la vidéo' }}
            </button>
            <a href="{{ route('admin.videos') }}" class="px-8 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl font-medium transition-colors">Annuler</a>
        </div>
    </form>
</div>

<script>
function youtubeForm() {
    return {
        urlInput: '{{ old('youtube_id', $video?->youtube_id ?? '') }}',
        youtubeId: '{{ old('youtube_id', $video?->youtube_id ?? '') }}',
        extractId() {
            const val = this.urlInput.trim();
            if (!val) { this.youtubeId = ''; return; }
            // Match full URLs
            const patterns = [
                /(?:youtube\.com\/watch\?.*v=)([a-zA-Z0-9_-]{11})/,
                /(?:youtu\.be\/)([a-zA-Z0-9_-]{11})/,
                /(?:youtube\.com\/embed\/)([a-zA-Z0-9_-]{11})/,
                /(?:youtube\.com\/shorts\/)([a-zA-Z0-9_-]{11})/,
            ];
            for (const pattern of patterns) {
                const match = val.match(pattern);
                if (match) { this.youtubeId = match[1]; return; }
            }
            // Assume it's already an ID if 11 chars alphanumeric
            if (/^[a-zA-Z0-9_-]{11}$/.test(val)) {
                this.youtubeId = val;
            } else {
                this.youtubeId = val; // keep as-is for manual entry
            }
        }
    }
}
</script>
@endsection
