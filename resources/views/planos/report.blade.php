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

    <h3 class="md-3">{{ $titulo }}</h3>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Mega</th>
                <th scope="col">Valor</th>
                <th scope="col">Locação</th>
                <th scope="col">Conexão</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($planos as $plano)
                <tr>
                    <th scope="row">{{ $plano->id }}</th>
                    <td>{{ $plano->mega }}</td>
                    <td>{{ $plano->valor }}</td>
                    <td>{{ $plano->locacao }}</td>
                    <td>{{ $plano->conexao->descricao ?? '' }}</td>
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
