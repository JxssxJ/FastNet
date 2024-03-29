@extends('layouts.main')

@section('title', 'FastNet')

@section('content')

    @php
        if (!empty($dado->id)) {
            $route = route('plano.update', $dado->id);
        } else {
            $route = route('plano.store');
        }
    @endphp

    <div class="container">
        <div class="
        0t">
            <h3 class="col-md-8 offset-md-4 p-3"><span
                class="p-2 bg-opacity-80 border border-success rounded-start bg-success-subtle rounded-end">Formulário de Plano</span></h3>
            <form action="{{ $route }}" method="post">

                @csrf

                @if (!empty($dado->id))
                    @method('put')
                @endif

                <input type="hidden" name="id"
                    value="@if (!empty($dado->id)) {{ $dado->id }}@else{{ '' }} @endif"><br>

                <div class="form-group col-md-6 offset-md-3">
                    <label class="text-white"><b>Megas de Velocidade:</b></label><br>
                    <input type="text" name="mega" class="form-control"
                        value="@if (!empty($dado->mega)) {{ $dado->mega }}@elseif (!empty(old('mega'))){{ old('mega') }}@else{{ '' }} @endif"><br>
                </div>


                <div class="form-group col-md-6 offset-md-3">
                    <label class="text-white"><b>Valor do plano (R$):</b></label><br>
                    <input type="text" name="valor" class="form-control"
                        value="@if (!empty($dado->valor)) {{ $dado->valor }}@elseif (!empty(old('valor'))){{ old('valor') }}@else{{ '' }} @endif"><br>
                </div>

                <div class="form-group col-md-6 offset-md-3">
                    <label class="text-white"><b>Possui locação de equipamentos?</b></label><br>
                    <select name="text" id="locacao">
                        <option
                            value="@if (!empty($dado->locacao)) {{ $dado->locacao }}@elseif (!empty(old('locacao'))){{ old('locacao') }}@else{{ '1' }} @endif"">
                            Sim</option>
                        <option
                            value="@if (!empty($dado->locacao)) {{ $dado->locacao }}@elseif (!empty(old('locacao'))){{ old('locacao') }}@else{{ '0' }} @endif"">
                            Não</option>
                    </select>
                </div><br>
                <div class="form-group col-md-6 offset-md-3">
                    <label class="text-white"><b>Tipo de Conexão:</b></label><br>
                    <select name="conexao_id" class="form-select">
                        @foreach ($conexoes as $item)
                            <option value="{{ $item->id }}">{{ $item->descricao }}</option>
                        @endforeach
                    </select><br>
                </div>
                <br>
                <div class="form-group col-md-4 offset-md-8">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <a href="{{ url('plano') }}" class="btn btn-primary">Voltar</a>
                </div>
                
            </form>
        </div>
    </div>
@stop
