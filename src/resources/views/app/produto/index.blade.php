@extends('app._layouts.basico')
@section('titulo', 'Produtos')
@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Listagem de produtos</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="{{ route('produto.index') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:90%;margin-left:auto;margin-right:auto;">
                <table style="border-collapse:collapse;width:100%;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Fornecedor</th>
                            <th>Site</th>
                            <th>Peso</th>
                            <th>Comprimento</th>
                            <th>Altura</th>
                            <th>Largura</th>
                            <th>Unidade ID</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{ $produto->id }}</td>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->descricao }}</td>
                                <td>{{ $produto->fornecedor->nome }}</td>
                                <td>{{ $produto->fornecedor->site }}</td>
                                <td>{{ $produto->peso }}</td>
                                <td>{{ $produto->itemDetalhe->comprimento ?? '' }}</td>
                                <td>{{ $produto->itemDetalhe->altura ?? '' }}</td>
                                <td>{{ $produto->itemDetalhe->largura ?? '' }}</td>
                                <td>{{ $produto->unidade_id }}</td>
                                <td>
                                    <a style="margin-left:10px;" href="{{ route('produto.show', $produto) }}">Visualizar</a>
                                    <a style="margin-left:10px;" href="{{ route('produto.edit', $produto) }}">Editar</a>

                                    <a style="margin-left:10px;" href="#"
                                        onclick="document.getElementById('produto-{{ $produto->id }}').submit()">Excluir</a>
                                    <form action="{{ route('produto.destroy', $produto) }}" method="post"
                                        id="produto-{{ $produto->id }}">
                                        @csrf
                                        @method('delete')

                                    </form>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="12">
                                    <p>Pedidos</p>
                                    @foreach ($produto->pedidos as $pedido)
                                        <a href="{{ route('pedido-produto.create', $pedido) }}">Pedido {{ $pedido->id }}</a>,
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach;



                    </tbody>


                </table>
                {{ $produtos->appends($request)->links() }}
            </div>
            <!--
                <br>
                {{ $produtos->count() }}
                <br>
                {{ $produtos->total() }}
                <br>
                {{ $produtos->firstItem() }}
                <br>
                {{ $produtos->lastItem() }}
                <br>-->
            <br>
            Exibindo {{ $produtos->count() }} produtos de {{ $produtos->total() }} (de {{ $produtos->firstItem() }} a
            {{ $produtos->lastItem() }})

        </div>
    </div>
@endsection
