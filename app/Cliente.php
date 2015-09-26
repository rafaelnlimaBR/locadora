<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 25/09/2015
 * Time: 15:15
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Cliente extends Model
{
    protected $table    =   'clientes';

    public function status()
    {
        return $this->belongsTo('App\StatusCliente','status_id');
    }
    private static $restricao = [
        'nome' =>  'required',
        'email'     =>  'required|email|unique:clientes',
        'registro'  =>  'required|unique:clientes'
    ];
    private static $mensagem = [
        'required'    => 'O :attribute é obrigado.',
        'email'     =>  'Email inválido.',
        'unique'    =>  'O :attribute já existe'
    ];

    public static function validacao($dados)
    {
        if(array_key_exists('id',$dados)){
            static::$restricao['registro'] .= ',registro,'.$dados['id'];
            static::$restricao['email'] .= ',email,'.$dados['id'];
        }
        return \Validator::make($dados,static::$restricao,static::$mensagem);
    }

    public function scopePesquisarPorNome($query, $nome)
    {
        return $query->where('nome','like','%'.$nome.'%');
    }


    public function scopePesquisarPorEmail($query, $email)
    {
        return $query->where('email','like','%'.$email.'%');
    }

    public function scopePesquisaTudo($query, $p)
    {
        return $query->where('pesquisa','like','%'.$p.'%');
    }
    public function scopePesquisarPorRegistro($query, $registro)
    {
        return $query->where('registro','like','%'.$registro.'%');
    }
    public function scopePesquisarPorStatus($query, $id)
    {
        if($id != 0) {
            return $query->where('status_id', '=', $id);
        }
    }



    public static function cadastrar(Request $req)
    {

        $cliente                =   new Cliente();
        $cliente->nome          =   $req->get('nome');
        $cliente->tipo_registro =   $req->get('tipo');
        $cliente->registro      =   $req->get('registro');
        $cliente->cep           =   $req->get('cep');
        $cliente->logradouro    =   $req->get('logradouro');
        $cliente->numero        =   $req->get('numero');
//        $cliente->bairro        =   $req->get('bairro');
        $cliente->cidade        =   $req->get('cidade');
        $cliente->estado        =   $req->get('uf');
        $cliente->email         =   $req->get('email');
        $cliente->telefone1     =   $req->get('telefone1');
        $cliente->telefone2     =   $req->get('telefone2');
        $cliente->telefone3     =   $req->get('telefone3');
        $cliente->telefone4     =   $req->get('telefone4');
        $cliente->pesquisa      =   $req->get('nome')." ". $req->get('registro')." ".$req->get('email');
        $cliente->Status()->associate(StatusCliente::find(Configuracao::getConf()->novo_cliente));


        if($cliente->save() == false){
            throw new  \Exception('Não foi possível cadastrar o cliente',200);
        }
    }

    public static function atualizar(Request $req)
    {
        $cliente                =   Cliente::find($req->get('id'));

        $cliente->nome          =   $req->get('nome');
        $cliente->tipo_registro =   $req->get('tipo');
        $cliente->registro      =   $req->get('registro');
        $cliente->cep           =   $req->get('cep');
        $cliente->logradouro    =   $req->get('logradouro');
        $cliente->numero        =   $req->get('numero');
//        $cliente->bairro        =   $req->get('bairro');
        $cliente->cidade        =   $req->get('cidade');
        $cliente->estado        =   $req->get('uf');
        $cliente->email         =   $req->get('email');
        $cliente->telefone1     =   $req->get('telefone1');
        $cliente->telefone2     =   $req->get('telefone2');
        $cliente->telefone3     =   $req->get('telefone3');
        $cliente->telefone4     =   $req->get('telefone4');
        $cliente->pesquisa      =   $req->get('nome')." ". $req->get('registro')." ".$req->get('email');


        if($cliente->save() == false){
            throw new  \Exception('Não foi possível editar o cliente',200);
        }
    }

    public static function excluir(Request $req)
    {
        $cliente = Cliente::find($req->get('id'));

        if($cliente->delete() == false){
            throw new  \Exception('Não foi possível excluir o cliente',200);
        }
    }

    public static function pesquisar(Request $req)
    {

        return Cliente::PesquisarPorNome($req->get('nome'))->PesquisarPorEmail($req->get('email'))->PesquisarPorRegistro($req->get('registro'))->PesquisarPorStatus($req->get('status'));
    }

    public static function pesquisaAjax($req)
    {

        return Cliente::PesquisaTudo($req)->get();
    }
}