<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarVeiculosTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veiculos',function (Blueprint $tabela){
            $tabela->engine = 'InnoDB';

            $tabela->increments('id');
            $tabela->string('placa',10)->unique();
            $tabela->string('anofabricacao',10);
            $tabela->string('anomodelo',10);
            $tabela->string('cor',100);
            $tabela->string('km',100);
            $tabela->integer('status_id')->unsigned();
            $tabela->integer('modelo_id')->unsigned();
            $tabela->integer('classe_id')->unsigned()->nullable();
            $tabela->integer('patio_id')->unsigned()->nullable();
            $tabela->timestamps();

            $tabela->foreign('modelo_id')->references('id')->on('modelos');
            $tabela->foreign('classe_id')->references('id')->on('classes');
            $tabela->foreign('patio_id')->references('id')->on('patios');
            $tabela->foreign('status_id')->references('id')->on('status_veiculos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patios_veiculos');
        Schema::dropIfExists('veiculos');
    }
}
