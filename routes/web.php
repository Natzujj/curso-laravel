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

Route::get('/', [PrincipalController::class, 'principal']);

Route::get('/sobre', [SobreController::class, 'sobre']);

Route::get('/contato', [ContatoController::class, 'contato']);

Route::get('/contato/{nome}/{categoria_id}', function(String $nome = 'Não Informado', Int $categoria_id = 1){
    echo "Teste rota contato: $nome /  $categoria_id ";
})-> where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+');
