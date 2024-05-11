<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefaController;
// use app\Http\Controllers\TarefaController;

Route::get('/tarefa', [TarefaController::class, 'index']);
Route::get('/tarefa/create', [TarefaController::class, 'create']);
Route::get('/tarefa/{id}', [TarefaController::class, 'show']);
Route::post('/tarefa', [TarefaController::class, 'store']);

