<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarConfiguracoesTabela extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuracoes',function(Blueprint $tabela){
            $tabela->engine =   'InnoDB';

            $tabela->increments('id');
            $tabela->string('empresa');
            $tabela->string('breve');
            $tabela->string('endereco');
            $tabela->string('numero');
            $tabela->string('bairro');
            $tabela->string('cidade');
            $tabela->string('estado');
            $tabela->string('cep');
            $tabela->string('cnpj');
            $tabela->string('telefone1');
            $tabela->string('telefone2');
            $tabela->string('celular1');
            $tabela->string('celular2');

            $tabela->integer('veiculo_novo')->default(0);
            $tabela->integer('veiculo_reparo')->default(0);
            $tabela->integer('veiculo_locado')->default(0);
            $tabela->integer('veiculo_prereservado')->default(0);
            $tabela->integer('veiculo_reservado')->default(0);
            $tabela->integer('veiculo_disponivel')->default(0);
            $tabela->integer('veiculo_indisponivel')->default(0);

            $tabela->integer('reparo_novo')->default(0);
            $tabela->integer('reparo_cancelado')->default(0);
            $tabela->integer('reparo_concluido')->default(0);

            $tabela->integer('novo_cliente')->default(0);
            $tabela->integer('pre_cliente')->default(0);
            $tabela->integer('inadimplente_cliente')->default(0);
            $tabela->integer('indisponivel_cliente')->default(0);

            $tabela->integer('locado_contrato');
            $tabela->integer('cancelado_contrato');
            $tabela->integer('concluido_contrato');
            $tabela->integer('pre_contrato');

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
        Schema::drop('configuracoes');
    }
}
