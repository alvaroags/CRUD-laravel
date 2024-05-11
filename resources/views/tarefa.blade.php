@extends('templates.template')

@section('title')
    Tarefa
@endsection

@section('content')
    <h1 class="text-center">Tarefa</h1>

    <div class="col-8 m-auto">
        <table class="table text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tarefa</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Status</th>
                    <th scope="col">Prioridade</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tarefas as $tarefa)
                    <tr>
                        <th scope="row">{{$tarefa->id}}</th>
                        <td>{{$tarefa->tarefa}}</td>
                        <td>{{$tarefa->descricao}}</td>
                        <!-- <td>{{$tarefa->status}}</td> -->
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                                    {{$tarefa->status}}
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Pendente</a></li>
                                    <li><a class="dropdown-item" href="#">Em andamento</a></li>
                                    <li><a class="dropdown-item" href="#">Concluído</a></li>
                                </ul>
                            </div>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                                    {{$tarefa->prioridade}}
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Baixa</a></li>
                                    <li><a class="dropdown-item" href="#">Média</a></li>
                                    <li><a class="dropdown-item" href="#">Alta</a></li>
                                </ul>
                            </div>
                        </td>
                        <td>
                            <a href="{{url("tarefa/$tarefa->id")}}">
                                <button class="btn btn-dark">Visualizar</button>
                            </a>
                            <a href="{{url("tarefa/$tarefa->id/edit")}}">
                                <button class="btn btn-primary">Editar</button>
                            </a>
                            <a href="{{url("tarefa/$tarefa->id")}}" class="js-del">
                                <button class="btn btn-danger">Deletar</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-center m-auto">
        <a href="{{url('tarefa/create')}}">
            <button class="btn btn-success">Cadastrar</button>
        </a>
    </div>
@endsection