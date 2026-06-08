@extends('layouts.admin')
@section('title', 'Messages Contact')
@section('page-title', 'Messages Contact')

@section('content')

{{-- Barre d'actions --}}
<div class="flex flex-wrap items-center justify-between gap-4 mb-6">
    <div class="flex items-center gap-3">
        <span class="text-sm text-gray-500">{{ $messages->total() }} message(s)</span>
        @if($unread > 0)
        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-red-100 text-red-700">
            {{ $unread }} non lu(s)
        </span>
        @endif
    </div>
    @if($unread > 0)
    <form method="POST" action="{{ route('admin.contact.mark-all-read') }}">
        @csrf
        <button type="submit" class="text-sm px-4 py-2 bg-blue-50 hover:bg-blue-100 text-blue-700 rounded-lg font-medium transition-colors">
            Tout marquer comme lu
        </button>
    </form>
    @endif
</div>

{{-- Liste --}}
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    @forelse($messages as $msg)
    <div class="flex items-start gap-4 px-6 py-4 border-b border-gray-50 last:border-0 hover:bg-gray-50 transition-colors {{ !$msg->is_read ? 'bg-blue-50/40' : '' }}">

        {{-- Indicateur lu/non lu --}}
        <div class="flex-shrink-0 mt-1">
            @if(!$msg->is_read)
            <span class="w-2.5 h-2.5 bg-blue-500 rounded-full block"></span>
            @else
            <span class="w-2.5 h-2.5 bg-gray-200 rounded-full block"></span>
            @endif
        </div>

        {{-- Contenu --}}
        <div class="flex-1 min-w-0">
            <div class="flex flex-wrap items-center gap-2 mb-1">
                <span class="font-semibold text-sm text-gray-900">{{ $msg->name }}</span>
                <span class="text-xs text-gray-400">{{ $msg->email }}</span>
                @if($msg->subject)
                <span class="px-2 py-0.5 text-xs rounded-full font-medium
                    {{ $msg->subject === 'admission' ? 'bg-yellow-100 text-yellow-700' :
                       ($msg->subject === 'formation' ? 'bg-blue-100 text-blue-700' :
                       ($msg->subject === 'partenariat' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-600')) }}">
                    {{ $msg->subjectLabel() }}
                </span>
                @endif
                @if(!$msg->is_read)
                <span class="px-2 py-0.5 text-xs rounded-full font-bold bg-blue-100 text-blue-700">Nouveau</span>
                @endif
            </div>
            <p class="text-sm text-gray-600 line-clamp-1">{{ $msg->message }}</p>
            <p class="text-xs text-gray-400 mt-1">{{ $msg->created_at->diffForHumans() }} · {{ $msg->created_at->format('d/m/Y H:i') }}</p>
        </div>

        {{-- Actions --}}
        <div class="flex items-center gap-2 flex-shrink-0">
            <a href="{{ route('admin.contact.show', $msg) }}"
               class="px-3 py-1.5 bg-yellow-50 hover:bg-yellow-100 text-yellow-700 rounded-lg text-xs font-medium transition-colors">
                Lire
            </a>
            <form method="POST" action="{{ route('admin.contact.destroy', $msg) }}"
                  onsubmit="return confirm('Supprimer ce message ?')">
                @csrf @method('DELETE')
                <button type="submit" class="px-3 py-1.5 bg-red-50 hover:bg-red-100 text-red-600 rounded-lg text-xs font-medium transition-colors">
                    Supprimer
                </button>
            </form>
        </div>
    </div>
    @empty
    <div class="text-center py-16">
        <svg class="w-12 h-12 text-gray-200 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
        </svg>
        <p class="text-gray-400 font-medium">Aucun message reçu pour l'instant.</p>
    </div>
    @endforelse
</div>

{{-- Pagination --}}
@if($messages->hasPages())
<div class="mt-6">
    {{ $messages->links() }}
</div>
@endif

@endsection
