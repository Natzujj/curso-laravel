<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index');
    }

    public function listar(){
        return view('app.fornecedor.listar');
    }

    public function adicionar(Request $request){
        // print_r($request->all());
        $msg = '';  
        if($request->input('_token') != '') {
            //Cadastro

            $regras = [
                'nome' => 'required|min:3|max:50',
                'site' => 'required',
                'uf' => 'required|min:2|max:2', 
                'email' => 'email',
            ];

            $feedback = [
                'required' => 'O campo :attribute é obrigatório.',
                'nome.min' => 'O campo nome deve ter no mínimo 2 caracteres.',  
                'nome.max' => 'O campo nome deve ter no máximo 50 caracteres.',
                'uf.min' => 'O campo UF deve ter no mínimo 2 caracteres.',
                'uf.max' => 'O campo UF deve ter no máximo 2 caracteres.',
                'email' => 'O campo email deve ser válido.',
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new \App\Models\Fornecedor();
            $fornecedor->create($request->all());

            $msg = 'Fornecedor cadastrado com sucesso!';
        }
        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }
}
