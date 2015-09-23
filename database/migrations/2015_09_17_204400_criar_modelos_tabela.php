<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarModelosTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelos',function (Blueprint $tabela){
            $tabela->engine = "InnoDB";

            $tabela->increments('id');
            $tabela->string('nome');
            $tabela->integer('marca_id')->unsigned();
            $tabela->timestamps();

            $tabela->foreign('marca_id')->references('id')->on('marcas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('modelos');

    }
}
