<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

        <title>Laravel</title>
    </head>
    <body class="bg-secondary">
        <ul class="list-group text-center container mt-5">
        @foreach ($users as $key => $user)
            <li class="list-group-item @if(!$key) active @endif">
                <h2>Nome: {{ $user['name'] }}</h2>
                <p>Pontos do usuário: {{ $user['pts'] }}</p>
                @if(!$key) Total da esquerda: {{ $totalLeft }} Total da direita: {{ $totalRight }} @endif 
                <p>
                    @isset($user['left']) Pontos a esquerda: {{ $user['left'] }} @endisset
                    @isset($user['right']) Pontos a direita: {{ $user['right'] }} @endisset
                </p>
            </li>
        @endforeach
        </ul>
    </body>
</html>
