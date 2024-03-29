@extends('layouts.main')

@section('title', 'FastNet')

@section('content')

    @php
        if (!empty($dado->id)) {
            $route = route('planotv.update', $dado->id);
        } else {
            $route = route('planotv.store');
        }
    @endphp

    <div class="container">
        <div class="row ">
            <h3 class="col-12 p-3 text-center"><span
                    class="p-2 bg-opacity-80 border border-success rounded-start bg-success-subtle rounded-end">Formulário de
                    Planos de TV</span></h3>
            <form action="{{ $route }}" method="post">

                @csrf

                @if (!empty($dado->id))
                    @method('put')
                @endif

                <input type="hidden" name="id"
                    value="@if (!empty($dado->id)) {{ $dado->id }}@else{{ '' }} @endif"><br>

                <div class="form-group col-md-6 offset-md-3">
                    <label class="text-white"><b>Nome do Plano:</b></label><br>
                    <input type="text" name="nome" class="form-control"
                        value="@if (!empty($dado->nome)) {{ $dado->nome }}@elseif (!empty(old('nome'))){{ old('nome') }}@else{{ '' }} @endif"><br>
                </div>


                <div class="form-group col-md-6 offset-md-3">
                    <label class="text-white"><b>Valor do Plano de TV (R$):</b></label><br>
                    <input type="text" name="valor" class="form-control"
                        value="@if (!empty($dado->valor)) {{ $dado->valor }}@elseif (!empty(old('valor'))){{ old('valor') }}@else{{ '' }} @endif"><br>
                </div>

                <div class="form-group col-md-6 offset-md-3">
                    <label class="text-white"><b>Quantidade de Telas:</b></label><br>
                    <input type="text" name="qtd_telas" class="form-control"
                        value="@if (!empty($dado->qtd_telas)) {{ $dado->qtd_telas }}@elseif (!empty(old('qtd_telas'))){{ old('qtd_telas') }}@else{{ '' }} @endif"><br>
                </div>

                
                <div class="form-group col-md-4 offset-md-8">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <a href="{{ url('planotv') }}" class="btn btn-primary">Voltar</a>
                </div>

            </form>
        </div>
    </div>
@stop
