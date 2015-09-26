<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarReparosTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reparos',function(Blueprint $tabela){
            $tabela->engine = 'InnoDB';

            $tabela->increments('id');
            $tabela->integer('oficina_id')->unsigned();
            $tabela->integer('veiculo_id')->unsigned();
            $tabela->integer('status_id')->unsigned();
            $tabela->text('defeito');
            $tabela->text('solucao');
            $tabela->decimal('valor',10,2)->nullable();
            $tabela->timestamp('entrega')->nullable();
            $tabela->timestamps();

            $tabela->foreign('oficina_id')->references('id')->on('oficinas');
            $tabela->foreign('veiculo_id')->references('id')->on('veiculos');
            $tabela->foreign('status_id')->references('id')->on('status_reparos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reparos');
    }
}
