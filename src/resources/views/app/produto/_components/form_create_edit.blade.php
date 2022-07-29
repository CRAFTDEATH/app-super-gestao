@if (isset($produto->id))
    <form action="{{ route('produto.update', $produto) }}" method="post">
        @csrf
        @method('put')
    @else
        <form action="{{ route('produto.store') }}" method="post">
            @csrf
@endif
<div style="padding:7px;">
    <input type="text" name="nome" id="nome" value="{{ $produto->nome ?? old('nome') }}"
        placeholder="Digite o nome do produto aqui" class="borda-preta">
    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
</div>
<div style="padding:7px;">
    <input type="text" name="descricao" id="descricao" value="{{ $produto->descricao ?? old('descricao') }}"
        placeholder="Digite a descricao do produto aqui" class="borda-preta">
    {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
</div>
<div style="padding:7px;">
    <input type="text" name="peso" id="peso" value="{{ $produto->peso ?? old('peso') }}"
        placeholder="Digite o peso do produto aqui" class="borda-preta">
    {{ $errors->has('peso') ? $errors->first('peso') : '' }}
</div>
<div style="padding:7px;">
    <select type="text" name="unidade_id" id="unidade_id" placeholder="Selecione unidade do produto aqui"
        class="borda-preta">
        @foreach ($unidades as $unidade)
            <option>Selecione</option>
            <option value="{{ $unidade->id }}"
                {{ ($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>
                {{ $unidade->descricao }}</option>
        @endforeach;
    </select>
    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
</div>
<div style="padding:7px;">
    <button type="submit" class="borda-preta">Salvar</button>
</div>
</form>
