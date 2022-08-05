@extends('app._layouts.basico')
@section('titulo', 'Pedidos')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Editando pedidos</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.create') }}">Novo</a></li>
                <li><a href="{{ route('pedido.index') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:90%;margin-left:auto;margin-right:auto;">
                @component('app.pedido._components.form_create_edit', [
                    'pedido'=>$pedido, 'clientes'=> $clientes,
                ])
                @endcomponent
            </div>
        </div>
    </div>
@endsection
