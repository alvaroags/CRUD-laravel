@extends('templates.template')

@section('title')
    Cadastrar
@endsection

@section('content') <!-- Define o conteúdo principal da página -->
    <h1 class="text-center m-4">Cadastrar</h1>

    <div class="col-8 m-auto">

        @if(isset($errors) && count($errors) > 0) <!-- Se houver erros, eles serão exibidos aqui -->
            <div class="text-center mt-4 p-3 alert alert-danger">
                @foreach($errors->all() as $erro)
                        {{$erro}}
                        @if(!$loop->last)
                            <hr>
                        @endif
                @endforeach
            </div>
        @endif

        <form name="formCreate" id="formCreate" method="post" action="{{url('tarefa')}}"> <!-- Formulário para criar uma nova tarefa -->
            @csrf
            <div class="input-group mb-3">
                <input class="form-control" type="text" name="tarefa" id="tarefa" placeholder="Tarefa"> <!-- Campo para o nome da tarefa -->
            </div>
            <div class="input-group mb-3">
                <input class="form-control" type="text" name="descricao" id="descricao" placeholder="Descrição"> <!-- Campo para a descrição da tarefa -->
            </div>
            <div class="input-group mb-3">
                <select class="form-select" name="status" id="status"> <!-- Campo para o status da tarefa -->
                    <option value="">Status</option>
                    <option value="Pendente">Pendente</option>
                    <option value="Em andamento">Em andamento</option>
                    <option value="Concluída">Concluída</option>
                </select>
            </div>
            <div class="input-group mb-3">
                <select class="form-select" name="prioridade" id="prioridade"> <!-- Campo para a prioridade da tarefa -->
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