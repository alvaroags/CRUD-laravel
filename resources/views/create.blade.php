@extends('templates.template')

@section('title')
    Cadastrar
@endsection

@section('content')
    <h1 class="text-center">Cadastrar</h1>

    <div class="col-8 m-auto">
        <form name="formCad" id="formCad" method="post" action="{{url('tarefa')}}">
            @csrf
            <div class="input-group mb-3">
                <input class="form-control" type="text" name="tarefa" id="tarefa" placeholder="Tarefa" required>
            </div>
            <div class="input-group mb-3">
                <input class="form-control" type="text" name="descricao" id="descricao" placeholder="Descrição" required>
            </div>
            <div class="input-group mb-3">
                <select class="form-select" name="status" id="status" required>
                    <option value="">Status</option>
                    <option value="Pendente">Pendente</option>
                    <option value="Em andamento">Em andamento</option>
                    <option value="Concluída">Concluída</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <select class="form-select" name="prioridade" id="prioridade" required>
                    <option value="">Prioridade</option>
                    <option value="Baixa">Baixa</option>
                    <option value="Média">Média</option>
                    <option value="Alta">Alta</option>
                </select>
            </div>
            <div class="text-center">
                <input class="btn btn-primary" type="submit" value="Cadastrar">
            </div>
        </form>
    </div>
@endsection