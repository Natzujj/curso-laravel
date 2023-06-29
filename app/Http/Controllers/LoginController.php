<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(){
        return view('site.login', ['titulo' => 'Login']);
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

        echo "Email: $email || Senha: $password <br>";

        //iniciar o model User
        $user = new User();

        $usuario = $user->where('email', $email)->where('password', $password)->first();

        if(isset($usuario->name)){
            echo 'USUARIO EXISTE'. '<br>';
        }
        else{
            echo 'USUARIO NÃO EXISTE'. '<br>';
        }
      
    }
}
