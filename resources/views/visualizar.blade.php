@extends('templates.template')

@section('title')
    Tarefa
@endsection

@section('content')
    <h1 class="text-center">Visualizar</h1>

    <div class="col-8 m-auto">
        <table class="table text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tarefa</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{$tarefa->id}}</th>
                    <td>{{$tarefa->tarefa}}</td>
                    <td>{{$tarefa->descricao}}</td>
                    <td>
                        <a href="{{url("tarefa")}}">
                            <button class="btn btn-dark">Voltar</button>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
@endsection