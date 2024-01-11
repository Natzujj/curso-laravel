<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('produtos', function (Blueprint $table) {

            // Inserindo registro de fornecedor para estabelecer relacionamento
            $fornecedor_id = DB::table('fornecedores')->insertGetId([
                'nome' => 'Fornecedor Padrão SG',
                'site' => 'Fornecedorpadrãosg.com.br',
                'uf' => 'SP',
                'email' => 'contatofornecedorpadrãosg.com.br'
            ]);

            $table->unsignedBigInteger('fornecedor_id')->after('id')->default($fornecedor_id);
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign('produtos_fornecedor_id_foreing')->references('id')->on('fornecedores');
            $table->dropColumn('fornecedor_id');
        });
    }
};
