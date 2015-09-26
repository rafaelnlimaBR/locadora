<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarClientesTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes',function(Blueprint $tabela){
            $tabela->engine =   'InnoDB';

            $tabela->increments('id');
            $tabela->string('nome',100);
            $tabela->string('tipo_registro',50);
            $tabela->string('registro',100)->unique();
            $tabela->string('cep',100)->nullable();
            $tabela->string('logradouro',100);
            $tabela->string('numero');
            $tabela->string('cidade',100);
            $tabela->string('estado',2);
            $tabela->string('email',150)->unique();
            $tabela->string('telefone1',50);
            $tabela->string('telefone2',50)->nullable();
            $tabela->string('telefone3',50)->nullable();
            $tabela->string('telefone4',50)->nullable();
            $tabela->integer('status_id')->unsigned();
            $tabela->text('pesquisa');
            $tabela->timestamps();

            $tabela->foreign('status_id')->references('id')->on('status_clientes');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clientes');
    }
}
