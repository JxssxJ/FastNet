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

<h3>Formulário de pessoa</h3>
<form action="{{ $route }}" method="post" enctype="multipart/form-data">

    @csrf

    @if (!empty($dado->id))
        @method('put')
    @endif

    <input type="hidden" name="id"
        value="@if (!empty($dado->id)) {{ $dado->id }}@else{{ '' }} @endif"><br>

    <label for="">Nome</label><br>
    <input type="text" name="nome" class="form-control"
        value="@if (!empty($dado->nome)) {{ $dado->nome }}@elseif (!empty(old('nome'))){{ old('nome') }}@else{{ '' }} @endif"><br>

    <label for="">renda</label><br>
    <input type="text" name="renda" class="form-control"
        value="@if (!empty($dado->renda)) {{ $dado->renda }}@elseif (!empty(old('renda'))){{ old('renda') }}@else{{ '' }} @endif"><br>

    <label for="">CPF</label><br>
    <input type="text" name="cpf" class="form-control"
        value="@if (!empty($dado->cpf)) {{ $dado->cpf }}@elseif (!empty(old('cpf'))){{ old('cpf') }}@else{{ '' }} @endif"><br>
    <br>

    @php
        $nome_imagem = !empty($dado->imagem) ? $dado->imagem : 'sem_imagem.jpg';
        //dd($nome_imagem);
    @endphp
    <label for="">Imagem</label><br>
    <img src="/storage/{{ $nome_imagem }}" width="300px" alt="imagem" />
    <input type="file" name="imagem" class="form-control"
        value="@if (!empty($dado->imagem)) {{ $dado->imagem }}@elseif (!empty(old('imagem'))){{ old('imagem') }}@else{{ '' }} @endif"><br>


    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ url('pessoa') }}" class="btn btn-primary">Voltar</a>
</form>

@stop
