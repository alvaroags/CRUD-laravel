<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa as migrações.
     */
    public function up(): void
    {
        Schema::create('tarefas', function (Blueprint $table) {
            $table->increments('id');  // Cria a coluna 'id' como chave primária auto-incrementável
            $table->string('tarefa');  // Cria a coluna 'tarefa' como string
            $table->text('descricao')->nullable();  // Cria a coluna 'descricao' como texto, permitindo nulos
            $table->enum('status', ['Pendente', 'Em andamento', 'Concluída'])->default('pendente');  // Cria a coluna 'status' com valores específicos e padrão 'pendente'
            $table->enum('prioridade', ['Baixa', 'Média', 'Alta'])->default('baixa');  // Cria a coluna 'prioridade' com valores específicos e padrão 'baixa'
            $table->timestamps();  // Cria as colunas 'created_at' e 'updated_at'
        });
    }

    /**
     * Reverte as migrações.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefas');  // Deleta a tabela 'tarefas' se ela existir
    }
};
