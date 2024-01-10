<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'produtos';
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    public function itemDetalhe(){
        // posso passar parametros personalizados, passando nome da FK e nome da PK no método hasOne
        return $this->hasOne('App\Models\ItemDetalhe', 'produto_id', 'id');
    }
}
