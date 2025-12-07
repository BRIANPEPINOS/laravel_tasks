@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="mb-0">Tareas registradas</h2>
                <a href="{{ route('tasks.create') }}" class="btn btn-task-main">
                    + Nueva tarea
                </a>
            </div>

            <div class="card card-tasks">
                <div class="card-body">
                    @if ($tasks->isEmpty())
                        <p class="text-muted mb-0">Todavía no hay tareas. Crea la primera usando el botón “Nueva tarea”.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Estado</th>
                                    <th>Fecha límite</th>
                                    <th>Creada</th>
                                    <th class="text-end">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td>
                                            <strong>{{ $task->title }}</strong>
                                            @if ($task->description)
                                                <div class="text-muted small">
                                                    {{ Str::limit($task->description, 80) }}
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($task->is_done)
                                                <span class="badge rounded-pill badge-done">
                                                    Completada
                                                </span>
                                            @else
                                                <span class="badge rounded-pill badge-pending">
                                                    Pendiente
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($task->due_date)
                                                <span class="text-nowrap">
                                                    {{ $task->due_date->format('Y-m-d') }}
                                                </span>
                                            @else
                                                <span class="text-muted">Sin fecha</span>
                                            @endif
                                        </td>
                                        <td class="text-nowrap">
                                            {{ $task->created_at->format('Y-m-d H:i') }}
                                        </td>
                                        <td class="text-end">
                                            <a
                                                href="{{ route('tasks.edit', $task->id) }}"
                                                class="btn btn-sm btn-task-muted me-1"
                                            >
                                                Editar
                                            </a>

                                            <form
                                                action="{{ route('tasks.destroy', $task->id) }}"
                                                method="POST"
                                                class="d-inline"
                                            >
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    type="submit"
                                                    class="btn btn-sm btn-task-danger"
                                                    onclick="return confirm('¿Seguro que deseas eliminar esta tarea?')"
                                                >
                                                    Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
