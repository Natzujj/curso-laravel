<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index');
    }

    public function listar(Request $request){

        $fornecedores = Fornecedor::where('nome', 'like', '%' . $request->input('nome') . '%')
        ->where('site', 'like', '%' . $request->input('site') . '%')
        ->where('uf', 'like', '%' . $request->input('uf') . '%')
        ->where('email', 'like', '%' . $request->input('email') . '%')->get();

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores]);
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

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = 'Fornecedor cadastrado com sucesso!';
        }
        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }
}
