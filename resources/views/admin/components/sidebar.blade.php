@php
    $current      = request()->path();
    $unreadCount  = \App\Models\ContactMessage::where('is_read', false)->count();
@endphp
<aside class="admin-sidebar w-64 bg-gray-900 text-white flex flex-col fixed inset-y-0 left-0 z-40 transform transition-transform duration-200"
       :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'">

    {{-- Logo --}}
    <div class="px-6 py-5 border-b border-gray-700">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
            <img src="/images/crefer Logo2.png" alt="CREFER" class="h-8 w-auto" />
            <span class="font-bold text-sm text-yellow-400" style="font-family:'Montserrat',sans-serif;">ADMIN</span>
        </a>
    </div>

    {{-- Navigation --}}
    <nav class="flex-1 overflow-y-auto py-4">
        @php
            $links = [
                ['admin/dashboard', 'admin.dashboard', 'Tableau de bord',
                 '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>'],
                ['admin/articles', 'admin.articles', 'Articles',
                 '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>'],
                ['admin/gallery', 'admin.gallery', 'Galerie',
                 '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>'],
                ['admin/videos', 'admin.videos', 'Vidéos',
                 '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.069A1 1 0 0121 8.82v6.36a1 1 0 01-1.447.89L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>'],
                ['admin/pages', 'admin.pages', 'Pages CMS',
                 '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>'],
                ['admin/contact', 'admin.contact', 'Messages',
                 '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>'],
                ['admin/admissions', 'admin.admissions', 'Admissions',
                 '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>'],
                ['admin/users', 'admin.users', 'Administrateurs',
                 '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>'],
            ];
        @endphp

        @foreach($links as [$path, $route, $label, $icon])
        @php $active = str_starts_with($current, $path); @endphp
        <a href="{{ route($route) }}"
           class="flex items-center gap-3 px-6 py-3 text-sm font-medium transition-all duration-200 {{ $active ? 'bg-yellow-500/20 text-yellow-400 border-r-2 border-yellow-400' : 'text-gray-400 hover:text-white hover:bg-white/5' }}">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">{!! $icon !!}</svg>
            <span class="flex-1">{{ $label }}</span>
            @if($route === 'admin.contact' && $unreadCount > 0)
            <span class="ml-auto bg-red-500 text-white text-xs font-bold px-1.5 py-0.5 rounded-full min-w-[18px] text-center">
                {{ $unreadCount > 99 ? '99+' : $unreadCount }}
            </span>
            @endif
        </a>
        @endforeach
    </nav>

    {{-- User info --}}
    <div class="px-6 py-4 border-t border-gray-700">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center text-sm font-bold text-white">
                {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
            </div>
            <div class="overflow-hidden">
                <p class="text-sm font-medium text-white truncate">{{ auth()->user()->name ?? 'Admin' }}</p>
                <p class="text-xs text-gray-400 truncate">{{ auth()->user()->email ?? '' }}</p>
            </div>
        </div>
    </div>
</aside>

{{-- Overlay mobile --}}
<div x-show="sidebarOpen" @click="sidebarOpen=false"
     class="fixed inset-0 bg-black/50 z-30 lg:hidden" style="display:none;"></div>
