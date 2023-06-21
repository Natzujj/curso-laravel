<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;
    protected $table = 'fornecedores'; //Eloquente Não consegue achar nome da tabela por padrão. Ele tenta achar simplesmente adicionando um "s" no final. Para fazer corretamente com o Eloquente, nomeamos a tabela dessa forma.
}
