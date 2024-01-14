<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function produtos(){
        return $this->belongsToMany('App\Models\Item', 'pedido_produtos', 'pedido_id', 'produto_id')->withPivot('id', 'created_at', 'updated_at');
        // 1º Modelo do relacionamento NxN em relação ao modelo que estamos implementando
        // 2º É a tabela auxiliar que armazena os registros de relacionamento
        // 3º representa o nome da FK da tabela mapeada pelo modelo na tabela de relacionamento
        // 4º Representa o nome da FK da tabela mapeada pelo model utilizada no relacionamento que estamos implementando
    }
}
