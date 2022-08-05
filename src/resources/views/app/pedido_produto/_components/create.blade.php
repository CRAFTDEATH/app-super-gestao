<form action="{{ route('pedido-produto.store',$pedido) }}" method="post">
    @csrf

    <div style="padding:7px;">
        <select type="text" name="produto_id" id="produto_id" placeholder="Selecione o produto aqui"
            class="borda-preta">
                <option>Selecione</option>
                @foreach($produtos as $produto)
                    <option value="{{$produto->id}}">{{$produto->nome}}</option>
                @endforeach
        </select>
        {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}
    </div>
    <div style="padding:7px;">
        <input type="number" value="{{old('quantidade') ?? 1 }}" name="quantidade" id="quantidade" placeholder="Selecione o produto aqui" class="borda-preta">
        {{ $errors->has('quantidade') ? $errors->first('quantidade') : '' }}
    </div>
    <div style="padding:7px;">
        <button type="submit" class="borda-preta">Salvar</button>
    </div>
</form>
