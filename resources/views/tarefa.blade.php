@extends('templates.template') 

@section('title')
    Tarefa
@endsection 

@section('content')
    <head>
        <!-- Link para os estilos dos ícones -->
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-straight/css/uicons-regular-straight.css'>
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.3.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    </head>

    <h1 class="text-center m-4">To do List</h1> 

    <div class="col-10 m-auto table-responsive text-center">
        @csrf 
        @if(session('msg_success'))
            <div class="alert alert-success">
                {{session('msg_success')}}
            </div>  <!-- Exibe mensagem de sucesso se existir na sessão -->
        @endif

        @if(session('msg_error'))
            <div class="alert alert-danger">
                {{session('msg_error')}}
            </div>  <!-- Exibe mensagem de erro se existir na sessão -->
        @endif

        @if(session('msg_update'))
            <div class="alert alert-info">
                {{session('msg_update')}}
            </div>  <!-- Exibe mensagem de atualização se existir na sessão -->
        @endif

        <br>
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"> 

        <table class="table table-striped table-hover text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tarefa</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Status</th>
                    <th scope="col">Prioridade</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody class="align-center">
                @foreach($tarefas as $tarefa)
                    <tr data-id="{{ $tarefa->id }}" data-tarefa="{{ $tarefa }}">
                        <td class="text-center table-cell-middle">{{$tarefa->id}}</td>  <!-- Exibe o ID da tarefa -->
                        <td class="text-center table-cell-middle">{{$tarefa->tarefa}}</td>  <!-- Exibe o nome da tarefa -->
                        <td class="text-center table-cell-middle">{{$tarefa->descricao}}</td>  <!-- Exibe a descrição da tarefa -->
                        <td class="text-center table-cell-middle">
                            <div class="dropdown">
                                <button type="button" class="btn dropdown-toggle @if ($tarefa->status == 'Pendente') text-warning @elseif ($tarefa->status == 'Em andamento') text-info @else text-success @endif" data-bs-toggle="dropdown">
                                    {{$tarefa->status}}
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item status" data-status="Pendente" class="js-prioridade" href="#">Pendente</a></li>
                                    <li><a class="dropdown-item status" data-status="Em andamento" class="js-prioridade" href="#">Em andamento</a></li>
                                    <li><a class="dropdown-item status" data-status="Concluída" class="js-prioridade" href="#">Concluído</a></li>
                                </ul>  <!-- Dropdown para mudar o status da tarefa -->
                            </div>
                        </td>
                        <td class="text-center table-cell-middle">
                            <div class="dropdown" id="dropdownPrioridade">
                                <button type="button" class="text-bg-color btn dropdown-toggle @if ($tarefa->prioridade == 'Baixa') text-success @elseif ($tarefa->prioridade == 'Média') text-warning @else text-danger @endif" data-bs-toggle="dropdown" data="{{ $tarefa->prioridade }}">
                                    {{$tarefa->prioridade}}
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item prioridade" href="#" data-prioridade="Baixa">Baixa</a></li>
                                    <li><a class="dropdown-item prioridade" href="#" data-prioridade="Média">Média</a></li>
                                    <li><a class="dropdown-item prioridade" href="#" data-prioridade="Alta">Alta</a></li>
                                </ul>  <!-- Dropdown para mudar a prioridade da tarefa -->
                            </div>
                        </td>
                        <td class="text-center table-cell-middle">
                            <form action="{{url("tarefa/$tarefa->id/edit")}}" method="GET" class="d-inline">
                                <button type="submit" class="btn btn-sm">
                                    <i class="fi fi-rs-pencil text-primary align-self-stretch"></i>
                                </button>
                            </form>  <!-- Formulário para editar a tarefa -->
                            <form action="{{url("tarefa/$tarefa->id")}}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza de que deseja excluir esta tarefa?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm">
                                    <i class="fi fi-rs-trash-xmark text-danger align-self-stretch"></i>
                                </button>
                            </form>  <!-- Formulário para excluir a tarefa -->
                        </td>
                    </tr>
                @endforeach  <!-- Loop através das tarefas para exibi-las na tabela -->
            </tbody>
        </table>
    </div>

    <div class="text-center m-auto">
        <a href="{{url('tarefa/create')}}">
            <button class="btn btn-primary m-3">Cadastrar</button>
        </a>  <!-- Botão para cadastrar uma nova tarefa -->
    </div>
@endsection 
