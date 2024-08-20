@extends('layouts.main')

@section('title', 'FastNet')

@section('content')

    <div class="container">
        <div class="row row-gap-3 justify-content-center">
            <h4 class="col-12 p-3 text-center"><span
                    class="p-2 bg-info bg-opacity-10 border rounded-start border-info rounded-end text-white"><b>Listagem de 
                        Clientes Cadastrados</b></span></h4>

            <form action="{{ route('pessoa.search') }}" method="post">
                <div class="row">
                    @csrf
                    <div class="col-md-4">
                        <input type="text" name="nome" class="form-control" placeholder="Digite sua pesquisa">

                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-warning"> <i class="fa-solid fa-magnifying-glass"></i>
                            Buscar</button>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ url('pessoa/create') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i>
                            Novo</a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ url('pessoa/report') }}" class="btn btn-danger"><i class="fa-solid fa-file-pdf"></i> PDF</a>
                    </div>
                </div>
            </form>

            <hr>

            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Renda</th>
                        <th>Imagem</th>
                        <th>Ação</th>
                        <th>Ação</th>
                    </tr>
                </thead>

                <tbody class="table-group-divider">
                    @foreach ($dados as $item)
                        <tr>
                            @php
                                $nome_imagem = !empty($item->imagem) ? $item->imagem : 'sem_imagem.jpg';
                               // dd( $item->imagem);
                            @endphp
                            <td class="text-secondary">{{ $item->id }}</td>
                            <td>{{ $item->nome }}</td>
                            <td>{{ $item->cpf }}</td>
                            <td>{{ $item->renda }}</td>
                            <td><img src="/storage/{{ $nome_imagem }}" width="150px" alt="imagem" /></td>


                            <td><a href="{{ route('pessoa.edit', $item->id) }} "class="btn btn-primary" title="Editar"><i
                                        class="fa-solid fa-pen"></i></a></td>
                            <td>
                                <form action="{{ route('pessoa.destroy', $item) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger" title="Deletar"
                                        onclick="return confirm('Deseja realmente deletar esse registro?')">
                                        <i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $dados->withQueryString()->links('pagination::bootstrap-5') }}
        </div>
    </div>
@stop
