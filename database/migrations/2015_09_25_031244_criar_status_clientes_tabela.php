<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarStatusClientesTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_clientes',function(Blueprint $tabela){
            $tabela->engine =   'InnoDB';

            $tabela->increments('id');
            $tabela->string('nome',150)->unique();
            $tabela->string('cor',20);
            $tabela->string('descricao',250);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('status_clientes');
    }
}
