<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    @include('components.navbar')
    <div class="container mx-auto mt-6 p-4">
        <h1 class="text-4xl font-bold text-center text-gray-800">Bienvenue sur votre tableau de bord</h1>
        @if(Auth::check())
            <p class="text-center mt-4 text-gray-700">Vous êtes connecté en tant que <span class="font-semibold">{{ Auth::user()->name }}</span></p>
            <!-- Ajoutez du contenu supplémentaire pour les utilisateurs connectés ici -->
        @else
            <p class="text-center mt-4 text-gray-700">Veuillez <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-700 transition duration-300">vous connecter</a> ou <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-700 transition duration-300">vous inscrire</a> pour accéder à toutes les fonctionnalités.</p>
        @endif
    </div>
    @vite('resources/js/app.js')
</body>

</html>