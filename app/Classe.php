<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 17/09/2015
 * Time: 20:00
 */

namespace App;


use Faker\Provider\tr_TR\DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Classe extends Model
{
    protected $table = 'classes';

    private static $rules = [
        'nome' =>  'required|unique:classes',
        'valor'  =>  'required',
    ];
    private static $mensagens = [
        'required' =>  'O :attribute é obrigatório.',
        'unique'    =>  'O :attribute já existe.'
    ];

    public static function validacao($data)
    {
        if(array_key_exists('id',$data))
            static::$rules['nome']  .=  ',nome,'.$data['id'];

        return \Validator::make($data, static::$rules, static::$mensagens);
    }

    public function scopePesquisarPorNome($query, $nome)
    {
        return $query->where('nome','like','%'.$nome.'%');
    }

    public static function cadastrar(Request $req)
    {
        $classe = new Classe();
        $classe->nome           = $req->get('nome');
        $classe->situacao       = $req->get('situacao');
        $classe->passageiros    = $req->get('passageiros');
        $classe->malas          = $req->get('malas');
        $classe->ar             = $req->get('ar');
        $classe->dh             = $req->get('dh');
        $classe->abs            = $req->get('abs');
        $classe->airbag         = $req->get('airbag');
        $classe->valor          = $req->get('valor');
        $classe->foto           = "teste.jpg";

        if($classe->save() == false){
            throw new \Exception("Erro ao cadastrar",200);
        }

    }

    public static function editar(Request $req)
    {
        $classe = Classe::find($req->get('id'));

        $classe->nome           = $req->get('nome');
        $classe->situacao       = $req->get('situacao');
        $classe->passageiros    = $req->get('passageiros');
        $classe->malas          = $req->get('malas');
        $classe->ar             = $req->get('ar');
        $classe->dh             = $req->get('dh');
        $classe->abs            = $req->get('abs');
        $classe->airbag         = $req->get('airbag');
        $classe->valor          = $req->get('valor');
        $classe->foto           = "teste.jpg";

        if($classe->save() == false){
            throw new \Exception("Erro ao editar.",200);
        }
    }

    public static function excluir(Request $req)
    {
        $classe = Classe::find($req->get('id'));

        if($classe->delete() == false){
            throw new \Exception("Erro ao excluir.",200);
        }
    }
}