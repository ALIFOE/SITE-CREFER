@php
    $cms  = app(\App\Services\ContentService::class);
    $bar  = $cms->get('global', 'infobar');
@endphp
<div class="bg-white border-b border-gray-200 fixed top-0 left-0 right-0 z-40 shadow-sm">
    <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8 py-2 sm:py-3">
        {{-- Desktop --}}
        <div class="hidden sm:grid grid-cols-3 gap-4 md:gap-8 text-[12px] sm:text-sm leading-snug text-gray-700 items-center justify-center">
            <div class="py-2 text-center">
                <span class="font-bold text-gray-900">{{ $bar['item1Label'] ?? 'ANNÉE' }}</span>
                <span class="text-yellow-500 font-bold ml-1">{{ $bar['item1Value'] ?? '2025-2026' }}</span>
            </div>
            <div class="py-2 text-center">
                <span class="font-bold text-gray-900">{{ $bar['item2Label'] ?? 'CAP & BT' }}</span>
                <span class="text-yellow-500 font-bold ml-1">{{ $bar['item2Value'] ?? '15 SEPTEMBRE 2025' }}</span>
            </div>
            <div class="py-2 text-center">
                <span class="font-bold text-gray-900">{{ $bar['item3Label'] ?? 'MODULAIRE' }}</span>
                <span class="text-yellow-500 font-bold ml-1">{{ $bar['item3Value'] ?? '13 AVRIL 2026' }}</span>
            </div>
        </div>
        {{-- Mobile marquee --}}
        <div class="sm:hidden">
            <div class="marquee-wrapper">
                <div class="marquee-track text-gray-700">
                    <span class="marquee-item">{{ $bar['item1Label'] ?? 'ANNÉE' }} <span class="text-yellow-500">{{ $bar['item1Value'] ?? '2025-2026' }}</span> &nbsp;•&nbsp; </span>
                    <span class="marquee-item">{{ $bar['item2Label'] ?? 'CAP & BT' }} <span class="text-yellow-500">{{ $bar['item2Value'] ?? '15 SEPT 2025' }}</span> &nbsp;•&nbsp; </span>
                    <span class="marquee-item">{{ $bar['item3Label'] ?? 'MODULAIRE' }} <span class="text-yellow-500">{{ $bar['item3Value'] ?? '13 AVRIL 2026' }}</span></span>
                    <span class="marquee-item">&nbsp;&nbsp;{{ $bar['item1Label'] ?? 'ANNÉE' }} <span class="text-yellow-500">{{ $bar['item1Value'] ?? '2025-2026' }}</span> &nbsp;•&nbsp; </span>
                    <span class="marquee-item">{{ $bar['item2Label'] ?? 'CAP & BT' }} <span class="text-yellow-500">{{ $bar['item2Value'] ?? '15 SEPT 2025' }}</span> &nbsp;•&nbsp; </span>
                    <span class="marquee-item">{{ $bar['item3Label'] ?? 'MODULAIRE' }} <span class="text-yellow-500">{{ $bar['item3Value'] ?? '13 AVRIL 2026' }}</span></span>
                </div>
            </div>
        </div>
    </div>
</div>
