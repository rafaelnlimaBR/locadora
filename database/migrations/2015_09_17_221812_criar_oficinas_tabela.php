<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarOficinasTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oficinas',function (Blueprint $tabela){
            $tabela->engine = 'InnoDB';

            $tabela->increments('id');
            $tabela->string('nome',100)->unique();
            $tabela->string('endereco',200);
            $tabela->string('cep',50);
            $tabela->string('cidade',100);
            $tabela->string('estado',2);
            $tabela->string('numero',50);
            $tabela->string('telefone',50);
            $tabela->string('celular',50);
            $tabela->string('responsavel',150);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oficinas');
    }
}
