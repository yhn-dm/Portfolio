<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier des Tâches</title>
    @vite('resources/css/app.css')
    @vite('resources/css/custom.css') <!-- Inclure le fichier CSS personnalisé -->
    <link rel="stylesheet" href="https://uicdn.toast.com/tui-calendar/latest/tui-calendar.css">
</head>

<body class="bg-gray-100">
    @include('components.navbar')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Calendrier des Tâches</h1>
        <div class="flex justify-between items-center mb-4">
            <div class="flex space-x-2">
                <button id="prev-btn" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition duration-300">Précédent</button>
                <button id="next-btn" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition duration-300">Suivant</button>
            </div>
            <div class="text-2xl font-bold text-gray-800" id="current-month-year"></div>
            <div class="flex space-x-2">
                <button id="day-btn" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition duration-300">Jour</button>
                <button id="week-btn" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition duration-300">Semaine</button>
                <button id="month-btn" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition duration-300">Mois</button>
            </div>
        </div>
        <div id="calendar" class="bg-white shadow-md rounded p-4" style="height: 800px;" data-tasks='@json($tasks)'></div>
    </div>
    @vite('resources/js/app.js')
    @vite('resources/js/calendar.js')
</body>

</html>