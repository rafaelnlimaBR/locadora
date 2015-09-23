<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarClassesTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes',function (Blueprint $tabela){
            $tabela->engine = "InnoDB";

            $tabela->increments('id');
            $tabela->string('nome',100)->unique();
            $tabela->integer('passageiros')->default(1);
            $tabela->integer('malas')->default(1);
            $tabela->boolean('ar')->default(0);
            $tabela->boolean('dh')->default(0);
            $tabela->boolean('abs')->default(0);
            $tabela->boolean('airbag')->default(0);
            $tabela->decimal('valor',12,2)->default(0.00);
            $tabela->string('foto')->default('sem-foto.png');
            $tabela->boolean('situacao')->default(0);
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
        Schema::dropIfExists('classes');
    }
}
