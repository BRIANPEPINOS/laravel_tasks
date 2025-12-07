<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

// Ruta raíz que redirige a /tasks
Route::get('/', function () {
    return redirect()->route('tasks.index');
});

// Rutas resource para tasks
Route::resource('tasks', TaskController::class);
