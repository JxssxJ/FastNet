<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <h3>{{ $titulo }}</h3>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Imagem</th>
                <th scope="col">Nome</th>
                <th scope="col">renda</th>
                <th scope="col">CPF</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pessoas as $pessoa)
                @php
                    $imagem = !empty($pessoa->imagem) ? $pessoa->imagem : 'C:\laragon\www\FastNet\storage\app\public\sem_imagem.jpg';
                    $srcImagem = public_path()."C:\laragon\www\FastNet\storage\app\public\imagem".$imagem;
                @endphp
                <tr>
                    <th scope="row">{{ $pessoa->id }}</th>
                    <td><img src="{{ $imagem }}" alt="img" style="width: 100px"></td>
                    <td>{{ $pessoa->nome }}</td>
                    <td>{{ $pessoa->renda }}</td>
                    <td>{{ $pessoa->cpf }}</td>

                </tr>
            @empty
                <tr>
                    <td colspan="6">Sem registro</td>
                </tr>
            @endforelse
        </tbody>
    </table>


</body>

</html>
