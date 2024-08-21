@extends('layouts.main')

@section('title', 'FastNet')

@section('content')

    @php
        if (!empty($dado->id)) {
            $route = route('promocao.update', $dado->id);
        } else {
            $route = route('promocao.store');
        }
    @endphp

    <div class="container">
        <div class="
        0t">
            <h3 class="col-12 p-3 text-center"><span
                    class="p-2 bg-opacity-80 border border-success rounded-start bg-success-subtle rounded-end">Formulário de
                    Promoção</span></h3>
            <form action="{{ $route }}" method="post" enctype="multipart/form-data">

                @csrf

                @if (!empty($dado->id))
                    @method('put')
                @endif

                <input type="hidden" name="id"
                    value="@if (!empty($dado->id)) {{ $dado->id }}@else{{ '' }} @endif"><br>

                <div class="form-group col-md-6 offset-md-3">
                    <label class="text-white"><b>Descrição</b></label><br>
                    <input type="text" name="descricao" class="form-control"
                        value="@if (!empty($dado->descricao)) {{ $dado->descricao }}@elseif (!empty(old('descricao'))){{ old('descricao') }}@else{{ '' }} @endif"><br>
                </div>


                <div class="form-group col-md-6 offset-md-3">
                    <label class="text-white"><b>valor</b></label><br>
                    <input type="text" name="valor" class="form-control"
                        value="@if (!empty($dado->valor)) {{ $dado->valor }}@elseif (!empty(old('valor'))){{ old('valor') }}@else{{ '' }} @endif"><br>
                </div>

                <div class="form-group col-md-6 offset-md-3">
                    <label class="text-white"><b>Quantidade</b></label><br>
                    <input type="text" name="quantidade" class="form-control"
                        value="@if (!empty($dado->quantidade)) {{ $dado->quantidade }}@elseif (!empty(old('quantidade'))){{ old('quantidade') }}@else{{ '' }} @endif"><br>
                </div>



                <div class="form-group col-md-6 offset-md-3">
                    @php
                        $descricao_imagem = !empty($dado->imagem) ? $dado->imagem : 'sem_imagem.jpg';
                        //dd($descricao_imagem);
                    @endphp
                    <label for="">Imagem</label><br>
                    <img src="/storage/{{ $descricao_imagem }}" width="300px" alt="imagem" />
                    <input type="file" name="imagem" class="form-control"
                        value="@if (!empty($dado->imagem)) {{ $dado->imagem }}@elseif (!empty(old('imagem'))){{ old('imagem') }}@else{{ '' }} @endif"><br>

                    <br>
                </div>

                <div class="form-group col-md-4 offset-md-8">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <a href="{{ url('promocao') }}" class="btn btn-primary">Voltar</a>
                </div>

            </form>
        </div>
    </div>
@stop
