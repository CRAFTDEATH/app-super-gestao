<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Super Gestão - @yield('titulo')</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}">
    <style>
        table, td, th {
            border: 1px solid black;
            padding:7px;
        }
    </style>
</head>

<body>
    @include('app._layouts._partials.topo')
    @yield('conteudo')
</body>

</html>
