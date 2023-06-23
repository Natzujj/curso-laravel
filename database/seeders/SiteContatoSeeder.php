<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\SiteContatoModel;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contato = new SiteContatoModel();
        $contato->nome = 'Sistema SG';
        $contato->telefone = '(61) 9 9999-9999';
        $contato->email = 'contato@sg.com.br';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'Seja Bem vindo ao sistema Super Gestão';
        $contato->save();
    }
}
