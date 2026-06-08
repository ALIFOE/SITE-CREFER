@extends('layouts.admin')
@section('title', $article ? 'Modifier l\'article' : 'Nouvel article')
@section('page-title', $article ? 'Modifier l\'article' : 'Nouvel article')

@section('content')
<div class="max-w-4xl">
    <div class="mb-6">
        <a href="{{ route('admin.articles') }}" class="text-sm text-gray-500 hover:text-gray-700 flex items-center gap-1">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
            Retour aux articles
        </a>
    </div>

    <form method="POST" action="{{ $article ? route('admin.articles.update', $article) : route('admin.articles.store') }}"
          class="space-y-6" x-data="articleForm()">
        @csrf
        @if($article) @method('PUT') @endif

        <div class="grid lg:grid-cols-3 gap-6">
            {{-- Colonne principale --}}
            <div class="lg:col-span-2 space-y-5">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 space-y-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Titre *</label>
                        <input type="text" name="title" value="{{ old('title', $article?->title) }}" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-yellow-400 outline-none transition text-base" />
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Description courte</label>
                        <textarea name="description" rows="3"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-yellow-400 outline-none transition resize-none">{{ old('description', $article?->description) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Contenu complet
                            <span class="text-xs font-normal text-gray-400 ml-1">— HTML supporté</span>
                        </label>
                        <div class="border border-gray-300 rounded-xl overflow-hidden focus-within:ring-2 focus-within:ring-yellow-400">
                            {{-- Mini toolbar --}}
                            <div class="flex flex-wrap gap-1 p-2 bg-gray-50 border-b border-gray-200">
                                @foreach([
                                    ['<strong>G</strong>', 'bold', 'Gras'],
                                    ['<em>I</em>', 'italic', 'Italique'],
                                    ['H2', 'h2', 'Titre 2'],
                                    ['H3', 'h3', 'Titre 3'],
                                    ['¶', 'p', 'Paragraphe'],
                                    ['• Liste', 'ul', 'Liste'],
                                    ['🔗', 'link', 'Lien'],
                                ] as [$icon, $cmd, $title])
                                <button type="button" @click="insertTag('{{ $cmd }}')" title="{{ $title }}"
                                        class="px-2.5 py-1 bg-white border border-gray-200 hover:bg-yellow-50 hover:border-yellow-300 rounded text-xs font-medium transition-colors">
                                    {!! $icon !!}
                                </button>
                                @endforeach
                            </div>
                            <textarea id="full_content" name="full_content" rows="14"
                                      class="w-full px-4 py-3 outline-none resize-y font-mono text-sm"
                                      placeholder="Rédigez le contenu de l'article ici...">{{ old('full_content', $article?->full_content) }}</textarea>
                        </div>
                        <p class="text-xs text-gray-400 mt-1">Vous pouvez utiliser du HTML pour formater le contenu.</p>
                    </div>
                </div>
            </div>

            {{-- Colonne latérale --}}
            <div class="space-y-5">
                {{-- Publier --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                    <h3 class="font-bold text-gray-900 text-sm mb-4 flex items-center gap-2">
                        <span class="w-1 h-4 bg-yellow-400 rounded inline-block"></span>Publication
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Catégorie</label>
                            <input type="text" name="category" value="{{ old('category', $article?->category) }}"
                                   placeholder="ex: Formation, Événement..."
                                   class="w-full px-3 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-yellow-400 outline-none transition text-sm" />
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Date de publication</label>
                            <input type="date" name="date"
                                   value="{{ old('date', $article?->date ? \Carbon\Carbon::parse($article->date)->format('Y-m-d') : '') }}"
                                   class="w-full px-3 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-yellow-400 outline-none transition text-sm" />
                        </div>
                    </div>
                    <div class="mt-5 pt-4 border-t border-gray-100 flex gap-3">
                        <button type="submit" class="flex-1 px-4 py-3 bg-yellow-400 hover:bg-yellow-500 text-white rounded-xl font-bold transition-colors text-sm flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            {{ $article ? 'Mettre à jour' : 'Publier' }}
                        </button>
                        <a href="{{ route('admin.articles') }}" class="px-4 py-3 bg-gray-100 hover:bg-gray-200 text-gray-600 rounded-xl font-medium transition-colors text-sm">✕</a>
                    </div>
                </div>

                {{-- Image principale --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                    <h3 class="font-bold text-gray-900 text-sm mb-4 flex items-center gap-2">
                        <span class="w-1 h-4 bg-blue-400 rounded inline-block"></span>Image principale
                    </h3>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">URL de l'image</label>
                        <input type="text" name="main_image" x-model="imageUrl"
                               @input="previewImage()"
                               value="{{ old('main_image', $article?->main_image) }}"
                               placeholder="/images/..."
                               class="w-full px-3 py-2.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-yellow-400 outline-none transition text-sm font-mono" />
                    </div>

                    {{-- Prévisualisation --}}
                    <div class="mt-3">
                        <template x-if="imageUrl">
                            <div class="relative">
                                <img :src="imageUrl" alt="Prévisualisation"
                                     class="w-full h-36 object-cover rounded-lg border border-gray-200"
                                     @error="imageError = true"
                                     x-show="!imageError" />
                                <div x-show="imageError" class="w-full h-36 bg-red-50 rounded-lg border border-red-200 flex items-center justify-center text-red-400 text-xs">
                                    Image introuvable
                                </div>
                            </div>
                        </template>
                        <template x-if="!imageUrl">
                            <div class="w-full h-28 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                        </template>
                    </div>

                    {{-- Images disponibles --}}
                    <details class="mt-3">
                        <summary class="text-xs text-yellow-600 hover:text-yellow-700 cursor-pointer font-semibold">Choisir parmi les images du site</summary>
                        <div class="mt-2 grid grid-cols-3 gap-1 max-h-48 overflow-y-auto">
                            @foreach(array_filter(scandir(public_path('images')), fn($f) => preg_match('/\.(jpg|jpeg|png|webp)$/i', $f)) as $img)
                            <button type="button" @click="imageUrl = '/images/{{ $img }}'; imageError = false"
                                    class="relative rounded overflow-hidden border-2 hover:border-yellow-400 transition-colors"
                                    :class="imageUrl === '/images/{{ $img }}' ? 'border-yellow-400' : 'border-transparent'">
                                <img src="/images/{{ $img }}" alt="{{ $img }}" class="w-full h-14 object-cover" />
                            </button>
                            @endforeach
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
function articleForm() {
    return {
        imageUrl: '{{ old('main_image', $article?->main_image ?? '') }}',
        imageError: false,
        previewImage() {
            this.imageError = false;
        },
        insertTag(cmd) {
            const ta = document.getElementById('full_content');
            const start = ta.selectionStart, end = ta.selectionEnd;
            const sel = ta.value.substring(start, end);
            const tags = {
                'bold':   ['<strong>', '</strong>'],
                'italic': ['<em>', '</em>'],
                'h2':     ['<h2>', '</h2>'],
                'h3':     ['<h3>', '</h3>'],
                'p':      ['<p>', '</p>'],
                'ul':     ['<ul>\n  <li>', '</li>\n</ul>'],
                'link':   ['<a href="">', '</a>'],
            };
            if (!tags[cmd]) return;
            const [open, close] = tags[cmd];
            const replacement = open + (sel || 'texte') + close;
            ta.value = ta.value.substring(0, start) + replacement + ta.value.substring(end);
            ta.focus();
            ta.selectionStart = start + open.length;
            ta.selectionEnd = start + open.length + (sel || 'texte').length;
        }
    }
}
</script>
@endsection
