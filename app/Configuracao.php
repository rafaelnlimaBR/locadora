<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 21/09/2015
 * Time: 22:06
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Configuracao extends Model
{
    protected $table = 'configuracoes';

    public static function getConf()
    {
        return Configuracao::find(1);
    }

    public static function atualizar(Request $req)
    {
        $conf   =   Configuracao::getConf();

        $conf->empresa      =   $req->get('empresa');
        $conf->breve        =   $req->get('breve');
        $conf->cnpj         =   $req->get('cnpj');
        $conf->cep          =   $req->get('cep');
        $conf->endereco     =   $req->get('logradouro');
        $conf->bairro       =   $req->get('bairro');
        $conf->cidade       =   $req->get('cidade');
        $conf->estado       =   $req->get('uf');
        $conf->veiculo_novo             =   $req->get('novo_veiculo');
        $conf->veiculo_reparo           =   $req->get('reparo_veiculo');
        $conf->veiculo_locado           =   $req->get('locado_veiculo');
        $conf->veiculo_prereservado     =   $req->get('prereservado_veiculo');
        $conf->veiculo_reservado        =   $req->get('reservado_veiculo');
        $conf->veiculo_disponivel        =   $req->get('disponivel_veiculo');
        $conf->veiculo_indisponivel        =   $req->get('indisponivel_veiculo');

        $conf->reparo_novo              =   $req->get('novo_reparo');
        $conf->reparo_cancelado              =   $req->get('cancelado_reparo');
        $conf->reparo_concluido            =   $req->get('finalizado_reparo');

        $conf->novo_cliente              =   $req->get('novo_cliente');
        $conf->pre_cliente              =   $req->get('pre_cliente');
        $conf->inadimplente_cliente            =   $req->get('inadimplente_cliente');
        $conf->indisponivel_cliente            =   $req->get('indisponivel_cliente');

        $conf->locado_contrato              =   $req->get('locado_contrato');
        $conf->cancelado_contrato           =   $req->get('cancelado_contrato');
        $conf->concluido_contrato           =   $req->get('concluido_contrato');
        $conf->pre_contrato                 =   $req->get('pre_contrato');


        if($conf->save() == false){
            throw new \Exception('Não foi possível realizar a alteração');
        }
    }
}