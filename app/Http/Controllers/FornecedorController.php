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
        ->where('email', 'like', '%' . $request->input('email') . '%')
        ->paginate(5); // * Paginação no LARAVEL. paginate recebe int (itens por pagina).

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request){
        // print_r($request->all());
        $msg = '';  

        // CRIAÇÂO
        if($request->input('_token') != '' && $request->input('id') == ''){ 
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

        //EDIÇÃO
        if($request->input('_token') != '' && $request->input('id') != ''){ 
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update){
                $msg = 'Fornecedor atualizado com sucesso!';
            } else{
                $msg = 'Erro ao atualizar fornecedor!';
            }
            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msg' => $msg]);
        }
        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar($id, $msg = ''){
        // echo 'editar';
        $fornecedor = Fornecedor::find($id);
        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }

    public function excluir($id){
        echo  "deletando ID: $id";
        $fornecedor = Fornecedor::find($id)->delete();
        return redirect()->route('app.fornecedor');
    }
}
