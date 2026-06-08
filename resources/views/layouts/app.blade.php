<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'CREFER') - Centre de Formation en Énergies Renouvelables</title>
    <meta name="description" content="@yield('description', 'CREFER - Centre Regional d\'Étude et de Formation en Énergies Renouvelables. Formations CAP, BT Électrotechnique et modules flexibles.')">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon.png">
    <link rel="apple-touch-icon" href="/favicon.png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col bg-white">

    @include('components.infos-bar')
    @include('components.navigation')

    <main class="flex-1 pt-32">
        @yield('content')
    </main>

    @include('components.footer')

</body>
</html>
