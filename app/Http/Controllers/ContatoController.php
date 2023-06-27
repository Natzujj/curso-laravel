<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContatoModel;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request) //Receber na action o request
    {
        $motivoContatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato', 'motivoContatos' => $motivoContatos]);
    }

    public function salvar(Request $request){

        $regras = [
            'nome' => 'required|min:3|max:50|unique:site_contato_models',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contato_id' => 'required',
            'mensagem' => 'required',                                   
        ];

        $feedback = [
            'nome.min' => 'O nome deve conter pelo menos 3 caracteres',
            'nome.max' => 'O nome deve conter no máximo 50 caracteres',
            'nome.unique' => 'O nome já existe em nossa base de dados',
            'motivo_contato_id.required' => 'O motivo de contato é obrigatório',
            'required' => 'O campo :attribute é obrigatório',
            'email' => 'O campo :attribute deve ser um email válido'
        ];

        $request->validate($regras, $feedback);

        SiteContatoModel::create($request->all()); 
        return redirect()->route('site.index')->with('sucesso', 'Mensagem enviada com sucesso!');
    }
}
