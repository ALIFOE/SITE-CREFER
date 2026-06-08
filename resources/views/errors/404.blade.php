<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Page non trouvée (404) - CREFER</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 flex items-center justify-center px-4">
    <div class="max-w-2xl w-full">
        <div class="bg-white rounded-2xl shadow-2xl p-8 sm:p-12 text-center">
            <div class="mb-8">
                <h1 class="text-9xl font-bold mb-4" style="background: linear-gradient(to right, #FCD34D, #F59E0B); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">404</h1>
                <div class="text-6xl mb-6">🔍</div>
            </div>

            <h2 class="text-3xl font-bold text-gray-900 mb-4" style="font-family:'Montserrat',sans-serif;">Page non trouvée</h2>
            <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                Désolé, la page que vous cherchez n'existe pas ou a été déplacée.<br />
                Veuillez vérifier l'adresse URL ou retourner à l'accueil.
            </p>

            <div class="bg-blue-50 rounded-xl p-5 mb-8 text-left text-sm text-gray-600">
                <strong>Code d'erreur :</strong> HTTP 404<br />
                <strong>Date :</strong> {{ now()->locale('fr')->isoFormat('D MMMM YYYY') }}
            </div>

            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
                <a href="{{ route('home') }}"
                   class="px-8 py-3 bg-gradient-to-r from-yellow-400 to-yellow-500 text-white rounded-xl font-bold hover:shadow-lg transition-all">
                    Retour à l'accueil
                </a>
                <a href="{{ route('contact') }}"
                   class="px-8 py-3 border-2 border-yellow-400 text-yellow-600 rounded-xl font-bold hover:bg-yellow-50 transition-colors">
                    Nous contacter
                </a>
            </div>

            <div class="border-t border-gray-200 pt-8">
                <p class="text-sm text-gray-500 mb-4">Ou explorez ces pages :</p>
                <div class="flex flex-wrap justify-center gap-4 text-sm font-semibold">
                    <a href="{{ route('home') }}" class="text-yellow-500 hover:text-yellow-600">Accueil</a>
                    <span class="text-gray-300">•</span>
                    <a href="{{ route('admissions') }}" class="text-yellow-500 hover:text-yellow-600">Admissions</a>
                    <span class="text-gray-300">•</span>
                    <a href="{{ route('about') }}" class="text-yellow-500 hover:text-yellow-600">À propos</a>
                    <span class="text-gray-300">•</span>
                    <a href="{{ route('gallery') }}" class="text-yellow-500 hover:text-yellow-600">Galerie</a>
                    <span class="text-gray-300">•</span>
                    <a href="{{ route('programmes') }}" class="text-yellow-500 hover:text-yellow-600">Programmes</a>
                </div>
            </div>
        </div>

        <p class="text-center mt-8 text-gray-500 text-sm">
            Si le problème persiste, <a href="{{ route('contact') }}" class="text-yellow-500 hover:text-yellow-600 font-semibold">contactez-nous</a>.
        </p>
    </div>
</body>
</html>
