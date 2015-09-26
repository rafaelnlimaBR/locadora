<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 22/09/2015
 * Time: 23:59
 */

namespace App;


use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Oficina extends Model
{
    protected $table    =   'oficinas';

    private static $rules = [
        'nome'          =>  'required|unique:oficinas',
        'logradouro'      =>  'required',
        'email'         =>  'required|email|unique:oficinas',
        'telefone'      =>  'required',

    ];
    private static $mensagens = [
        'required' =>  'O(a) :attribute é obrigatório.',
        'unique'    =>  'O(a) :attribute já existe.',
        'email'     =>  'Email Inválido'
    ];

    public function scopePesquisarPorNome($query, $nome)
    {
        return $query->where('nome','like','%'.$nome.'%');
    }

    public static function validacao($data)
    {
        if(array_key_exists('id',$data)){
            static::$rules['nome']  .=  ',nome,'.$data['id'];
            static::$rules['email'] .=  ',email,'.$data['id'];
        }
        return \Validator::make($data, static::$rules, static::$mensagens);
    }


    public static function cadastrar(Request $req)
    {


        $oficina                =   new Oficina();
        $oficina->nome          =   $req->get('nome');
        $oficina->endereco      =   $req->get('logradouro');
        $oficina->numero      =   $req->get('numero');
        $oficina->bairro      =   $req->get('bairro');
        $oficina->cidade      =   $req->get('cidade');
        $oficina->estado      =   $req->get('estado');
        $oficina->cep           =   $req->get('cep');
        $oficina->telefone      =   $req->get('telefone');
        $oficina->celular      =   $req->get('celular');
        $oficina->email      =   $req->get('email');

        if($oficina->save() == false){
            throw new \Exception('Não foi possível realizar o cadastro',200);
        }
    }

    public static function editar(Request $req)
    {
        $oficina            =   Oficina::find($req->get('id'));

        $oficina->nome          =   $req->get('nome');
        $oficina->endereco      =   $req->get('logradouro');
        $oficina->numero      =   $req->get('numero');
        $oficina->bairro      =   $req->get('bairro');
        $oficina->cidade      =   $req->get('cidade');
        $oficina->estado      =   $req->get('estado');
        $oficina->cep           =   $req->get('cep');
        $oficina->telefone      =   $req->get('telefone');
        $oficina->celular      =   $req->get('celular');
        $oficina->email         =   $req->get('email');

        if($oficina->save() == false){
            throw new \Exception('Não foi possível realizar o cadastro',200);
        }
    }

    public static function excluir(Request $req)
    {
        $oficina    =   Oficina::find($req->get('id'));

        if($oficina->delete() == false){
            throw new \Exception('Não foi possível excluir',200);
        }
    }



}