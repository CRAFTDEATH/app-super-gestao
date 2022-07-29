@if (isset($produto_detalhe->id))
    <form action="{{ route('produto-detalhe.update', $produto_detalhe) }}" method="post">
        @csrf
        @method('put')
    @else
        <form action="{{ route('produto-detalhe.store') }}" method="post">
            @csrf
@endif
<div style="padding:7px;">
    <input type="text" name="produto_id" id="produto_id" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}"
        placeholder="Digite o id do produto aqui" class="borda-preta">
    {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}
</div>
<div style="padding:7px;">
    <input type="text" name="comprimento" id="comprimento" value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}"
        placeholder="Digite o comprimento do produto aqui" class="borda-preta">
    {{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}
</div>
<div style="padding:7px;">
    <input type="text" name="largura" id="largura" value="{{ $produto_detalhe->largura ?? old('largura') }}"
        placeholder="Digite a largura do produto aqui" class="borda-preta">
    {{ $errors->has('largura') ? $errors->first('largura') : '' }}
</div>
<div style="padding:7px;">
    <input type="text" name="altura" id="altura" value="{{ $produto_detalhe->altura ?? old('altura') }}"
        placeholder="Digite a altura do produto aqui" class="borda-preta">
    {{ $errors->has('altura') ? $errors->first('altura') : '' }}
</div>
<div style="padding:7px;">
    <select type="text" name="unidade_id" id="unidade_id" placeholder="Selecione unidade do produto aqui"
        class="borda-preta">
        <option>Selecione</option>
        @foreach ($unidades as $unidade)
            <option value="{{ $unidade->id }}"
                {{ ($produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>
                {{ $unidade->descricao }}</option>
        @endforeach;
    </select>
    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
</div>
<div style="padding:7px;">
    <button type="submit" class="borda-preta">Salvar</button>
</div>
</form>
