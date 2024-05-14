<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ModelTarefa;

class TarefaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tarefa = new ModelTarefa();
        $tarefa->tarefa = 'Estudar';
        $tarefa->descricao = 'Estudar Laravel';
        $tarefa->status = 'Pendente';
        $tarefa->prioridade = 'Alta';
        $tarefa->save();

        $tarefa = new ModelTarefa();
        $tarefa->tarefa = 'Trabalhar';
        $tarefa->descricao = 'Trabalhar com Laravel';
        $tarefa->status = 'Concluída';
        $tarefa->prioridade = 'Baixa';
        $tarefa->save();

        $tarefa = new ModelTarefa();
        $tarefa->tarefa = 'Estudar';
        $tarefa->descricao = 'Estudar PHP';
        $tarefa->status = 'Pendente';
        $tarefa->prioridade = 'Alta';
        $tarefa->save();

        $tarefa = new ModelTarefa();
        $tarefa->tarefa = 'Trabalhar';
        $tarefa->descricao = 'Trabalhar com PHP';
        $tarefa->status = 'Concluída';
        $tarefa->prioridade = 'Baixa';
        $tarefa->save();
    }
}
