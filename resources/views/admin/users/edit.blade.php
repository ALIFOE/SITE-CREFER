@extends('layouts.admin')
@section('title', 'Modifier un administrateur')
@section('page-title', 'Modifier un administrateur')

@section('content')
<div class="max-w-xl">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">

        {{-- En-tête --}}
        <div class="flex items-center gap-4 mb-6 pb-5 border-b border-gray-100">
            <div class="w-12 h-12 rounded-full bg-gray-700 flex items-center justify-center text-lg font-bold text-white">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
            <div>
                <p class="font-bold text-gray-900">{{ $user->name }}</p>
                <p class="text-sm text-gray-400">{{ $user->email }}</p>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.users.update', $user) }}" class="space-y-5">
            @csrf @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nom complet</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-yellow-400 outline-none @error('name') border-red-400 @enderror" />
                @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Adresse e-mail</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-yellow-400 outline-none @error('email') border-red-400 @enderror" />
                @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="pt-2 border-t border-gray-100">
                <p class="text-xs text-gray-400 mb-3">Laissez vide pour conserver le mot de passe actuel.</p>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nouveau mot de passe</label>
                        <input type="password" name="password"
                               placeholder="Minimum 8 caractères"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-yellow-400 outline-none @error('password') border-red-400 @enderror" />
                        @error('password')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Confirmer le mot de passe</label>
                        <input type="password" name="password_confirmation"
                               placeholder="Répéter le nouveau mot de passe"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-yellow-400 outline-none" />
                    </div>
                </div>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit"
                        class="flex-1 py-2.5 bg-yellow-400 hover:bg-yellow-500 text-white rounded-lg text-sm font-semibold transition-colors flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Enregistrer
                </button>
                <a href="{{ route('admin.users') }}"
                   class="px-5 py-2.5 border border-gray-300 text-gray-600 hover:bg-gray-50 rounded-lg text-sm font-semibold transition-colors">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
