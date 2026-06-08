@extends('layouts.admin')
@section('title', $item ? 'Modifier l\'image' : 'Ajouter une image')
@section('page-title', $item ? 'Modifier l\'image' : 'Ajouter une image')

@section('content')
<div class="max-w-3xl" x-data="galleryForm()">
    <div class="mb-6">
        <a href="{{ route('admin.gallery') }}" class="text-sm text-gray-500 hover:text-gray-700 flex items-center gap-1">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
            Retour à la galerie
        </a>
    </div>

    <form method="POST" action="{{ $item ? route('admin.gallery.update', $item) : route('admin.gallery.store') }}" class="space-y-6">
        @csrf
        @if($item) @method('PUT') @endif

        <div class="grid lg:grid-cols-2 gap-6">
            {{-- Formulaire --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 space-y-5">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Titre</label>
                    <input type="text" name="title" value="{{ old('title', $item?->title) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-yellow-400 outline-none transition" />
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Catégorie</label>
                    <input type="text" name="category" value="{{ old('category', $item?->category) }}"
                           placeholder="ex: Stage, Théorie, Sortie, Soutenance..."
                           list="categories"
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-yellow-400 outline-none transition" />
                    <datalist id="categories">
                        <option value="Stage">
                        <option value="Théorie">
                        <option value="Sortie">
                        <option value="Soutenance">
                        <option value="Chantier">
                        <option value="Événement">
                        <option value="Formation">
                    </datalist>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                    <textarea name="description" rows="3"
                              class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-yellow-400 outline-none transition resize-none">{{ old('description', $item?->description) }}</textarea>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">URL de l'image</label>
                    <input type="text" name="image" x-model="imageUrl" @input="imageError = false"
                           value="{{ old('image', $item?->image) }}"
                           placeholder="/images/..."
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-yellow-400 outline-none transition font-mono text-sm" />
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="submit" class="flex-1 px-6 py-3 bg-yellow-400 hover:bg-yellow-500 text-white rounded-xl font-bold transition-colors flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ $item ? 'Mettre à jour' : 'Ajouter' }}
                    </button>
                    <a href="{{ route('admin.gallery') }}" class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl font-medium transition-colors">Annuler</a>
                </div>
            </div>

            {{-- Prévisualisation --}}
            <div class="space-y-4">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                    <p class="text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        Prévisualisation
                    </p>
                    <template x-if="imageUrl && !imageError">
                        <img :src="imageUrl" alt="Prévisualisation" class="w-full h-56 object-cover rounded-lg border border-gray-200"
                             @error="imageError = true" />
                    </template>
                    <template x-if="imageUrl && imageError">
                        <div class="w-full h-56 bg-red-50 rounded-lg border border-red-200 flex items-center justify-center">
                            <div class="text-center text-red-400">
                                <svg class="w-10 h-10 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                                <p class="text-sm font-medium">Image introuvable</p>
                            </div>
                        </div>
                    </template>
                    <template x-if="!imageUrl">
                        <div class="w-full h-56 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400">
                            <div class="text-center">
                                <svg class="w-10 h-10 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <p class="text-sm">Entrez une URL pour voir l'aperçu</p>
                            </div>
                        </div>
                    </template>
                </div>

                {{-- Sélecteur rapide d'images --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
                    <p class="text-sm font-semibold text-gray-700 mb-3">Images disponibles</p>
                    <div class="grid grid-cols-4 gap-1.5 max-h-64 overflow-y-auto">
                        @foreach(array_filter(scandir(public_path('images')), fn($f) => preg_match('/\.(jpg|jpeg|png|webp)$/i', $f)) as $img)
                        <button type="button" @click="imageUrl = '/images/{{ $img }}'; imageError = false"
                                class="relative rounded overflow-hidden border-2 hover:border-yellow-400 transition-all group"
                                :class="imageUrl === '/images/{{ $img }}' ? 'border-yellow-400 ring-2 ring-yellow-200' : 'border-transparent'"
                                title="{{ $img }}">
                            <img src="/images/{{ $img }}" alt="{{ $img }}" class="w-full h-14 object-cover group-hover:opacity-90" />
                        </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
function galleryForm() {
    return {
        imageUrl: '{{ old('image', $item?->image ?? '') }}',
        imageError: false,
    }
}
</script>
@endsection
