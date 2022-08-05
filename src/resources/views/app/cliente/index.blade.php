@extends('app._layouts.basico')
@section('titulo', 'Cliente')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de cliente</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.create') }}">Novo</a></li>
                <li><a href="{{ route('cliente.index') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:90%;margin-left:auto;margin-right:auto;">
                <table style="border-collapse:collapse;width:100%;">
                    <thead>
                        <tr>

                            <th>Nome</th>

                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($clientes as $cliente)
                            <tr>

                                <td>{{ $cliente->nome }}</td>
                                                               <td>
                                    <a style="margin-left:10px;" href="{{ route('cliente.show', $cliente) }}">Visualizar</a>
                                    <a style="margin-left:10px;" href="{{ route('cliente.edit', $cliente) }}">Editar</a>

                                    <a style="margin-left:10px;" href="#" onclick="document.getElementById('cliente-{{$cliente->id}}').submit()">Excluir</a>
                                    <form action="{{route('cliente.destroy',$cliente)}}" method="post" id="cliente-{{$cliente->id}}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @endforeach;
                    </tbody>
                </table>
                {{ $clientes->appends($request)->links() }}
            </div>
            <!--
            <br>
            {{ $clientes->count() }}
            <br>
            {{ $clientes->total() }}
            <br>
            {{ $clientes->firstItem() }}
            <br>
            {{ $clientes->lastItem() }}
            <br>-->
            <br>
            Exibindo {{$clientes->count()}} produtos de {{ $clientes->total() }} (de {{$clientes->firstItem()}} a {{$clientes->lastItem()}})

        </div>
    </div>
@endsection

