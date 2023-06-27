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

        $request->validate([
            'nome' => 'required|min:3|max:50', //Nomes com no minimo 3 caracteres e no maximo 50
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contato_id' => 'required',
            'mensagem' => 'required',
        ]);

        SiteContatoModel::create($request->all()); 
        return redirect()->route('site.index')->with('sucesso', 'Mensagem enviada com sucesso!');
    }
}
