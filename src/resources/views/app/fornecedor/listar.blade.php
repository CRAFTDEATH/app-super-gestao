@extends('app._layouts.basico')
@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor listar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:90%;margin-left:auto;margin-right:auto;">
                <table style="border-collapse:collapse;width:100%;">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Site</th>
                            <th>Uf</th>
                            <th>Email</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fornecedores as $fornecedor)
                            <tr>
                                <td>{{ $fornecedor->nome }}</td>
                                <td>{{ $fornecedor->site }}</td>
                                <td>{{ $fornecedor->uf }}</td>
                                <td>{{ $fornecedor->email }}</td>
                                <td>
                                    <a href="{{ route('app.fornecedor.excluir', $fornecedor->id) }}">Excluir</a> |
                                    <a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}">Editar</a>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <p>Lista de produto</p>
                                    <table border="1" style="margin:20px;">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($fornecedores as $key => $produto)
                                            <tr>
                                                <td>{{$fornecedor->produtos->}}</td>
                                                <td></td>
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        @endforeach;
                    </tbody>
                </table>
                {{ $fornecedores->appends($request)->links() }}
            </div>
        </div>
    </div>
@endsection