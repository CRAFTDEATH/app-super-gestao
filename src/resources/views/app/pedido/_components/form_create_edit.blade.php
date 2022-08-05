@if (isset($pedido->id))
    <form action="{{ route('pedido.update', $pedido) }}" method="post">
        @csrf
        @method('put')
    @else
        <form action="{{ route('pedido.store') }}" method="post">
            @csrf
@endif
<div style="padding:7px;">
    <select type="text" name="cliente_id" id="cliente_id"
            placeholder="Selecione cliente do produto aqui"
            class="borda-preta">
        @foreach ($clientes as $cliente)
            <option>Selecione</option>
            <option value="{{ $cliente->id }}"
                {{ ($pedido->cliente_id ?? old('cliente_id')) == $cliente->id ? 'selected' : '' }}>
                {{ $cliente->nome }}
            </option>
        @endforeach;
    </select>
    {{ $errors->has('cliente_id') ? $errors->first('cliente_id') : '' }}
</div>
<div style="padding:7px;">
    <button type="submit" class="borda-preta">Salvar</button>
</div>
</form>
