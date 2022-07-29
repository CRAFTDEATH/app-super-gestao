
<form action={{route('site.contato')}} method="POST" enctype="application/x-www-form-urlencoded">
    @csrf
    <input type="text" value="{{@old('nome')}}" placeholder="Nome" class={{$classe}} name="nome">
    {{$errors->has('nome') ? $errors->first('nome') : ''}}
    <br>
    <input type="text" value="{{@old('telefone')}}" placeholder="Telefone" class={{$classe}} name="telefone">
    {{$errors->has('telefone') ? $errors->first('telefone'):''}}
    <br>
    <input type="text" value="{{@old('email')}}" placeholder="E-mail" class={{$classe}} name="email">
    {{$errors->has('email') ? $errors->first('email'):''}}
    <br>
    <select class={{$classe}} name="motivo_contatos_id">
        <option value="">Qual o motivo do contato?</option>
        @foreach($motivoContatos as $motivoContato)   
            <option value="{{$motivoContato->id}}" {{old('motivo_contatos_id') == $motivoContato->id ? 'selected' : ''}}>{{$motivoContato->motivo_contato}}</option>
        @endforeach
        
    </select>
    {{$errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id'):''}}
   
    <br>
    <textarea class={{$classe}} name="mensagem" placeholder="Preencha aqui a sua mensagem">{{@old('mensagem')}}</textarea>
    {{$errors->has('mensagem') ? $errors->first('mensagem'):''}}
    <br>
    <button type="submit" class="borda-preta">ENVIAR</button>
</form>