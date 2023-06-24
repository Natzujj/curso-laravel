<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(Request $request) //Receber na action o request
    {
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';
        echo $request->input('nome');
        echo '<br>';
        echo $request->input('email');
        // var_dump($_POST);

        return view('site.contato', ['titulo' => 'Contato']);
    }
}
