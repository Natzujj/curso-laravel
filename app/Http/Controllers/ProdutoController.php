<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Unidade;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $produtos = Produto::paginate(5); 

        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unidades = Unidade::all();
        return view('app.produto.create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /**
         * O paremetro "exists" verifica uma tabela e uma coluna respectivamente
         */
        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'required|exists:unidades,id', 
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório',
            'min' => 'O campo :attribute deve ter no mínimo :min caracteres',
            'max' => 'O campo :attribute deve ter no máximo :max caracteres',
            'integer' => 'O campo :attribute deve ser um número inteiro',
            'exists' => 'O campo :attribute deve ser um valor válido. Não foi encontrado o valor preenchido em nossa tabela',
        ];
        $request->validate($regras, $feedback);

        Produto::create($request->all());
        return redirect()->route('produto.index'); // redireciona para a rota (index)

        /**
         * Para tratar determinada regra antes de salvar, como adicionar nomes em maiusculo, é recomendado
         * instanciar o "produto", caso contrario, utilize o método create.
         */

        // $produto = new Produto();

        // $nome = $request->get('nome');
        // $descricao = $request->get('descricao');

        // $nome = strtoupper($nome);

        // $produto->nome = $nome;
        // $produto->descricao = $descricao;

        // $produto->save();

    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        // dd($produto);
        return view('app.produto.show', ['produto' => $produto]); // mostra a view (show)
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        $produto->update($request->all());
        return redirect()->route('produto.show', $produto->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
