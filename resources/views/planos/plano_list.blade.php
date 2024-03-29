@extends('layouts.main')

@section('title', 'FastNet')

@section('content')

    <div class="container">
        <div class="row row-gap-3 justify-content-center">
            <h4 class="col-md-7 offset-md-2 p-3 "><span
                    class="p-2 bg-info bg-opacity-10 border rounded-start border-info rounded-end text-white"><b>Listagem de
                        Planos de Internet</b></span></h4>

            <form action="{{ route('plano.search') }}" method="post">
                <div class="row">
                    @csrf
                    <div class="col-md-4">
                        <input type="text" name="mega" class="form-control" placeholder="Digite sua pesquisa">

                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-warning"> <i class="fa-solid fa-magnifying-glass"></i>
                            Buscar</button>
                    </div>
                    <div class="col-md-2 offset-md-4">
                        <a href="{{ url('plano/create') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i>
                            Novo</a>
                    </div>
                </div>
            </form>

            <hr>

            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Velocidade (Mbps)</th>
                        <th>Valor(R$)</th>
                        <th>Locação de Equipamentos</th>
                        <th>Tipo de Conexão</th>
                        <th>Ação</th>
                        <th>Ação</th>
                    </tr>
                </thead>

                <tbody class="table-group-divider">
                    @foreach ($dado as $item)
                        <tr>
                            <td class="text-secondary">{{ $item->id }}</td>
                            <td>{{ $item->mega }}</td>
                            <td>{{ $item->valor }}</td>
                            <td>
                                @if (0 != $item->locacao)
                                    {{ 'Sim' }}
                                    @else{{ 'Não' }}
                                @endif
                            </td>
                            <td>{{ ($item->conexao->descricao) ?? ''}}</td>






                            <td><a href="{{ route('plano.edit', $item->id) }} "class="btn btn-primary" title="Editar"><i
                                        class="fa-solid fa-pen"></i></a></td>
                            <td>
                                <form action="{{ route('plano.destroy', $item) }}" method="post">
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
        </div>
    </div>
@stop
