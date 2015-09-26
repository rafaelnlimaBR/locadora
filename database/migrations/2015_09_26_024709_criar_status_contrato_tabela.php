<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarStatusContratoTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_contratos',function(Blueprint $tabela){
            $tabela->engine     =   'InnoDB';

            $tabela->increments('id');
            $tabela->string('nome',90)->unique();
            $tabela->string('cor',10);
            $tabela->text('descricao');

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
        Schema::drop('status_contratos');
    }
}
