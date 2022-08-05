<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clientes = Cliente::paginate(10);
        return view('app.cliente.index',['clientes'=>$clientes, 'request'=> $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.cliente.create');
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
            'nome'=>'required|min:3|max:40'
        ];
        $feedback = [
            'required'=>'O campo :attribute deve ser preenchido',
            'nome.min'=> 'O campo deve ter no minimo 3 caracter',
            'nome.max'=> 'O campo deve ter no maximo 40 caracter'
        ];
        $request->validate($regras,$feedback);

        $clientes = new Cliente();
        $clientes->nome = $request->nome;
        $clientes->save();

        return redirect()->route('cliente.index',[
            'clientes'=>$clientes
        ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('app.cliente.edit',[
            'clientes'=> $cliente
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $regras = [
            'nome'=>'required|min:3|max:40'
        ];
        $feedback = [
            'required'=>'O campo :attribute deve ser preenchido',
            'nome.min'=> 'O campo deve ter no minimo 3 caracter',
            'nome.max'=> 'O campo deve ter no maximo 40 caracter'
        ];
        $request->validate($regras,$feedback);

        $cliente->update($request->all());

        return redirect()->route('cliente.index',[
            'clientes'=>$cliente
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('cliente.index');
    }
}
