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
        //Adicionando coluna 'motivo_contato_id'na tabela site_contato_models
        Schema::table('site_contato_models', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contato_id')->after('email');
        });

        DB::statement('update site_contato_models set motivo_contato_id = motivo_contato'); //Atribuir valor de uma coluna a outra

        //Criação da FK
        Schema::table('site_contato_models', function (Blueprint $table) {
            $table->foreign('motivo_contato_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Remover FK da tabela site_contato_models
        Schema::table('site_contato_models', function (Blueprint $table) {
            $table->integer('motivo_contato')->after('email');
            $table->dropForeign('motivo_contatos_id');
        });

        //Atribuir novamente o conteudo da coluna
        DB::statement('update site_contato_models set motivo_contato = motivo_contato_id');

        //Drop Column
        Schema::table('site_contato_models', function (Blueprint $table) {
            $table->dropColumn('motivo_contato_id');
        });

    }
};
