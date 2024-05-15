<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ModelTarefa;
use App\Http\Requests\TarefaRequest as Tarefa;

class TarefaController extends Controller
{
    private $objTarefa;

    public function __construct()
    {
        $this->objTarefa = new ModelTarefa();
    }

    /**
     * Exibe uma lista de recursos.
     */
    public function index()
    {
        $tarefas = $this->objTarefa->all();  // Recupera todas as tarefas
        return view('tarefa', compact('tarefas'));  // Retorna a vista 'tarefa' com os dados das tarefas
    }

    /**
     * Mostra o formulário para criar um novo recurso.
     */
    public function create()
    {
        return view('create');  // Retorna a vista 'create'
    }

    /**
     * Armazena um recurso recém-criado no armazenamento.
     */
    public function store(Tarefa $request)
    {
        $this->objTarefa->tarefa = $request->tarefa;
        $this->objTarefa->descricao = $request->descricao;
        $this->objTarefa->status = $request->status;
        $this->objTarefa->prioridade = $request->prioridade;
        if($this->objTarefa->save()){  // Salva a nova tarefa
            return redirect('tarefa')->with('msg_success', 'Tarefa cadastrada com sucesso!');  // Redireciona com mensagem de sucesso
        }
    }

    /**
     * Exibe o recurso especificado.
     */
    public function show(string $id)
    {
        $tarefa = $this->objTarefa->find($id);  // Encontra a tarefa pelo ID
        return view('visualizar', compact('tarefa'));  // Retorna a vista 'visualizar' com os dados da tarefa
    }

    /**
     * Mostra o formulário para editar o recurso especificado.
     */
    public function edit(string $id)
    {
        $tarefa = $this->objTarefa->find($id);  // Encontra a tarefa pelo ID
        return view('edit', compact('tarefa'));  // Retorna a vista 'edit' com os dados da tarefa
    }

    /**
     * Atualiza o recurso especificado no armazenamento.
     */
    public function update(Tarefa $request, string $id)
    {
        $this->objTarefa->where(['id'=>$id])->update([
            'tarefa'=>$request->tarefa,
            'descricao'=>$request->descricao,
            'status'=>$request->status,
            'prioridade'=>$request->prioridade
        ]);
        return redirect('tarefa')->with('msg_update', 'Tarefa atualizada com sucesso!');  // Redireciona com mensagem de atualização
    }

    public function updateStatus(Tarefa $request, string $id)
    {
        $this->objTarefa->where(['id'=>$id])->update([
            'status'=>$request->status
        ]);
    }

    public function updatePrioridade(Tarefa $request, string $id)
    {
        $this->objTarefa->where(['id'=>$id])->update([
            'prioridade'=>$request->prioridade
        ]);
    }

    /**
     * Remove o recurso especificado do armazenamento.
     */
    public function destroy(string $id)
    {
        $this->objTarefa->destroy($id);  // Deleta a tarefa pelo ID
        return redirect('tarefa')->with('msg_error', 'Tarefa deletada com sucesso!');  // Redireciona com mensagem de exclusão
    }
}
