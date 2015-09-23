<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarPatiosVeiculosTabela extends Migration
{

    public function up()
    {
        Schema::create('patios_veiculos',function(Blueprint $tabela){
            $tabela->engine = 'InnoDB';

            $tabela->increments('id');
            $tabela->integer('patio_id')->unsigned();
            $tabela->integer('veiculo_id')->unsigned();
            $tabela->timestamps();

            $tabela->foreign('patio_id')->references('id')->on('patios');
            $tabela->foreign('veiculo_id')->references('id')->on('veiculos');
        });
    }


    public function down()
    {
        Schema::dropIfExists('patios_veiculos');



    }
}
