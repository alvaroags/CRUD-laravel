<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefaController;
// use app\Http\Controllers\TarefaController;

Route::delete('/tarefa/{id}', [TarefaController::class, 'destroy']);
Route::get('/tarefa', [TarefaController::class, 'index']);
Route::get('/tarefa/create', [TarefaController::class, 'create']);
// Route::get('/tarefa/{id}', [TarefaController::class, 'show']);
Route::post('/tarefa', [TarefaController::class, 'store']);
Route::get('/tarefa/{id}/edit', [TarefaController::class, 'edit']);
Route::put('/tarefa/{id}', [TarefaController::class, 'update']);
Route::put('/tarefa/{id}/status', [TarefaController::class, 'updateStatus']);
Route::put('/tarefa/{id}/prioridade', [TarefaController::class, 'updatePrioridade']);