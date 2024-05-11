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
     * Display a listing of the resource.
     */
    public function index()
    {
        $tarefas = $this->objTarefa->all();
        return view('tarefa', compact('tarefas'));
        // return view('tarefa');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Tarefa $request)
    {
        $this->objTarefa->tarefa = $request->tarefa;
        $this->objTarefa->descricao = $request->descricao;
        $this->objTarefa->status = $request->status;
        $this->objTarefa->prioridade = $request->prioridade;
        if($this->objTarefa->save()){
            return redirect('tarefa');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tarefa = $this->objTarefa->find($id);
        return view('visualizar', compact('tarefa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Tarefa $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
