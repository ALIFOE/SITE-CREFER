@extends('layouts.admin')
@section('title', 'Admissions')
@section('page-title', 'Admissions')

@section('content')
<div class="grid lg:grid-cols-2 gap-8">

    {{-- ===== IMAGES ===== --}}
    <div>
        <div class="flex justify-between items-center mb-4">
            <h2 class="font-bold text-gray-900 text-lg">Images ({{ $images->count() }})</h2>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 mb-4"
             x-data="{
                dragging: false,
                fileName: '',
                preview: '',
                handleDrop(e) {
                    this.dragging = false;
                    const file = e.dataTransfer.files[0];
                    if (file) { this.setFile(file); this.$refs.imgInput.files = e.dataTransfer.files; }
                },
                handleChange(e) {
                    const file = e.target.files[0];
                    if (file) this.setFile(file);
                },
                setFile(file) {
                    this.fileName = file.name;
                    const reader = new FileReader();
                    reader.onload = e => this.preview = e.target.result;
                    reader.readAsDataURL(file);
                },
                clear() { this.fileName = ''; this.preview = ''; this.$refs.imgInput.value = ''; }
             }">
            <form method="POST" action="{{ route('admin.admissions.images.store') }}" enctype="multipart/form-data" class="space-y-3">
                @csrf
                <div class="grid grid-cols-2 gap-3">
                    <input type="text" name="title" placeholder="Titre"
                           class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-yellow-400 outline-none" />
                    <input type="text" name="category" placeholder="Catégorie"
                           class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-yellow-400 outline-none" />
                </div>

                {{-- Zone de dépôt image --}}
                <div @dragover.prevent="dragging=true"
                     @dragleave.prevent="dragging=false"
                     @drop.prevent="handleDrop($event)"
                     @click="$refs.imgInput.click()"
                     :class="dragging ? 'border-yellow-400 bg-yellow-50' : 'border-gray-300 hover:border-yellow-400 hover:bg-gray-50'"
                     class="border-2 border-dashed rounded-xl p-5 text-center cursor-pointer transition-all">

                    <input type="file" name="image" accept="image/*"
                           x-ref="imgInput" class="hidden" @change="handleChange($event)" required>

                    <template x-if="!preview">
                        <div class="flex flex-col items-center gap-2 text-gray-400 pointer-events-none">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <p class="text-sm font-medium">Glissez une image ici ou <span class="text-yellow-500">parcourir</span></p>
                            <p class="text-xs">JPG, PNG, WEBP — max 5 Mo</p>
                        </div>
                    </template>

                    <template x-if="preview">
                        <div class="relative pointer-events-none">
                            <img :src="preview" class="h-28 mx-auto object-contain rounded-lg" />
                            <p class="text-xs text-gray-500 mt-2 truncate" x-text="fileName"></p>
                            <button type="button" @click.stop="clear()"
                                    class="pointer-events-auto absolute top-0 right-0 w-6 h-6 bg-red-500 text-white rounded-full text-xs flex items-center justify-center hover:bg-red-600">✕</button>
                        </div>
                    </template>
                </div>

                <button type="submit" class="w-full py-2 bg-yellow-400 hover:bg-yellow-500 text-white rounded-lg text-sm font-semibold transition-colors">
                    Ajouter l'image
                </button>
            </form>
        </div>

        <div class="space-y-3">
            @forelse($images as $img)
            <div class="flex items-center gap-3 bg-white rounded-xl p-3 border border-gray-100 shadow-sm">
                @if($img->image)
                <img src="{{ $img->image }}" alt="" class="w-14 h-10 object-cover rounded-lg flex-shrink-0" />
                @else
                <div class="w-14 h-10 bg-gray-100 rounded-lg flex-shrink-0"></div>
                @endif
                <div class="flex-1 min-w-0">
                    <p class="font-semibold text-sm text-gray-900 truncate">{{ $img->title }}</p>
                    <p class="text-xs text-gray-400">{{ $img->category }}</p>
                </div>
                <form method="POST" action="{{ route('admin.admissions.images.destroy', $img) }}" onsubmit="return confirm('Supprimer cette image ?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="px-3 py-1.5 bg-red-50 hover:bg-red-100 text-red-600 rounded-lg text-xs font-medium transition-colors">Supprimer</button>
                </form>
            </div>
            @empty
            <p class="text-gray-400 text-sm text-center py-4">Aucune image.</p>
            @endforelse
        </div>
    </div>

    {{-- ===== DOCUMENTS ===== --}}
    <div>
        <div class="flex justify-between items-center mb-4">
            <h2 class="font-bold text-gray-900 text-lg">Documents ({{ $documents->count() }})</h2>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 mb-4"
             x-data="{
                dragging: false,
                fileName: '',
                fileSize: '',
                handleDrop(e) {
                    this.dragging = false;
                    const file = e.dataTransfer.files[0];
                    if (file) { this.setFile(file); this.$refs.docInput.files = e.dataTransfer.files; }
                },
                handleChange(e) {
                    const file = e.target.files[0];
                    if (file) this.setFile(file);
                },
                setFile(file) {
                    this.fileName = file.name;
                    this.fileSize = (file.size / 1024 / 1024).toFixed(2) + ' Mo';
                },
                clear() { this.fileName = ''; this.fileSize = ''; this.$refs.docInput.value = ''; }
             }">
            <form method="POST" action="{{ route('admin.admissions.documents.store') }}" enctype="multipart/form-data" class="space-y-3">
                @csrf
                <input type="text" name="title" placeholder="Titre du document *" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-yellow-400 outline-none" />
                <textarea name="description" rows="2" placeholder="Description (optionnel)"
                          class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-yellow-400 outline-none resize-none"></textarea>

                {{-- Zone de dépôt document --}}
                <div @dragover.prevent="dragging=true"
                     @dragleave.prevent="dragging=false"
                     @drop.prevent="handleDrop($event)"
                     @click="$refs.docInput.click()"
                     :class="dragging ? 'border-blue-400 bg-blue-50' : 'border-gray-300 hover:border-blue-400 hover:bg-gray-50'"
                     class="border-2 border-dashed rounded-xl p-5 text-center cursor-pointer transition-all">

                    <input type="file" name="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx"
                           x-ref="docInput" class="hidden" @change="handleChange($event)" required>

                    <template x-if="!fileName">
                        <div class="flex flex-col items-center gap-2 text-gray-400 pointer-events-none">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <p class="text-sm font-medium">Glissez un fichier ici ou <span class="text-blue-500">parcourir</span></p>
                            <p class="text-xs">PDF, Word, Excel, PowerPoint — max 10 Mo</p>
                        </div>
                    </template>

                    <template x-if="fileName">
                        <div class="relative pointer-events-none">
                            <div class="flex flex-col items-center gap-2">
                                <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <p class="text-sm font-semibold text-gray-800 truncate max-w-[200px]" x-text="fileName"></p>
                                <p class="text-xs text-gray-400" x-text="fileSize"></p>
                            </div>
                            <button type="button" @click.stop="clear()"
                                    class="pointer-events-auto absolute top-0 right-0 w-6 h-6 bg-red-500 text-white rounded-full text-xs flex items-center justify-center hover:bg-red-600">✕</button>
                        </div>
                    </template>
                </div>

                <button type="submit" class="w-full py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm font-semibold transition-colors">
                    Ajouter le document
                </button>
            </form>
        </div>

        <div class="space-y-3">
            @forelse($documents as $doc)
            <div class="flex items-center gap-3 bg-white rounded-xl p-3 border border-gray-100 shadow-sm">
                <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                    <span class="text-xs font-bold text-red-600">{{ $doc->type ?: 'DOC' }}</span>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="font-semibold text-sm text-gray-900 truncate">{{ $doc->title }}</p>
                    <p class="text-xs text-gray-400 truncate">{{ $doc->file_name }}</p>
                </div>
                <div class="flex items-center gap-2 flex-shrink-0">
                    @if($doc->document)
                    <a href="{{ $doc->document }}" target="_blank"
                       class="px-3 py-1.5 bg-gray-50 hover:bg-gray-100 text-gray-600 rounded-lg text-xs font-medium transition-colors">
                        Ouvrir
                    </a>
                    @endif
                    <form method="POST" action="{{ route('admin.admissions.documents.destroy', $doc) }}" onsubmit="return confirm('Supprimer ce document ?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="px-3 py-1.5 bg-red-50 hover:bg-red-100 text-red-600 rounded-lg text-xs font-medium transition-colors">Supprimer</button>
                    </form>
                </div>
            </div>
            @empty
            <p class="text-gray-400 text-sm text-center py-4">Aucun document.</p>
            @endforelse
        </div>
    </div>

</div>
@endsection
