<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mini Task Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap 5 CSS --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>
        body {
            background-color: #f3f4f6; /* gris muy suave */
        }

        .navbar-tasks {
            background: linear-gradient(90deg, #1e293b, #0f172a); /* azul grisáceo oscuro */
        }

        .navbar-tasks .navbar-brand,
        .navbar-tasks .nav-link,
        .navbar-tasks .navbar-text {
            color: #e5e7eb !important; /* gris claro */
        }

        .navbar-tasks .nav-link.active {
            font-weight: 600;
            text-decoration: underline;
        }

        .card-tasks {
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 10px 25px rgba(15, 23, 42, 0.08);
        }

        .btn-task-main {
            background-color: #10b981; /* verde esmeralda */
            border-color: #059669;
            color: #ecfdf5;
        }

        .btn-task-main:hover {
            background-color: #059669;
            border-color: #047857;
            color: #ecfdf5;
        }

        .btn-task-muted {
            background-color: #e5e7eb;
            border-color: #d1d5db;
            color: #374151;
        }

        .btn-task-muted:hover {
            background-color: #d1d5db;
            border-color: #9ca3af;
            color: #111827;
        }

        .btn-task-danger {
            background-color: #f97373; /* rojo suave, no chillón */
            border-color: #f97373;
            color: #111827;
        }

        .btn-task-danger:hover {
            background-color: #f04343;
            border-color: #e11d48;
            color: #f9fafb;
        }

        .badge-pending {
            background-color: #facc15; /* dorado suave */
            color: #1f2933;
        }

        .badge-done {
            background-color: #4f46e5; /* violeta suave */
        }

        .form-label {
            font-weight: 500;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-tasks mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('tasks.index') }}">Mini Task Manager</a>
        <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navTasks">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navTasks">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('tasks.index') ? 'active' : '' }}"
                        href="{{ route('tasks.index') }}"
                    >
                        Tareas
                    </a>
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->routeIs('tasks.create') ? 'active' : '' }}"
                        href="{{ route('tasks.create') }}"
                    >
                        Nueva tarea
                    </a>
                </li>
            </ul>
            <span class="navbar-text">
                Gestor práctico de tareas
            </span>
        </div>
    </div>
</nav>

<div class="container mb-5">
    @if (session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</div>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
