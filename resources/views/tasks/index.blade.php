<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Tâches</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    @include('components.navbar')
    <div class="container mx-auto mt-6 p-4">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Liste des Tâches</h1>
        <div class="flex justify-between items-center mb-4">
            <div class="flex items-center">
                <form method="GET" action="{{ route('tasks.index') }}" class="flex items-center">
                    <label for="filter" class="mr-2">Filtrer :</label>
                    <select name="filter" id="filter" onchange="this.form.submit()" class="bg-gray-200 text-black px-4 py-2 rounded mr-4">
                        <option value="all" {{ request('filter') == 'all' ? 'selected' : '' }}>Toutes</option>
                        <option value="incomplete" {{ request('filter') == 'incomplete' ? 'selected' : '' }}>En cours</option>
                        <option value="complete" {{ request('filter') == 'complete' ? 'selected' : '' }}>Complètes</option>
                    </select>
                </form>
                <a href="{{ route('tasks.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition duration-300">Nouvelle Tâche</a>
            </div>
        </div>
        <div class="bg-white shadow-md rounded overflow-hidden">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-3 px-4 text-left font-medium text-gray-700">État</th>
                        <th class="py-3 px-4 text-left font-medium text-gray-700">Titre</th>
                        <th class="py-3 px-4 text-left font-medium text-gray-700">Description</th>
                        <th class="py-3 px-4 text-left font-medium text-gray-700">Date limite</th>
                        <th class="py-3 px-4 text-left font-medium text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if($tasks && $tasks->count() > 0)
                        @foreach ($tasks as $task)
                            <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-300">
                                <td class="py-3 px-4">{{ $task->is_complete ? 'Terminé' : 'En cours' }}</td>
                                <td class="py-3 px-4">{{ $task->title }}</td>
                                <td class="py-3 px-4">
                                    <button type="button" onclick="toggleDescription({{ $task->id }})" class="text-gray-500 hover:text-gray-700 transition duration-300">
                                        &#8226;&#8226;&#8226;
                                    </button>
                                    <div id="description-{{ $task->id }}" class="hidden mt-2 text-gray-700">
                                        {{ $task->description }}
                                    </div>
                                </td>
                                <td class="py-3 px-4">{{ $task->due_date->format('d/m/Y') }}</td>
                                <td class="py-3 px-4 flex space-x-2">
                                    @if ($task->is_complete)
                                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded transition duration-300">Supprimer</button>
                                        </form>
                                        <form action="{{ route('tasks.resume', $task) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded transition duration-300">Reprendre</button>
                                        </form>
                                    @else
                                        <a href="{{ route('tasks.edit', $task) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded transition duration-300">Modifier</a>
                                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded transition duration-300">Supprimer</button>
                                        </form>
                                        <form action="{{ route('tasks.complete', $task) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded transition duration-300">Compléter</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="py-3 px-4 text-center text-gray-500">Aucune tâche trouvée.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    @vite('resources/js/app.js')
    <script>
        function toggleDescription(id) {
            const descriptionDiv = document.getElementById(`description-${id}`);
            descriptionDiv.classList.toggle('hidden');
        }
    </script>
</body>

</html>
