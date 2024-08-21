@extends('layouts.main')

@section('title', 'FastNet')

@section('content')

    @php
        if (!empty($dado->id)) {
            $route = route('pessoa.update', $dado->id);
        } else {
            $route = route('pessoa.store');
        }
    @endphp

    <div class="container">
        <div class="
        0t">
            <h3 class="col-12 p-3 text-center"><span
                    class="p-2 bg-opacity-80 border border-success rounded-start bg-success-subtle rounded-end">Formulário de
                    Pessoa</span></h3>
            <form action="{{ $route }}" method="post" enctype="multipart/form-data">

                @csrf

                @if (!empty($dado->id))
                    @method('put')
                @endif

                <input type="hidden" name="id"
                    value="@if (!empty($dado->id)) {{ $dado->id }}@else{{ '' }} @endif"><br>

                <div class="form-group col-md-6 offset-md-3">
                    <label class="text-white"><b>Nome</b></label><br>
                    <input type="text" name="nome" class="form-control"
                        value="@if (!empty($dado->nome)) {{ $dado->nome }}@elseif (!empty(old('nome'))){{ old('nome') }}@else{{ '' }} @endif"><br>
                </div>


                <div class="form-group col-md-6 offset-md-3">
                    <label class="text-white"><b>CPF</b></label><br>
                    <input type="text" name="cpf" class="form-control"
                        value="@if (!empty($dado->cpf)) {{ $dado->cpf }}@elseif (!empty(old('cpf'))){{ old('cpf') }}@else{{ '' }} @endif"><br>
                </div>

                <div class="form-group col-md-6 offset-md-3">
                    <label class="text-white"><b>Renda</b></label><br>
                    <input type="text" name="renda" class="form-control"
                        value="@if (!empty($dado->renda)) {{ $dado->renda }}@elseif (!empty(old('renda'))){{ old('renda') }}@else{{ '' }} @endif"><br>
                </div>

                <div class="form-group col-md-6 offset-md-3">
                    @php
                        $nome_imagem = !empty($dado->imagem) ? $dado->imagem : 'sem_imagem.jpg';
                        //dd($nome_imagem);
                    @endphp
                    <label for="">Imagem</label><br>
                    <img src="/storage/{{ $nome_imagem }}" width="300px" alt="imagem" />
                    <input type="file" name="imagem" class="form-control"
                        value="@if (!empty($dado->imagem)) {{ $dado->imagem }}@elseif (!empty(old('imagem'))){{ old('imagem') }}@else{{ '' }} @endif"><br>

                    <br>
                </div>

                <div class="form-group col-md-4 offset-md-8">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <a href="{{ url('pessoa') }}" class="btn btn-primary">Voltar</a>
                </div>

            </form>
        </div>
    </div>
@stop
