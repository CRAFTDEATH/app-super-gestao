@extends('app._layouts.basico')
@section('titulo', 'Fornecedor')

@section('conteudo')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Fornecedor adicionar</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{route('app.fornecedor.adicionar')}}">Novo</a></li>
                <li><a href="{{route('app.fornecedor')}}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
           
                <div style="width:30%;margin-left:auto;margin-right:auto;">
                    @if(isset($msg))
                        {{$msg}}
                    @endif;
                    <form action="{{route('app.fornecedor.adicionar')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$fornecedor->id ?? ''}}">
                        <div style="padding:7px;">
                            <input type="text" name="nome" id="nome" value="{{$fornecedor->nome ?? old('nome')}}" placeholder="Digite seu nome aqui" class="borda-preta">
                            {{$errors->has('nome') ? $errors->first('nome') : ''}}
                        </div>
                        <div style="padding:7px;">
                            <input type="text" name="site" id="site" value="{{$fornecedor->site ?? old('site')}}" placeholder="Digite o seu site aqui" class="borda-preta">
                            {{$errors->has('site') ? $errors->first('site') : ''}}
                        </div>
                        <div style="padding:7px;">
                            <input type="text" name="uf" id="uf" value="{{$fornecedor->uf ?? old('uf')}}" placeholder="Digite seu UF aqui" class="borda-preta">
                            {{$errors->has('uf') ? $errors->first('uf') : ''}}
                        </div>
                        <div style="padding:7px;">
                            <input type="text" name="email" id="email" value="{{$fornecedor->email ?? old('email')}}" placeholder="Digite seu  e-mail aqui" class="borda-preta">
                            {{$errors->has('email') ? $errors->first('email') : ''}}
                        </div>
                        <div style="padding:7px;">
                            <button type="submit"  class="borda-preta">Salvar</button>
                        </div>
                    </form>  
                </div>   
        </div>
    </div>
       
@endsection