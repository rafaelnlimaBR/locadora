<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 19/09/2015
 * Time: 14:25
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Mockery\Exception;

class Patio extends Model
{

    private static $rules = [
        'nome'          =>  'required|unique:patios',
        'logradouro'    =>  'required',
        'cidade'        =>  'required',
        'estado'        =>  'required',
        'numero'        =>  'required'
    ];
    private static $mensagens = [
        'required' =>  'O(a) :attribute é obrigatório.',
        'unique'    =>  'O(a) :attribute já existe.'
    ];

    public function scopePesquisarPorNome($query, $nome)
    {
        return $query->where('pesquisa','like','%'.$nome.'%');
    }

    public static function validacao($data)
    {
        if(array_key_exists('id',$data))
            static::$rules['nome']  .=  ',nome,'.$data['id'];

        return \Validator::make($data, static::$rules, static::$mensagens);
    }

    public static function cadastrar(Request $req)
    {
        $patio = new Patio();
        $patio->nome            =   $req->get('nome');
        $patio->situacao        =   $req->get('situacao');
        $patio->cep             =   $req->get('cep');
        $patio->logradouro      =   $req->get('logradouro');
        $patio->cidade          =   $req->get('cidade');
        $patio->estado          =   $req->get('estado');
        $patio->numero          =   $req->get('numero');
        $patio->pesquisa  =   $req->get('nome')." ".$req->get('logradouro')." ".$req->get('cidade')." ".$req->get('estado');

        if($patio->save() == false){
            throw new Exception('não foi possível efetuar o cadastro',200);
        }
    }

    public static function editar(Request $req)
    {
        $patio                  =  Patio::find($req->get('id'));

        $patio->nome            =   $req->get('nome');
        $patio->situacao        =   $req->get('situacao');
        $patio->cep             =   $req->get('cep');
        $patio->logradouro      =   $req->get('logradouro');
        $patio->cidade          =   $req->get('cidade');
        $patio->estado          =   $req->get('estado');
        $patio->numero          =   $req->get('numero');
        $patio->pesquisa  =   $req->get('nome')." ".$req->get('logradouro')." ".$req->get('cidade')." ".$req->get('estado');

        if($patio->save() == false){
            throw new Exception('não foi possível efetuar o cadastro',200);
        }
    }

    public static function excluir(Request $req)
    {
        $patio = Patio::find($req->get('id'));

        if($patio->delete() == false){
            throw new \Exception("Erro ao excluir.",200);
        }
    }
}