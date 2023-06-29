<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        print_r($request->all());
    }
}
