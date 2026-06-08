@extends('layouts.app')
@section('title', $article['title'] . ' - Blog CREFER')

@section('content')
{{-- Hero --}}
<section class="bg-gradient-to-r from-blue-700 to-blue-500 text-white py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="inline-block mb-4 px-4 py-2 bg-white/20 rounded-full text-sm font-semibold">{{ $article['category'] }}</div>
        <h1 class="text-3xl md:text-5xl font-bold mb-6" style="font-family:'Montserrat',sans-serif;">{{ $article['title'] }}</h1>
        <div class="flex flex-wrap gap-4 text-sm text-blue-100">
            <span>{{ $article['author'] }}</span>
            <span>•</span>
            <span>{{ $article['date'] }}</span>
            <span>•</span>
            <span>{{ $article['readTime'] }} min de lecture</span>
        </div>
    </div>
</section>

<article class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    {{-- Image principale --}}
    <img src="{{ $article['image'] }}" alt="{{ $article['title'] }}"
         class="w-full h-80 md:h-96 object-cover rounded-2xl mb-12 shadow-xl" loading="lazy" />

    {{-- Introduction --}}
    <div class="text-xl text-gray-600 italic font-semibold mb-10 p-6 bg-blue-50 rounded-xl border-l-4 border-blue-500 leading-relaxed">
        {{ $article['introduction'] }}
    </div>

    {{-- Contenu --}}
    <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
        {!! $article['content'] !!}
    </div>

    {{-- À retenir --}}
    @if(!empty($article['keyPoints']))
    <div class="mt-16 p-8 bg-gradient-to-r from-yellow-50 to-orange-50 rounded-2xl border border-yellow-200">
        <h3 class="text-2xl font-bold text-gray-800 mb-6">À Retenir</h3>
        <ul class="space-y-3">
            @foreach($article['keyPoints'] as $point)
            <li class="flex items-start gap-3">
                <svg class="w-6 h-6 text-yellow-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span class="text-gray-700">{{ $point }}</span>
            </li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- CTA --}}
    <div class="mt-16 text-center p-12 bg-gradient-to-r from-blue-700 to-blue-500 text-white rounded-2xl">
        <h3 class="text-2xl font-bold mb-4">Prêt à commencer votre formation ?</h3>
        <p class="text-blue-100 mb-6 max-w-xl mx-auto">Rejoignez des centaines d'étudiants qui ont transformé leur carrière grâce à CREFER.</p>
        <a href="{{ route('admissions') }}" class="inline-block px-10 py-4 bg-white text-blue-600 rounded-full font-bold hover:shadow-xl transition-all">
            Postuler Maintenant
        </a>
    </div>

    {{-- Articles connexes --}}
    @if(!empty($article['relatedArticles']))
    <div class="mt-16">
        <h3 class="text-3xl font-bold text-gray-800 mb-8">Articles Connexes</h3>
        <div class="grid md:grid-cols-2 gap-8">
            @foreach($article['relatedArticles'] as $related)
            <div class="bg-white p-6 rounded-2xl shadow-md hover:shadow-xl transition-all">
                <h4 class="text-lg font-bold text-gray-800 mb-2">{{ $related['title'] }}</h4>
                <p class="text-gray-600 text-sm mb-4">{{ $related['description'] }}</p>
                <a href="{{ url('/blog/' . $related['id']) }}" class="text-blue-600 font-semibold hover:text-blue-700 text-sm">
                    Lire l'article →
                </a>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    {{-- Partage --}}
    <div class="border-t border-gray-200 pt-8 mt-12">
        <p class="text-gray-700 font-semibold mb-4">Partager cet article :</p>
        <div class="flex gap-3 flex-wrap">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" rel="noopener"
               class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition text-sm">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                Facebook
            </a>
            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" target="_blank" rel="noopener"
               class="inline-flex items-center gap-2 px-4 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800 transition text-sm">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.475-2.236-1.986-2.236-1.081 0-1.722.722-2.004 1.418-.103.249-.129.597-.129.946v5.441h-3.554s.047-8.833 0-9.749h3.554v1.381c.43-.664 1.199-1.608 2.918-1.608 2.135 0 3.735 1.39 3.735 4.375v5.601zM5.337 5.433c-1.144 0-1.915-.759-1.915-1.71 0-.956.768-1.71 1.958-1.71 1.188 0 1.915.757 1.932 1.71 0 .951-.744 1.71-1.975 1.71zm1.582 14.019H3.656V9.703h3.263v9.749zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.225 0z"/></svg>
                LinkedIn
            </a>
        </div>
    </div>

    <div class="mt-8">
        <a href="{{ url('/blog') }}" class="inline-flex items-center gap-2 text-gray-500 hover:text-gray-700 font-medium transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
            Retour au blog
        </a>
    </div>
</article>
@endsection
