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
            $tabela->string('cep',50)->nullable();
            $tabela->string('bairro',100)->nullable();
            $tabela->string('cidade',100)->nullable();
            $tabela->string('estado',2)->nullable();
            $tabela->string('numero',50)->nullable();
            $tabela->string('telefone',50);
            $tabela->string('celular',50);
            $tabela->string('responsavel',150);
            $tabela->string('email',150)->unique();

            $tabela->timestamps();
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
