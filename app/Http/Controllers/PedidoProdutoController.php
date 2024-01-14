<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Produto;
use App\Models\PedidoProduto;
use Illuminate\Http\Request;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Pedido $pedido)
    {
        $produtos = Produto::all();
        $pedido->produtos; // Eager Loading
        return view('app.pedido_produto.create', ['pedido' => $pedido, 'produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Pedido $pedido)
    {
        $regras = [
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|numeric|min:1'
        ];

        $feedback = [
            'produto_id.exists' => 'O produto informado não existe',
            'required' => 'O campo :attribute é obrigatório',
            'quantidade.required' => 'O campo :attribute é obrigatório',
            'quantidade.numeric' => 'O campo :attribute deve ser um número',
            'quantidade.min' => 'O campo :attribute deve ser no mínimo 1',
        ];

        $request->validate($regras, $feedback);
        
        /*
        $pedidoProduto = new PedidoProduto();
        $pedidoProduto->pedido_id = $pedido->id;
        $pedidoProduto->produto_id = $request->get('produto_id');
        $pedidoProduto->quantidade = $request->get('quantidade');
        $pedidoProduto->save();
        */

        // $pedido->produtos // os registros do relacionamento
        // $pedido->produtos()->attach(
        //     $request->get('produto_id'),
        //     ['quantidade' => $request->get('quantidade')]
        // ); 

        $pedido->produtos()->attach([
            $request->get('produto_id') => ['quantidade' => $request->get('quantidade')]
        ]);

        return redirect()->route('pedido-produto.create', ['pedido' => $pedido->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido, Produto $produto)
    {
        // print_r($pedido->getAttributes());
        // echo '<hr>';
        // print_r($produto->getAttributes());
        // echo '<hr>';
        // echo $pedido->id . ' - ' . $produto->id;

        //convencional
        // PedidoProduto::where([
        //     'pedido_id' => $pedido->id,
        //     'produto_id' => $produto->id,
        // ])->delete();

        //detach -> delete pelo relacionamento
        $pedido->produtos()->detach($produto->id);

        return redirect()->route('pedido-produto.create', ['pedido' => $pedido->id]);

    }
}
