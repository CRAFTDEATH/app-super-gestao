@extends('app._layouts.basico')
@section('titulo', 'Pedido Produtos')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Criando pedidos de produtos</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <h4>Detalhe do pedido</h4>
            <p>ID do pedido: {{$pedido->id}}</p>
            <p>Cliente: {{$pedido->cliente_id}}</p>
            <div style="width:90%;margin-left:auto;margin-right:auto;">
                <h4>Item do pedido</h4>
                <table align="center" style="text-align: left">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome do produto</th>
                            <th>Data inclusao do item no pedido</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pedido->produtos as $produto)
                        <tr>
                            <td>{{$produto->id}}</td>
                            <td>{{$produto->nome}}</td>
                            <td>{{$produto->pivot->created_at}}</td>
                            <td>
                                <form action="{{route('pedido-produto.destroy',['pedidoProduto'=> $produto->pivot->id,'pedido_id'=>$pedido->id])}}" id="produto-pivo-{{$produto->pivot->id}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('produto-pivo-{{$produto->pivot->id}}').submit()">Excluir</a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>

                @component('app.pedido_produto._components.create',['pedido'=>$pedido,'produtos'=>$produtos])
                @endcomponent
            </div>
        </div>
    </div>
@endsection
