<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Request $request)
{
    $filter = $request->query('filter', 'all');

    if (Auth::check()) {
        $query = Auth::user()->tasks();

        if ($filter == 'complete') {
            $query->where('is_complete', true);
        } elseif ($filter == 'incomplete') {
            $query->where('is_complete', false);
        }

        $tasks = $query->get();
    } else {
        return redirect()->route('register');
    }

    return view('tasks.index', compact('tasks', 'filter'));
}

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
            'start_time' => 'nullable|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i|after_or_equal:start_time',
        ]);

        $task = new Task([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'is_complete' => false,
        ]);

        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Tâche créée avec succès.');
    }

    public function update(Request $request, Task $task)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
            'start_time' => 'nullable|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i|after_or_equal:start_time',
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tâche mise à jour avec succès.');
    }

    public function edit(Task $task)
    {
        if (!Auth::check() || $task->user_id !== Auth::id()) {
            return redirect()->route('login');
        }

        return view('tasks.edit', compact('task'));
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Tâche supprimée avec succès.');
    }

    public function complete(Task $task)
    {
        $task->is_complete = true;
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Tâche complétée avec succès.');
    }

    public function completed()
    {
        $tasks = Auth::user()->tasks()->where('is_complete', true)->get();
        return view('tasks.completed', compact('tasks'));
    }

    public function calendar()
    {
        $tasks = Auth::user()->tasks()->where('is_complete', false)->get(['id', 'title', 'due_date']);
    
        // Assurez-vous que 'due_date' est au format 'Y-m-d H:i:s'
        $tasks->transform(function ($task) {
            $task->start = $task->due_date->format('Y-m-d H:i:s');
            $task->end = $task->due_date->format('Y-m-d H:i:s');
            return $task;
        });
    
        return view('calendar', compact('tasks'));
    }

    public function resume(Task $task)
    {
        if (Auth::check() && $task->user_id === Auth::id()) {
            $task->is_complete = false;
            $task->save();
        }
    
        return redirect()->route('tasks.index')->with('success', 'Tâche reprise avec succès.');
    }
}