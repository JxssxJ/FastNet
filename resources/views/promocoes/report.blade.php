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
                <th scope="col">Descricao</th>
                <th scope="col">quantidade</th>
                <th scope="col">valor</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($promocoes as $promocao)
                @php
                    $imagem = !empty($promocao->imagem) ? $promocao->imagem : 'C:\laragon\www\FastNet\storage\app\public\sem_imagem.jpg';
                    $srcImagem = public_path()."C:\laragon\www\FastNet\storage\app\public\imagem".$imagem;
                @endphp
                <tr>
                    <th scope="row">{{ $promocao->id }}</th>
                    <td><img src="{{ $imagem }}" alt="img" style="width: 100px"></td>
                    <td>{{ $promocao->descricao }}</td>
                    <td>{{ $promocao->quantidade }}</td>
                    <td>{{ $promocao->valor }}</td>

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
