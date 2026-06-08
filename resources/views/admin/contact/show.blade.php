@extends('layouts.admin')
@section('title', 'Message de ' . $message->name)
@section('page-title', 'Message de contact')

@section('content')
<div class="max-w-2xl">

    {{-- Retour --}}
    <a href="{{ route('admin.contact') }}" class="inline-flex items-center gap-1 text-sm text-gray-500 hover:text-gray-700 mb-6">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/>
        </svg>
        Retour aux messages
    </a>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">

        {{-- En-tête --}}
        <div class="px-6 py-5 border-b border-gray-100 bg-gray-50">
            <div class="flex items-start justify-between gap-4">
                <div>
                    <h2 class="font-bold text-gray-900 text-lg">{{ $message->name }}</h2>
                    <div class="flex flex-wrap items-center gap-3 mt-1">
                        <a href="mailto:{{ $message->email }}" class="text-sm text-blue-600 hover:text-blue-700 hover:underline">
                            {{ $message->email }}
                        </a>
                        @if($message->phone)
                        <a href="tel:{{ $message->phone }}" class="text-sm text-green-600 hover:text-green-700 hover:underline">
                            {{ $message->phone }}
                        </a>
                        @endif
                    </div>
                </div>
                <div class="text-right flex-shrink-0">
                    @if($message->subject)
                    <span class="inline-block px-3 py-1 text-xs rounded-full font-bold
                        {{ $message->subject === 'admission' ? 'bg-yellow-100 text-yellow-700' :
                           ($message->subject === 'formation' ? 'bg-blue-100 text-blue-700' :
                           ($message->subject === 'partenariat' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600')) }}">
                        {{ $message->subjectLabel() }}
                    </span>
                    @endif
                    <p class="text-xs text-gray-400 mt-1">{{ $message->created_at->format('d/m/Y à H:i') }}</p>
                </div>
            </div>
        </div>

        {{-- Corps du message --}}
        <div class="px-6 py-6">
            <p class="text-sm font-semibold text-gray-500 uppercase tracking-wide mb-3">Message</p>
            <div class="text-gray-800 leading-relaxed whitespace-pre-wrap bg-gray-50 rounded-xl p-4 text-sm border border-gray-100">{{ $message->message }}</div>
        </div>

        {{-- Pied --}}
        <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
            <div class="text-xs text-gray-400">
                @if($message->is_read && $message->read_at)
                Lu le {{ $message->read_at->format('d/m/Y à H:i') }}
                @else
                <span class="text-blue-600 font-medium">Non lu</span>
                @endif
            </div>
            <div class="flex items-center gap-3">
                <a href="mailto:{{ $message->email }}?subject=Re: {{ urlencode($message->subjectLabel()) }}"
                   class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg text-sm font-semibold transition-colors flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/>
                    </svg>
                    Répondre par email
                </a>
                <form method="POST" action="{{ route('admin.contact.destroy', $message) }}"
                      onsubmit="return confirm('Supprimer ce message définitivement ?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-50 hover:bg-red-100 text-red-600 rounded-lg text-sm font-semibold transition-colors">
                        Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
