@extends('layouts.admin')
@section('title', 'Administrateurs')
@section('page-title', 'Administrateurs')

@section('content')
<div class="grid lg:grid-cols-2 gap-8">

    {{-- Formulaire ajout --}}
    <div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h2 class="font-bold text-gray-900 text-lg mb-5 flex items-center gap-2">
                <span class="w-1 h-5 bg-yellow-400 rounded inline-block"></span>
                Ajouter un administrateur
            </h2>
            <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nom complet</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                           placeholder="Jean Dupont"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-yellow-400 outline-none @error('name') border-red-400 @enderror" />
                    @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Adresse e-mail</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                           placeholder="admin@crefer.tg"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-yellow-400 outline-none @error('email') border-red-400 @enderror" />
                    @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                    <input type="password" name="password" required
                           placeholder="Minimum 8 caractères"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-yellow-400 outline-none @error('password') border-red-400 @enderror" />
                    @error('password')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Confirmer le mot de passe</label>
                    <input type="password" name="password_confirmation" required
                           placeholder="Répéter le mot de passe"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-yellow-400 outline-none" />
                </div>
                <button type="submit"
                        class="w-full py-2.5 bg-yellow-400 hover:bg-yellow-500 text-white rounded-lg text-sm font-semibold transition-colors flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Créer l'administrateur
                </button>
            </form>
        </div>

        <div class="mt-4 p-4 bg-blue-50 border border-blue-100 rounded-xl text-sm text-blue-700 flex gap-3">
            <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <p>Chaque administrateur a accès à l'ensemble du panneau d'administration. Créez uniquement des comptes pour des personnes de confiance.</p>
        </div>
    </div>

    {{-- Liste des admins --}}
    <div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100">
                <h2 class="font-bold text-gray-900 text-lg flex items-center gap-2">
                    <span class="w-1 h-5 bg-blue-400 rounded inline-block"></span>
                    Administrateurs ({{ $admins->count() }})
                </h2>
            </div>
            <div class="divide-y divide-gray-50">
                @foreach($admins as $admin)
                <div class="flex items-center gap-4 px-6 py-4 hover:bg-gray-50 transition-colors">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center text-sm font-bold text-white flex-shrink-0
                        {{ $admin->id === auth()->id() ? 'bg-yellow-500' : 'bg-gray-600' }}">
                        {{ strtoupper(substr($admin->name, 0, 1)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-semibold text-sm text-gray-900 truncate flex items-center gap-2">
                            {{ $admin->name }}
                            @if($admin->id === auth()->id())
                            <span class="text-xs px-2 py-0.5 bg-yellow-100 text-yellow-700 rounded-full font-medium">Vous</span>
                            @endif
                        </p>
                        <p class="text-xs text-gray-400 truncate">{{ $admin->email }}</p>
                        <p class="text-xs text-gray-300 mt-0.5">Créé le {{ $admin->created_at->format('d/m/Y') }}</p>
                    </div>
                    <div class="flex items-center gap-1 flex-shrink-0">
                        <a href="{{ route('admin.users.edit', $admin) }}"
                           class="p-2 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"
                           title="Modifier">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </a>
                        @if($admin->id !== auth()->id())
                        <form method="POST" action="{{ route('admin.users.destroy', $admin) }}"
                              onsubmit="return confirm('Supprimer {{ addslashes($admin->name) }} ?')">
                            @csrf @method('DELETE')
                            <button type="submit"
                                    class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors"
                                    title="Supprimer">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
@endsection
