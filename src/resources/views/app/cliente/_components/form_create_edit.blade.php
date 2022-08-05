@if (isset($clientes->id))
    <form action="{{ route('cliente.update', $clientes) }}" method="post">
        @csrf
        @method('put')
    @else
        <form action="{{ route('cliente.store') }}" method="post">
            @csrf
@endif
<div style="padding:7px;">
    <input type="text" name="nome" id="nome" value="{{ $clientes->nome ?? old('nome') }}"
        placeholder="Digite o nome do cliente aqui" class="borda-preta">
    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
</div>
<div style="padding:7px;">
    <button type="submit" class="borda-preta">Salvar</button>
</div>
</form>
