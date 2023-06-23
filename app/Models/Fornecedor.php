<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //Para poder usar o SoftDelete

class Fornecedor extends Model
{
    use HasFactory;
    use SoftDeletes; //Para poder usar o SoftDelete

    protected $table = 'fornecedores'; //Eloquente Não consegue achar nome da tabela por padrão. Ele tenta achar simplesmente adicionando um "s" no final. Para fazer corretamente com o Eloquente, nomeamos a tabela dessa forma.
    protected $fillable = ['nome', 'site', 'uf', 'email']; //Eloquente consegue ler os campos dessa forma.
}
