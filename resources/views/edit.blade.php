@extends('templates.template') 
@section('title')
    Editar
@endsection

@section('content') <!-- Define o conteúdo principal da página -->
    <h1 class="text-center m-4">Editar</h1>

    <div class="col-8 m-auto">

        @if(isset($errors) && count($errors) > 0) <!-- Se houverem erros, eles são exibidos -->
            <div class="text-center mt-4 p-3 alert alert-danger">
                @foreach($errors->all() as $erro)
                    {{$erro}}
                    @if(!$loop->last)
                        <hr>
                    @endif
                @endforeach
            </div>
        @endif

        <form name="formEdit" id="formEdit" method="post" action="{{url("tarefa/$tarefa->id")}}"> <!-- Formulário de edição -->
            @method('PUT')
            @csrf
            <div class="input-group mb-3">
                <input class="form-control" type="text" name="tarefa" id="tarefa" placeholder="Tarefa" value="{{$tarefa->tarefa ?? ''}}"> <!-- Campo de entrada para a tarefa -->
            </div>
            <div class="input-group mb-3">
                <input class="form-control" type="text" name="descricao" id="descricao" placeholder="Descrição" value="{{$tarefa->descricao ?? ''}}"> <!-- Campo de entrada para a descrição -->
            </div>
            <div class="input-group mb-3">
                <select class="form-select" name="status" id="status"> <!-- Campo de seleção para o status -->
                    <option value="">Status</option>
                    <option value="Pendente" @if(isset($tarefa) && $tarefa->status == 'Pendente') selected @endif>Pendente</option>
                    <option value="Em andamento" @if(isset($tarefa) && $tarefa->status == 'Em andamento') selected @endif>Em andamento</option>
                    <option value="Concluída" @if(isset($tarefa) && $tarefa->status == 'Concluída') selected @endif>Concluída</option>
                </select>
            </div>

            <div class="input-group mb-3">
                <select class="form-select" name="prioridade" id="prioridade"> <!-- Campo de seleção para a prioridade -->
                    <option value="">Prioridade</option>
                    <option value="Baixa" @if(isset($tarefa) && $tarefa->prioridade == 'Baixa') selected @endif>Baixa</option>
                    <option value="Média" @if(isset($tarefa) && $tarefa->prioridade == 'Média') selected @endif>Média</option>
                    <option value="Alta" @if(isset($tarefa) && $tarefa->prioridade == 'Alta') selected @endif>Alta</option>
                </select>
            </div>
            <div class="text-center">
                <input class="btn btn-primary" type="submit" value="Editar"> <!-- Botão de submissão do formulário -->
            </div>
        </form>
    </div>
@endsection