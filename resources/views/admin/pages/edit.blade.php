@extends('layouts.admin')
@section('title', 'Éditer ' . ($page->title ?? $page->page_key))
@section('page-title', 'Page : ' . ($page->title ?? $page->page_key))

@section('content')
<div class="mb-6">
    <a href="{{ route('admin.pages') }}" class="text-sm text-gray-500 hover:text-gray-700 flex items-center gap-1">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/>
        </svg>
        Retour aux pages
    </a>
</div>

@if($sections->isEmpty())
    <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-6 text-center text-yellow-700">
        <p class="font-semibold mb-1">Aucune section trouvée pour cette page.</p>
        <p class="text-sm">Exécutez le script de seed pour initialiser les sections.</p>
    </div>
@else
<div class="space-y-6" x-data="{ active: '{{ $sections->first()->section_key ?? '' }}' }">

    {{-- Tabs --}}
    <div class="flex flex-wrap gap-2">
        @foreach($sections as $section)
        <button @click="active='{{ $section->section_key }}'"
                :class="active==='{{ $section->section_key }}' ? 'bg-yellow-400 text-white' : 'bg-white text-gray-700 hover:bg-gray-50 border border-gray-200'"
                class="px-4 py-2 rounded-lg text-sm font-medium transition-colors">
            {{ $section->name ?? $section->section_key }}
        </button>
        @endforeach
    </div>

    {{-- Panels --}}
    @foreach($sections as $section)
    <div x-show="active==='{{ $section->section_key }}'" style="display:none;">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="font-bold text-gray-900 mb-6 flex items-center gap-2">
                <span class="w-1 h-5 bg-yellow-400 rounded"></span>
                {{ $section->name ?? $section->section_key }}
            </h3>

            <form method="POST"
                  action="{{ route('admin.pages.section.update', [$page, $section]) }}"
                  enctype="multipart/form-data">
                @csrf @method('PUT')
                <input type="hidden" name="name" value="{{ $section->name }}" />

                @if(is_array($section->content) && count($section->content))
                <div class="grid md:grid-cols-2 gap-6 mb-6">
                    @foreach($section->content as $key => $value)
                    @php
                        $isImage = (bool) preg_match('/image|background|photo|banner|img/i', $key)
                                   || (is_string($value) && preg_match('/\.(jpg|jpeg|png|webp|gif)(\?.*)?$/i', $value))
                                   || (is_string($value) && (
                                          str_starts_with($value, '/images/') ||
                                          str_starts_with($value, '/storage/')
                                      ));
                        $isLong  = !$isImage && (strlen((string)$value) > 80 || str_contains((string)$value, "\n"));
                        $isBool  = is_bool($value);
                        $label   = ucfirst(trim(preg_replace('/([A-Z])/', ' $1', $key)));
                        $fieldId = 'field_' . $section->id . '_' . $key;
                    @endphp

                    <div class="{{ ($isImage || $isLong) ? 'md:col-span-2' : '' }}">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">{{ $label }}</label>

                        @if($isImage)
                        {{-- ===== CHAMP IMAGE ===== --}}
                        <div x-data="{
                                dragging: false,
                                newPreview: '',
                                fileName: '',
                                handleDrop(e) {
                                    this.dragging = false;
                                    const f = e.dataTransfer.files[0];
                                    if (f) { this.setFile(f); this.$refs.fileInput.files = e.dataTransfer.files; }
                                },
                                handleChange(e) {
                                    const f = e.target.files[0];
                                    if (f) this.setFile(f);
                                },
                                setFile(f) {
                                    this.fileName = f.name;
                                    const r = new FileReader();
                                    r.onload = ev => this.newPreview = ev.target.result;
                                    r.readAsDataURL(f);
                                },
                                clear() {
                                    this.newPreview = '';
                                    this.fileName = '';
                                    this.$refs.fileInput.value = '';
                                }
                             }">

                            {{-- Image actuelle (Blade — toujours affiché si valeur présente) --}}
                            @if(!empty($value))
                            <div class="mb-3 flex items-start gap-3">
                                <div>
                                    <p class="text-xs text-gray-400 mb-1">Image actuelle</p>
                                    <img src="{{ $value }}"
                                         alt="{{ $label }}"
                                         class="h-24 max-w-[240px] rounded-lg object-cover border border-gray-200 shadow-sm"
                                         onerror="this.parentElement.innerHTML='<span class=\'text-xs text-red-400\'>Image introuvable : {{ addslashes($value) }}</span>'" />
                                    <p class="text-xs text-gray-300 mt-1 font-mono truncate max-w-[240px]">{{ $value }}</p>
                                </div>
                            </div>
                            @else
                            <p class="text-xs text-gray-400 mb-2 italic">Aucune image définie</p>
                            @endif

                            {{-- Aperçu nouvelle image sélectionnée (Alpine) --}}
                            <div x-show="newPreview" style="display:none;" class="mb-3 flex items-start gap-3">
                                <div class="relative">
                                    <p class="text-xs text-yellow-600 font-medium mb-1">Nouvelle image</p>
                                    <img :src="newPreview" class="h-24 max-w-[240px] rounded-lg object-cover border-2 border-yellow-400 shadow-sm" />
                                    <button type="button" @click="clear()"
                                            class="absolute -top-2 -right-2 w-5 h-5 bg-red-500 text-white rounded-full text-xs flex items-center justify-center hover:bg-red-600 leading-none">✕</button>
                                    <p class="text-xs text-gray-400 mt-1 truncate max-w-[240px]" x-text="fileName"></p>
                                </div>
                            </div>

                            {{-- Zone de dépôt --}}
                            <div @dragover.prevent="dragging=true"
                                 @dragleave.prevent="dragging=false"
                                 @drop.prevent="handleDrop($event)"
                                 @click="$refs.fileInput.click()"
                                 :class="dragging ? 'border-yellow-400 bg-yellow-50' : 'border-gray-300 hover:border-yellow-400 hover:bg-gray-50'"
                                 class="border-2 border-dashed rounded-xl p-4 text-center cursor-pointer transition-all">

                                <input type="file"
                                       name="images[{{ $key }}]"
                                       accept="image/*"
                                       x-ref="fileInput"
                                       class="hidden"
                                       @change="handleChange($event)">

                                <div x-show="!fileName" class="flex flex-col items-center gap-1 text-gray-400 pointer-events-none">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <p class="text-xs font-medium">Glisser une image ou <span class="text-yellow-500">parcourir</span></p>
                                    <p class="text-xs text-gray-300">JPG, PNG, WEBP — max 5 Mo</p>
                                </div>
                                <p x-show="fileName" class="text-xs text-green-600 font-medium pointer-events-none" x-text="'✓ ' + fileName" style="display:none;"></p>
                            </div>

                            {{-- Valeur actuelle conservée si pas de nouveau fichier --}}
                            <input type="hidden" name="content[{{ $key }}]" value="{{ $value }}" />

                            {{-- Ou URL manuelle --}}
                            <details class="mt-2">
                                <summary class="text-xs text-gray-400 cursor-pointer select-none hover:text-gray-600 w-fit">Saisir une URL manuellement</summary>
                                <div class="mt-2">
                                    <input type="text"
                                           id="{{ $fieldId }}"
                                           value="{{ $value }}"
                                           placeholder="/images/mon-image.jpg"
                                           oninput="document.querySelector('[name=\'content[{{ $key }}]\']').value = this.value"
                                           class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-yellow-400 outline-none font-mono" />
                                </div>
                            </details>
                        </div>
                        {{-- ===== FIN CHAMP IMAGE ===== --}}

                        @elseif($isBool)
                            <select name="content[{{ $key }}]"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-yellow-400 outline-none">
                                <option value="1" {{ $value ? 'selected' : '' }}>Oui</option>
                                <option value="0" {{ !$value ? 'selected' : '' }}>Non</option>
                            </select>

                        @elseif($isLong)
                            <textarea name="content[{{ $key }}]" rows="4"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-yellow-400 outline-none resize-y text-sm">{{ $value }}</textarea>

                        @else
                            <input type="text" name="content[{{ $key }}]" value="{{ $value }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-yellow-400 outline-none transition" />
                        @endif
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-gray-400 text-sm mb-6">Section vide — aucun champ à modifier.</p>
                @endif

                <button type="submit"
                        class="px-8 py-3 bg-yellow-400 hover:bg-yellow-500 text-white rounded-xl font-bold transition-colors flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Sauvegarder
                </button>
            </form>
        </div>
    </div>
    @endforeach
</div>
@endif
@endsection
