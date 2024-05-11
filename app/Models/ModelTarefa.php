<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelTarefa extends Model
{
    use HasFactory;

    protected $table = 'tarefas';
    protected $fillable = ['tarefa', 'descricao', 'status', 'prioridade'];
}
