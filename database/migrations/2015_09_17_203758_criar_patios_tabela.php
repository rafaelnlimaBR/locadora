<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarPatiosTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patios',function (Blueprint $tabela){
            $tabela->engine = "InnoDB";

            $tabela->increments('id');
            $tabela->string('nome',100)->unique();
            $tabela->text('pesquisa');
            $tabela->string('cidade');
            $tabela->string('estado');
            $tabela->string('logradouro');
            $tabela->string('numero');
            $tabela->string('cep');
            $tabela->boolean('aeroporto')->default(0);
            $tabela->boolean('situacao')->default(0);
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
        Schema::dropIfExists('patios');
    }
}
