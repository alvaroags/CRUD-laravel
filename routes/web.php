<?php

// Importando as classes necessárias
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefaController;

// Definindo a rota para deletar uma tarefa específica. 
Route::delete('/tarefa/{id}', [TarefaController::class, 'destroy']);

// Definindo a rota para listar todas as tarefas. 
Route::get('/tarefa', [TarefaController::class, 'index']);

// Definindo a rota para mostrar o formulário de criação de uma nova tarefa. 
Route::get('/tarefa/create', [TarefaController::class, 'create']);

// Definindo a rota para criar uma nova tarefa. 
Route::post('/tarefa', [TarefaController::class, 'store']);

// Definindo a rota para mostrar o formulário de edição de uma tarefa específica. 
Route::get('/tarefa/{id}/edit', [TarefaController::class, 'edit']);

// Definindo a rota para atualizar uma tarefa específica. 
Route::put('/tarefa/{id}', [TarefaController::class, 'update']);

// Definindo a rota para atualizar o status de uma tarefa específica. 
Route::put('/tarefa/{id}/status', [TarefaController::class, 'updateStatus']);

// Definindo a rota para atualizar a prioridade de uma tarefa específica. 
Route::put('/tarefa/{id}/prioridade', [TarefaController::class, 'updatePrioridade']);