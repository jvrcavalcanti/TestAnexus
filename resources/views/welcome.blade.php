<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

        <title>Laravel</title>
    </head>
    <body>
        <ul class="list-group text-center">
        @foreach ($users as $user)
            <li class="list-group-item">
                <h2>Nome: {{ $user['name'] }}</h2>
                <p>Pontos do usuário: {{ $user['pts'] }}</p>
                <p>
                    @isset($user['left']) Pontos a esquerda: {{ $user['left'] }} @endisset
                    @isset($user['right']) Pontos a direita: {{ $user['right'] }} @endisset
                </p>
            </li>
        @endforeach
        </ul>
    </body>
</html>