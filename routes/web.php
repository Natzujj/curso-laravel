<?php

use App\Http\Controllers\ContatoController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreController;
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
Route::get('/login', function(){return 'Login';})->name('site.login');

Route::prefix('/app')->group(function() {
    Route::get('/clientes', function(){return 'Clientes';})->name('app.clientes');
    Route::get('/fornecedores', function(){return 'Fornecedores';})->name('app.fornecedores');
    Route::get('/produtos', function(){return 'Produtos';})->name('app.produtos');
});

Route::get('/rota1', function(){echo 'Rota 1';})->name('site.rota1');
Route::get('/rota2', function () {
    return redirect()->route('site.rota1');
})->name('site.rota2');

// Route::redirect('/rota2','/rota1'); //Redirect 

Route::fallback(function() {
    echo 'A rota não foi encontrada. <a href="'.route('site.index').'"> Clique aqui</a> para retornar';
});

Route::get('/contato/{nome}/{categoria_id}', function(String $nome = 'Não Informado', Int $categoria_id = 1){
    echo "Teste rota contato: $nome /  $categoria_id ";
})-> where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+');
