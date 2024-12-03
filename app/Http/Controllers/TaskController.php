<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $categories = Category::all(); 
        return view('task', compact('categories'));
    }

    public function store(Request $request)
    {

        // Validación de los datos de la tarea.
        $request->validate([
            'title' => 'required|string|max:50|unique:tasks',
            'description' => 'required|string|max:100',
            'completed' => 'required|boolean',
            'id_categories' => 'required|exists:categories,id',
        ]);

        // Creación de la tarea con los datos validados.
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->completed,
            'id_categories' => $request->id_categories,
        ]);

        // Redirige a la página de creación de tarea con un mensaje de éxito.
        return redirect()->route('task')->with('success', 'Tarea creada exitosamente');
    }

    public function reminders()
    {
        $categories = Category::with('tasks')->get();

        return view('reminders', compact('categories'));
    }

    public function update(Request $request, Task $task)
    {
        $task->completed = true; 
        $task->save();

        return redirect()->route('reminders')->with('success', 'Task marked as completed');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('reminders')->with('success', 'Task deleted successfully');
    }

    public function edit(Task $task)
    {
        return view('edit', compact('task'));
    }

    public function updateEdit(Request $request, Task $task)
    {
    $request->validate([
        'title' => 'required|string|max:50|unique:tasks,title,' . $task->id,
        'description' => 'required|string|max:100',
        'completed' => 'required|boolean',
    ]);

    $task->update([
        'title' => $request->title,
        'description' => $request->description,
        'completed' => $request->completed,
    ]);

    return redirect()->route('reminders')->with('success', 'Task updated successfully');     
    }
}
