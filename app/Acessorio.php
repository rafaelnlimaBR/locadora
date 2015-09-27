<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 25/09/2015
 * Time: 22:37
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Acessorio extends Model
{
    protected $table    =   'acessorios';

    private static $rules = [
        'nome'      =>  'required|unique:acessorios',
        'valor'     =>  'required',
        'quantidade'=>  'required',
        'descricao' =>  'required'
    ];
    private static $mensagens = [
        'required' =>  'O :attribute é obrigatório.',
        'unique'    =>  'O :attribute já existe.'
    ];

    public function scopePesquisarPorNome($query, $nome)
    {
        return $query->where('nome','like','%'.$nome.'%');
    }
    public static function validacao($data)
    {
        if(array_key_exists('id',$data))
            static::$rules['nome']  .=  ',nome,'.$data['id'];

        return \Validator::make($data, static::$rules, static::$mensagens);
    }

    public static function cadastrar(Request $req)
    {
        $acessorio              =   new Acessorio();
        $acessorio->nome        =   $req->get('nome');
        $acessorio->valor       =   $req->get('valor');
        $acessorio->descricao   =   $req->get('descricao');
        $acessorio->qnt         =   $req->get('quantidade');

        if($acessorio->save() == false){
            throw new \Exception('Não foi possível cadastrar.',200);
        }
    }

    public static function editar(Request $req)
    {
        $acessorio              =   Acessorio::find($req->get('id'));

        $acessorio->nome        =   $req->get('nome');
        $acessorio->valor       =   $req->get('valor');
        $acessorio->descricao   =   $req->get('descricao');
        $acessorio->qnt         =   $req->get('quantidade');

        if($acessorio->save() == false){
            throw new \Exception('Não foi possível cadastrar.',200);
        }
    }

    public static function excluir(Request $req)
    {
        $acessorio          =   Acessorio::find($req->get('id'));

        if($acessorio->delete() == false){
            throw new \Exception('Não foi possível excluir.',200);
        }
    }

    public static function pesquisar(Request $req)
    {
        return Acessorio::PesquisarPorNome($req->get('nome'));
    }
}