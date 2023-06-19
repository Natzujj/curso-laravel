<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('descricao', 30);
            $table->string('unidade', 5);
            $table->timestamps();
        });

        //adicionar relacionamento com tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
        //adicionar relacionamento com tabela produto_detalhes
        Schema::table('produto_detalhes', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //remover relacionamento com tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign(['unidade_id']); //remover fk || é passado o  nome da fk
            $table->dropColumn('unidade_id'); //remover coluna
        });

        //remover relacionamento com tabela produto_detalhes
        Schema::table('produto_detalhes', function (Blueprint $table) {
            $table->dropForeign(['unidade_id']); //remover fk || é passado o  nome da fk
            $table->dropColumn('unidade_id'); //remover coluna
        });

        Schema::dropIfExists('unidades');
    }
};
