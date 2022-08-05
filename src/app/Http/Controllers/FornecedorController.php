<?php

namespace App\Http\Controllers;


use App\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index');
    }

    public function listar(Request $request){
        $fornecedores = Fornecedor::with(['produtos'])->where('nome','like','%'.$request->nome .'%')
            ->where('site','like','%'.$request->site.'%')
            ->where('uf','like','%'.$request->uf .'%')
            ->where('email','like','%'.$request->email .'%')
            ->paginate(2);

        return view('app.fornecedor.listar',['fornecedores'=>$fornecedores,'request'=>$request->all()]);
    }

    public function adicionar(Request $request){
        $msg = "";
        if($request->input('_token') != '' && $request->id == ""){
            $rules = [
                'nome'=>'required|min:3|max:40',
                'site'=> 'required',
                'uf' => 'required|min:2|max:2',
                'email'=>'email'
            ];
            $feedback = [
                'required'=> 'O campo :attribute deve ser preenchido',
                'nome.min'=> 'O campo :attribute deve ter no minimo 3 caracter',
                'nome.max'=> 'O campo :attribute deve ter no maximo 40 caracter',
                'uf.min'=> 'O campo :attribute deve ter no minimo 2 caracter',
                'uf.max'=> 'O campo :attribute deve ter no maximo 2 caracter',
                'email.email'=> 'O campo :attribute é invalido'
            ];
            $request->validate($rules,$feedback);
            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());
            $msg = "cadastro realizado com sucesso";
        }
        if($request->input('_token') != '' && $request->id != ''){
            $fornecedor = Fornecedor::find($request->id);
            $update = $fornecedor->update($request->all());
            if($update){
                $msg = "Atualização realizado com sucesso";
            } else {
                $msg = "Atualização apresento problema";
            }
            return redirect()->route('app.fornecedor.editar',['id'=>$request->id,'msg'=>$msg]);
        }
        return view('app.fornecedor.adicionar')->with('msg',$msg);
    }
    public function editar($id, $msg = ''){
        $fornecedor = Fornecedor::find($id);
        return view('app.fornecedor.adicionar',['fornecedor'=>$fornecedor,'msg'=>$msg]);
    }
    public function excluir($id){
        //Fornecedor::find($id)->delete();
        Fornecedor::find($id)->forceDelete();
        return redirect()->route('app.fornecedor');
    }
}
