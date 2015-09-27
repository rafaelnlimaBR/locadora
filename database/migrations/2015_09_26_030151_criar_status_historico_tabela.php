<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarStatusHistoricoTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historicos',function(Blueprint $tabela){
            $tabela->engine     =   'InnoDB';

            $tabela->increments('id');
            $tabela->integer('contrato_id')->unsigned();
            $tabela->integer('status_id')->unsigned();
            $tabela->text('descricao');
            $tabela->timestamp('criado');
            $tabela->timestamps();

            $tabela->foreign('contrato_id')->references('id')->on('contratos')->onDelete('cascade');
            $tabela->foreign('status_id')->references('id')->on('status_contratos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('historicos');
    }
}
