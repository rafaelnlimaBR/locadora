<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarUsuariosTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $tabela) {
            $tabela->engine = 'InnoDB';

            $tabela->increments('id');
            $tabela->string('pri_nome',60);
            $tabela->string('seg_nome',60);
            $tabela->string('endereco',90)->nullable();
            $tabela->string('numero',25)->nullable();
            $tabela->string('bairro',60)->nullable();
            $tabela->string('cidade',60)->nullable();
            $tabela->string('uf',2)->nullable();
            $tabela->integer('grupo_id')->unsigned();
            $tabela->string('email')->unique();
            $tabela->string('cep');
            $tabela->boolean('situacao')->default(1);
            $tabela->string('foto')->default('default.jpg');
            $tabela->string('password', 60);
            $tabela->rememberToken();
            $tabela->timestamps();

            $tabela->foreign('grupo_id')->references('id')->on('grupos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('usuarios');
    }
}
