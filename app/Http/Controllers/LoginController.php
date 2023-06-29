<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request){
        $erro = '';

        if($request->get('erro') == 1){
            $erro = 'Usuário ou senha inválidos';
        }
        if($request->get('erro') == 2){
            $erro = 'Você não tem permissão para acessar esta página!';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request){
        
        $regras = [
            'usuario' => 'email|required',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario.email' => 'Email inválido',
            'required' => 'O Campo :attribute não pode ser vazio!' 
        ];

        $request->validate($regras, $feedback);

        //recuperar parametros do form
        $email = $request->get('usuario');
        $password = $request->get('senha');

        //iniciar o model User
        $user = new User();

        $usuario = $user->where('email', $email)->where('password', $password)->first();

        if(isset($usuario->name)){
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            // dd($_SESSION);
            return redirect()->route('app.clientes');
        }
        else{
            return redirect()->route('site.login', ['erro' => 1]);
        }
      
    }
}
