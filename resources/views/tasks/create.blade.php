@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="mb-0">Nueva tarea</h2>
                <a href="{{ route('tasks.index') }}" class="btn btn-task-muted">
                    Volver a la lista
                </a>
            </div>

            <div class="card card-tasks">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Ups…</strong> hay errores en el formulario:
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('tasks.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Título *</label>
                            <input
                                type="text"
                                name="title"
                                id="title"
                                class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title') }}"
                                required
                            >
                            @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @else
                            <div class="form-text">Mínimo 3 caracteres.</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción</label>
                            <textarea
                                name="description"
                                id="description"
                                rows="3"
                                class="form-control"
                            >{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="due_date" class="form-label">Fecha límite</label>
                            <input
                                type="date"
                                name="due_date"
                                id="due_date"
                                class="form-control @error('due_date') is-invalid @enderror"
                                value="{{ old('due_date') }}"
                            >
                            @error('due_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-check mb-4">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="is_done"
                                id="is_done"
                                {{ old('is_done') ? 'checked' : '' }}
                            >
                            <label class="form-check-label" for="is_done">
                                Marcar como completada
                            </label>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('tasks.index') }}" class="btn btn-task-muted">
                                Cancelar
                            </a>
                            <button type="submit" class="btn btn-task-main">
                                Guardar tarea
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
