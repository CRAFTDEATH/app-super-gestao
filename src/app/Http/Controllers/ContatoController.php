<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MotivoContato;
use App\SiteContato;

class ContatoController extends Controller
{
    public function contato(){
        $motivoContatos = MotivoContato::all();
        return view('site.contato',['motivoContatos'=>$motivoContatos]);
    }
    public function salvar(Request $request){
        

        $request->validate([
            'nome'=>'required|min:3|max:40|unique:site_contatos',
            'telefone'=> 'required',
            'email'=> 'required|email',
            'motivo_contatos_id'=> 'required|max:2000'
        ],[
            'nome.required'=> 'O campo nome é obrigatorio',
            'nome.min' => 'O campo nome requer 3 caracter no minimo',
            'nome.max' => 'O campo nome requer 40 caracter no maximo',
            'nome.unique' => 'O campo nome deve ser unico',
            'telefone.required'=> 'O campo telefone é obrigatorio',
            'email.required'=> 'O campo email é obrigatorio',
            'email.email'=> 'O campo email não é valido',
            'motivo_contatos_id.required'=> 'O campo motivo de contato é obrigatorio',
            'motivo_contatos_id.max'=> 'O campo motivo de contato requer 2000 caracter no maximo',
        ]);
        SiteContato::create($request->all());
        
        return redirect()->route('site.contato');
    }
  
}
