<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarGruposTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos',function(Blueprint $tabela){
           $tabela->engine = 'InnooDB';

            $tabela->increments('id');
            $tabela->string('nome',90)->unique();
            $tabela->text('usuario');
            $tabela->text('grupo');
            $tabela->boolean('situacao');
            $tabela->boolean('adm')->default(0);
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
        Schema::drop('grupos');
    }
}
