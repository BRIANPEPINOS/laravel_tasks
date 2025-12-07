<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Mostrar lista de tareas.
     */
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->get();

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Mostrar formulario de creación.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Guardar una nueva tarea.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'     => 'required|min:3',
            'description' => 'nullable',
            'due_date'  => 'nullable|date',
            'is_done'   => 'nullable',
        ]);

        // Checkbox: si viene marcado vale "on", si no viene, es null
        $validated['is_done'] = $request->has('is_done');

        Task::create($validated);

        return redirect()->route('tasks.index')
            ->with('success', 'Tarea creada correctamente.');
    }

    /**
     * Mostrar formulario de edición.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.edit', compact('task'));
    }

    /**
     * Actualizar la tarea.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::findOrFail($id);

        $validated = $request->validate([
            'title'     => 'required|min:3',
            'description' => 'nullable',
            'due_date'  => 'nullable|date',
            'is_done'   => 'nullable',
        ]);

        $validated['is_done'] = $request->has('is_done');

        $task->update($validated);

        return redirect()->route('tasks.index')
            ->with('success', 'Tarea actualizada correctamente.');
    }

    /**
     * Eliminar tarea.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Tarea eliminada correctamente.');
    }
}
