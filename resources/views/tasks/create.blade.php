<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une tâche</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    @include('components.navbar')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Créer une tâche</h1>
        <form action="{{ route('tasks.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
                <input type="text" name="title" id="title" class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('title')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                @error('description')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="due_date" class="block text-sm font-medium text-gray-700">Date limite</label>
                <input type="date" name="due_date" id="due_date" class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('due_date')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4 flex items-center">
                <input type="checkbox" name="all_day" id="all_day" class="mr-2 h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                <label for="all_day" class="text-sm font-medium text-gray-700">Toute la journée</label>
            </div>
            <div class="mb-4" id="time_fields">
                <label for="start_time" class="block text-sm font-medium text-gray-700">Heure de début</label>
                <input type="time" name="start_time" id="start_time" class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('start_time')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4" id="end_time_field">
                <label for="end_time" class="block text-sm font-medium text-gray-700">Heure de fin</label>
                <input type="time" name="end_time" id="end_time" class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @error('end_time')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded shadow">Créer</button>
            </div>
        </form>
    </div>
    @vite('resources/js/app.js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const allDayCheckbox = document.getElementById('all_day');
            const timeFields = document.getElementById('time_fields');
            const endTimeField = document.getElementById('end_time_field');

            allDayCheckbox.addEventListener('change', function() {
                if (allDayCheckbox.checked) {
                    timeFields.style.display = 'none';
                    endTimeField.style.display = 'none';
                } else {
                    timeFields.style.display = 'block';
                    endTimeField.style.display = 'block';
                }
            });
        });
    </script>
</body>

</html>