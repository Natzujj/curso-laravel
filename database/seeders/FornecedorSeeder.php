<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Fornecedor;; // Adicionar Model para Seeder

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Instanciando objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'fornecedor100.com.br';
        $fornecedor->email = 'fornecedor100@email.com.br';
        $fornecedor->uf = 'SP';
        $fornecedor->save();

        //Método Create, preenchendo o atributo $fillable da classe Fornecedor
        Fornecedor::create(['nome' => 'Fornecedor 200', 'site' => 'fornecedor200.com.br', 'email' => 'fornecedor200@email.com.br', 'uf' => 'SP']);
        Fornecedor::create(['nome' => 'Fornecedor 300', 'site' => 'fornecedor300.com.br', 'email' => 'fornecedor300@email.com.br', 'uf' => 'SP']);

        // Método Insert
        // DB::table('fornecedores')->insert(['nome' => 'Fornecedor 300', 'site' => 'fornecedor300.com.br', 'email' => 'fornecedor300@email.com.br', 'uf' => 'SP']);
    }
}
