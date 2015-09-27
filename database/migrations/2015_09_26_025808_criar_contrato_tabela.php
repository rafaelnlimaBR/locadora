<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarContratoTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos',function(Blueprint $tabela){
            $tabela->engine     =   'InnoDB';

            $tabela->increments('id');
            $tabela->integer('cliente_id')->unsigned();
            $tabela->integer('veiculo_id')->unsigned();
            $tabela->integer('patio_entrega')->unsigned();
            $tabela->integer('patio_devolucao')->unsigned()->nullable();
            $tabela->date('data_entrega');
            $tabela->date('data_devolucao');
            $tabela->string('hora_entrega');
            $tabela->string('hora_devolucao');
            $tabela->text('obs');
            $tabela->timestamps();

            $tabela->foreign('cliente_id')->references('id')->on('clientes');
            $tabela->foreign('veiculo_id')->references('id')->on('veiculos');
            $tabela->foreign('patio_entrega')->references('id')->on('patios');
            $tabela->foreign('patio_devolucao')->references('id')->on('patios');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contratos');
    }
}
