@extends('layouts.main')

@section('title', 'FastNet')

@section('content')

<h3>Listagem de Pessoas</h3>

<form action="{{ route('pessoa.search') }}" method="post">

    <div class="row">
        @csrf
        <div class="col-4">
            <label for="">Nome</label><br>
            <input type="text" name="nome" class="form-control"><br>
        </div>
        <div class="col-6" style="margin-top: 22px;">
            <button type="submit" class="btn btn-primary"> <i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
            <a href="{{ url('pessoa/create') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i> Novo</a>
            <a href="{{ url('pessoa/chart') }}" class="btn btn-warning"><i class="fa-solid fa-chart-pie"></i> Gráfico</a>
            <a href="{{ url('pessoa/report') }}" class="btn btn-danger"><i class="fa-solid fa-file-pdf"></i> PDF</a>

        </div>
    </div>
</form>

<hr>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Imagem</th>
            <th>Nome</th>
            <th>renda</th>
            <th>CPF</th>
            <th>Categoria</th>
            <th>Ação</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dados as $item)
            <tr>
                @php
                    $nome_imagem = !empty($item->imagem) ? $item->imagem : 'sem_imagem.jpg';
                @endphp
                <td>{{ $item->id }}</td>
                <td><img src="/storage/{{ $nome_imagem }}" width="150px" alt="imagem" /></td>
                <td>{{ $item->nome }}</td>
                <td>{{ $item->renda }}</td>
                <td>{{ $item->cpf }}</td>
                <td>{{ $item->categoria->nome ?? '' }}</td>
                <td><a href="{{ route('pessoa.edit', $item->id) }} "class="btn btn-outline-primary" title="Editar"><i
                            class="fa-solid fa-pen-to-square"></i></a></td>
                <td>
                    <form action="{{ route('pessoa.destroy', $item) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-outline-danger" title="Deletar"
                            onclick="return confirm('Deseja realmente deletar esse registro?')">
                            <i class="fa-solid fa-trash-can"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $dados->withQueryString()->links('pagination::bootstrap-5') }}
@stop
