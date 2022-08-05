@extends('app._layouts.basico')
@section('titulo', 'Cliente')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de cliente</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.create') }}">Novo</a></li>
                <li><a href="{{ route('pedido.index') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:90%;margin-left:auto;margin-right:auto;">
                <table style="border-collapse:collapse;width:100%;">
                    <thead>
                        <tr>

                            <th>id</th>
                            <th>Cliente</th>
                            <th></th>

                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($pedidos as $pedido)
                            <tr>
                                <td>{{ $pedido->id }}</td>
                                <td>{{ $pedido->cliente_id }}</td>
                                <td><a href="{{route('pedido-produto.create',$pedido)}}">Adicionar Produtos</a></td>
                                <td>
                                    <a style="margin-left:10px;" href="{{ route('pedido.show', $pedido) }}">Visualizar</a>
                                    <a style="margin-left:10px;" href="{{ route('pedido.edit', $pedido) }}">Editar</a>
                                    <a style="margin-left:10px;" href="#" onclick="document.getElementById('pedido-{{$pedido->id}}').submit()">Excluir</a>
                                    <form action="{{route('cliente.destroy',$pedido)}}" method="post" id="pedido-{{$pedido->id}}">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @endforeach;
                    </tbody>
                </table>
                {{ $pedidos->appends($request)->links() }}
            </div>
            <!--
            <br>
            {{ $pedidos->count() }}
            <br>
            {{ $pedidos->total() }}
            <br>
            {{ $pedidos->firstItem() }}
            <br>
            {{ $pedidos->lastItem() }}
            <br>-->
            <br>
            Exibindo {{$pedidos->count()}} produtos de {{ $pedidos->total() }} (de {{$pedidos->firstItem()}} a {{$pedidos->lastItem()}})

        </div>
    </div>
@endsection

