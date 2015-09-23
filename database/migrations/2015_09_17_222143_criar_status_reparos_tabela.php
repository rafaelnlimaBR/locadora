<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarStatusReparosTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_reparos',function(Blueprint $tabela){
            $tabela->engine =   'innoDB';

            $tabela->increments('id');
            $tabela->string('nome',100);
            $tabela->text('descricao');
            $tabela->string('backgroud',100);
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
        Schema::drop('status_reparos');
    }
}
