<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContatoModel;

class ContatoController extends Controller
{
    public function contato(Request $request) //Receber na action o request
    {
        $contato = new SiteContatoModel();

        // SETANDO ATRIBUTOS INDIVIDUALMENTE
        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');
        // print_r($contato->getAttributes()); //verificar o que está sendo armazenado na variavel
        // $contato->save();

        // METODO FILL()
        // $contato->fill($request->all()); //Necessário objeto $fillable no model SiteContatoModel
        // print_r($contato->getAttributes());
        // $contato->save();

        //MÉTODO CREATE() -> Já faz o SAVE() automaticamente
        // if ($_SERVER["REQUEST_METHOD"] == "POST") { // Para que só tente fazer a criação se o método for POST (estava sendo enviado o formulario mesmo no metodo GET)
        //     $contato->create($request->all()); //Necessário objeto $fillable no model SiteContatoModel
        // }

        return view('site.contato', ['titulo' => 'Contato']);
    }

    public function salvar(Request $request){

        $request->validate([
            'nome' => 'required',
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required',
        ]);

        SiteContatoModel::create($request->all()); 
    }
}
