<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    public function index(Request $request){
        $error = $request->get('error');
        if($request->get('error') == 1) {
            $error = 'Usuario ou senha nao existe';
        }
        if($request->get('error') == 2){
            $error = 'Necesario realizar login para ter acesso a pagina';
        }
        return view('site.login',['titulo'=>'login','error'=>$error]);
    }

    public function autenticar(Request $request){
         
        $rules = [
            'usuario'=>'email',
            'senha'=>'required'
        ];
        $feedback = [
            'usuario.email'=> 'O campo e-mail é obrigatorio',
            'senha.required'=> 'O campo senha é obrigatorio'
        ];
        $request->validate($rules,$feedback);
        $email = $request->get('usuario');
        $password = $request->get('senha');
        $user = new User();
        $exist = $user->where('email',$email)
                    ->where('password',$password)
                    ->get()
                    ->first();
        if(isset($exist->name)){
            session_start();
            $_SESSION['nome'] = $exist->name;
            $_SESSION['email'] = $exist->email;
            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login',['error'=> 1]);
        }
       
    }
    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
