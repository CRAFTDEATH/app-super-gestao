<?php

namespace App\Http\Controllers;

use App\Item;
use App\Produto;
use App\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Item::with(['itemDetalhe', 'fornecedor'])->paginate(10);
        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $unidades = Unidade::all();
        return view('app.produto.create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'nome'                => 'required|min:3|max:40',
            'descricao'           => 'required|min:3|max:40',
            'peso'                => 'required|integer',
            'unidade_id'          => 'exists:unidades,id'
        ];
        $feedback = [
            'required'            => 'O campo :attribute deve ser preenchido',
            'nome.min'            => 'O campo :attribute deve ter no minimo 3 caracter',
            'nome.max'            => 'O campo :attribute deve ter no maximo 40 caracter',
            'descricao.min'       => 'O campo :attribute deve ter no minimo 3 caracter',
            'descricao.max'       => 'O campo :attribute deve ter no maximo 40 caracter',
            'peso'                => 'O campo ::attribute deve ser um numero inteiro',
            'unidade_id.exists'   => 'A unidade de medida nao existe'
        ];
        $request->validate($regras, $feedback);
        Produto::create($request->all());

        return redirect()->route('produto.index')->with('success', 'Produto Cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show',['produto'=>$produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        return view('app.produto.edit',['produto'=>$produto, 'unidades'=> $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Produto $produto,Request $request)
    {
        $regras = [
            'nome'                => 'required|min:3|max:40',
            'descricao'           => 'required|min:3|max:40',
            'peso'                => 'required|integer',
            'unidade_id'          => 'exists:unidades,id'
        ];
        
        $feedback = [
            'required'            => 'O campo :attribute deve ser preenchido',
            'nome.min'            => 'O campo :attribute deve ter no minimo 3 caracter',
            'nome.max'            => 'O campo :attribute deve ter no maximo 40 caracter',
            'descricao.min'       => 'O campo :attribute deve ter no minimo 3 caracter',
            'descricao.max'       => 'O campo :attribute deve ter no maximo 40 caracter',
            'peso'                => 'O campo ::attribute deve ser um numero inteiro',
            'unidade_id.exists'   => 'A unidade de medida nao existe'
        ];
        $request->validate($regras, $feedback);
        $produto->update($request->all());

        return redirect()->route('produto.show',['produto'=>$produto]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
