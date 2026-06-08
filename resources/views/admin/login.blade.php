<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Connexion Admin - CREFER</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-black flex items-center justify-center p-4">
<div class="w-full max-w-md">
    <div class="text-center mb-8">
        <img src="/images/crefer Logo2.png" alt="CREFER" class="h-16 w-auto mx-auto mb-4" />
        <h1 class="text-2xl font-bold text-white" style="font-family:'Montserrat',sans-serif;">Espace Administration</h1>
        <p class="text-gray-400 text-sm mt-2">Connectez-vous pour accéder au tableau de bord</p>
    </div>

    <div class="bg-white rounded-2xl shadow-2xl p-8">
        @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6 text-sm">
            {{ $errors->first() }}
        </div>
        @endif

        <form method="POST" action="{{ route('admin.login.post') }}" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Adresse email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-yellow-400 focus:border-transparent outline-none transition text-sm"
                       placeholder="admin@sitecrefer.com" />
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Mot de passe</label>
                <input type="password" name="password" required
                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-yellow-400 focus:border-transparent outline-none transition text-sm"
                       placeholder="••••••••" />
            </div>
            <div class="flex items-center gap-2">
                <input type="checkbox" name="remember" id="remember" class="rounded border-gray-300 text-yellow-500 focus:ring-yellow-400">
                <label for="remember" class="text-sm text-gray-600">Se souvenir de moi</label>
            </div>
            <button type="submit"
                    class="w-full px-8 py-4 bg-gradient-to-r from-yellow-400 to-yellow-500 text-white rounded-xl font-bold text-base hover:shadow-xl transition-all hover:-translate-y-0.5">
                Se connecter
            </button>
        </form>
    </div>

    <p class="text-center text-gray-500 text-xs mt-6">CREFER © {{ date('Y') }} — Espace réservé aux administrateurs</p>
</div>
</body>
</html>
