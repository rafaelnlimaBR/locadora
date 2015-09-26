<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarAcessoriosTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acessorios',function(Blueprint $tabela){
            $tabela->engine =   'InnoDB';

            $tabela->increments('id');
            $tabela->string('nome')->unique();
            $tabela->decimal('valor',8,2);
            $tabela->text('descricao');
            $tabela->integer('qnt');
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
        Schema::drop('acessorios');
    }
}
