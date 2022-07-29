@extends('app._layouts.basico')
@section('titulo', 'Produtos')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Editando produtos</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="{{ route('produto.index') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width:90%;margin-left:auto;margin-right:auto;">
                @component('app.produto._components.form_create_edit', ['produto'=>$produto, 'unidades'=> $unidades])
                    
                @endcomponent
            </div>
        </div>
    </div>
@endsection
