<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidoProdutoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProdutoDetalheController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobre', [SobreController::class, 'sobre'])->name('site.sobre');
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.contato');

Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');

Route::prefix('/app')->middleware('autenticacao:padrao,visitante')->group(function() {
    Route::get('/home', [HomeController::class, 'index'])->name('app.home');
    Route::get('/sair', [LoginController::class, 'sair'])->name('app.sair');

    Route::get('/fornecedor', [FornecedorController::class, 'index'])->name('app.fornecedor');
    Route::get('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/listar', [FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::post('/fornecedor/listar', [FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
    Route::get('/fornecedor/editar/{id}/{msg?}', [FornecedorController::class, 'editar'])->name('app.fornecedor.editar'); //recebemos um id como parametro
    Route::get('/fornecedor/excluir/{id}/{msg?}', [FornecedorController::class, 'excluir'])->name('app.fornecedor.excluir'); //recebemos um id como parametro

    Route::resource('/produto', ProdutoController::class);
    Route::resource('/produto-detalhe', ProdutoDetalheController::class);

    Route::resource('/cliente', ClienteController::class);
    Route::resource('/pedido', PedidoController::class);
    // Route::resource('/pedido-produto', PedidoProdutoController::class);
    Route::get('pedido-produto/create/{pedido}', [PedidoProdutoController::class, 'create'])->name('pedido-produto.create');
    Route::post('pedido-produto/store/{pedido}', [PedidoProdutoController::class, 'store'])->name('pedido-produto.store');
    Route::delete('pedido-produto/destroy/{pedido}/{produto}', [PedidoProdutoController::class, 'destroy'])->name('pedido-produto.destroy');
});

Route::get('/teste/{p1}/{p2}', [TesteController::class, 'teste'])->name('teste');

Route::fallback(function() {
    echo 'A rota não foi encontrada. <a href="'.route('site.index').'"> Clique aqui</a> para retornar';
});

Route::get('/contato/{nome}/{categoria_id}', function(String $nome = 'Não Informado', Int $categoria_id = 1){
    echo "Teste rota contato: $nome /  $categoria_id ";
})-> where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+');
