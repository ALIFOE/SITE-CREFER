@extends('layouts.app')
@section('title', 'Blog CREFER - Formations, Carrière et Énergies Renouvelables')

@section('content')
{{-- Hero --}}
<section class="bg-gradient-to-r from-blue-700 to-blue-500 text-white py-20">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4" style="font-family:'Montserrat',sans-serif;">Blog de Formation Professionnelle</h1>
        <p class="text-xl text-blue-100 max-w-2xl mx-auto">Guides, conseils et tendances du secteur électrique et énergies renouvelables</p>
    </div>
</section>

{{-- Filtres Alpine --}}
<section class="section-spacing bg-gradient-to-b from-blue-50 to-white"
    x-data="{
        search: '',
        cat: '',
        articles: [
            { id: 'article-1', title: 'Comment devenir électricien professionnel : Guide complet 2025', desc: 'Guide complet pour devenir électricien au Togo. Découvrez les étapes, formations requises, salaires et débouchés professionnels.', cat: 'Carrière', author: 'Équipe CREFER', date: '13 décembre 2025', readTime: 12, image: 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=600&h=400&fit=crop' },
            { id: 'article-2', title: 'Formation Solaire Modulaire : Maîtrisez les Énergies Renouvelables', desc: 'Explorez la formation solaire modulaire flexible. Apprenez à votre rythme et obtenez une certification en énergies renouvelables.', cat: 'Énergie Solaire', author: 'Équipe CREFER', date: '14 décembre 2025', readTime: 10, image: 'https://images.unsplash.com/photo-1509391366360-2e959099692d?w=600&h=400&fit=crop' },
            { id: 'article-3', title: 'CAP vs BT Électrotechnique : Comparaison Complète 2025', desc: 'Comparaison détaillée entre le CAP et le BT électrotechnique. Salaires, contenus, débouchés et comment choisir.', cat: 'Formation', author: 'Équipe CREFER', date: '15 décembre 2025', readTime: 9, image: 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=600&h=400&fit=crop' },
            { id: 'article-4', title: 'Les 7 Métiers de l\'Électricité les Plus Demandés en Afrique', desc: 'Découvrez les 7 métiers électriques les plus demandés en Afrique avec salaires, débouchés et tendances 2025.', cat: 'Carrière', author: 'Équipe CREFER', date: '16 décembre 2025', readTime: 8, image: 'https://images.unsplash.com/photo-1621905167918-48416bd8575a?w=600&h=400&fit=crop' },
            { id: 'article-5', title: 'Guide Complet : Installation Panneaux Solaires Résidentiel', desc: 'Guide étape-par-étape pour installer des panneaux solaires. Processus, coûts, ROI et devenir installateur certifié.', cat: 'Guide Pratique', author: 'Expert Solaire CREFER', date: '17 décembre 2025', readTime: 10, image: 'https://images.unsplash.com/photo-1556694712202-b53c5008b6a7?w=600&h=400&fit=crop' },
            { id: 'article-6', title: 'Comment Financer Votre Formation Électricité à CREFER : 5 Options', desc: '5 options pour financer votre formation CAP ou BT. Bourses, prêts, paiement progressif et plus.', cat: 'Formation', author: 'Service Admission CREFER', date: '18 décembre 2025', readTime: 6, image: 'https://images.unsplash.com/photo-1554224311-beee415c15c9?w=600&h=400&fit=crop' },
            { id: 'article-7', title: 'Énergies Renouvelables en Afrique : Tendances et Carrières 2025-2030', desc: 'Analyse du marché des énergies renouvelables en Afrique. Opportunités carrière, tendances et impact social.', cat: 'Énergie Solaire', author: 'Consultant Énergies CREFER', date: '19 décembre 2025', readTime: 12, image: 'https://images.unsplash.com/photo-1497440717519-b2e0ffb4e1fc?w=600&h=400&fit=crop' }
        ],
        get filtered() {
            return this.articles.filter(a =>
                (!this.search || a.title.toLowerCase().includes(this.search.toLowerCase()) || a.desc.toLowerCase().includes(this.search.toLowerCase())) &&
                (!this.cat || a.cat === this.cat)
            )
        }
    }">

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Recherche & Filtre --}}
        <div class="flex flex-col md:flex-row gap-4 mb-12">
            <input type="text" x-model="search" placeholder="Rechercher un article..."
                   class="flex-1 px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-400 outline-none" />
            <select x-model="cat" class="px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-400 outline-none bg-white">
                <option value="">Toutes les catégories</option>
                <option value="Formation">Formation</option>
                <option value="Carrière">Carrière</option>
                <option value="Énergie Solaire">Énergie Solaire</option>
                <option value="Guide Pratique">Guide Pratique</option>
            </select>
        </div>

        {{-- Grille articles --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8" x-show="filtered.length > 0">
            <template x-for="a in filtered" :key="a.id">
                <article class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all overflow-hidden group">
                    <div class="relative h-48 overflow-hidden bg-gray-200">
                        <img :src="a.image" :alt="a.title" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy" />
                        <span class="absolute top-4 right-4 px-3 py-1 bg-blue-600 text-white text-xs rounded-full font-semibold" x-text="a.cat"></span>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-xs text-gray-400 mb-3">
                            <span x-text="a.date"></span>
                            <span>•</span>
                            <span x-text="a.readTime + ' min'"></span>
                        </div>
                        <h2 class="text-lg font-bold text-gray-800 mb-2 group-hover:text-blue-600 transition-colors line-clamp-2" x-text="a.title"></h2>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3" x-text="a.desc"></p>
                        <div class="flex items-center gap-2 text-xs text-gray-500 mb-4">
                            <div class="w-6 h-6 bg-blue-600 text-white rounded-full flex items-center justify-center text-xs font-bold" x-text="a.author[0]"></div>
                            <span x-text="a.author"></span>
                        </div>
                        <a :href="'/blog/' + a.id" class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-700 text-sm transition-colors">
                            Lire l'article
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </article>
            </template>
        </div>

        {{-- Aucun résultat --}}
        <div x-show="filtered.length === 0" class="text-center py-16" style="display:none;">
            <p class="text-xl text-gray-500 mb-4">Aucun article ne correspond à votre recherche.</p>
            <button @click="search=''; cat=''" class="px-6 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors">Réinitialiser</button>
        </div>
    </div>
</section>

{{-- Newsletter --}}
<section class="bg-gradient-to-r from-blue-700 to-blue-500 text-white py-16">
    <div class="max-w-2xl mx-auto px-4 text-center" x-data="{ email: '', sent: false }">
        <h3 class="text-2xl font-bold mb-2">Restez Informé</h3>
        <p class="text-blue-100 mb-6">Recevez nos nouveaux articles, guides et offres directement dans votre email</p>
        <div x-show="!sent" class="flex flex-col sm:flex-row gap-3">
            <input x-model="email" type="email" placeholder="Votre email" required
                   class="flex-1 px-4 py-3 rounded-xl text-gray-800 outline-none focus:ring-2 focus:ring-yellow-400" />
            <button @click="sent = true" class="px-8 py-3 bg-white text-blue-600 rounded-xl font-bold hover:bg-gray-100 transition-colors">S'abonner</button>
        </div>
        <p x-show="sent" class="text-lg font-semibold" style="display:none;">Merci ! Vérifiez votre email. ✓</p>
    </div>
</section>
@endsection
