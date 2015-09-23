<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 19/09/2015
 * Time: 18:52
 */

namespace App;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Marca extends Model
{
    protected $table = 'marcas';

    private static $rules = [
        'nome' =>  'required|unique:marcas',
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
        $marca          =   new Marca();
        $marca->nome    =   $req->get('nome');

        if($marca->save() == false){
            throw new \Exception('Não foi possível cadastrar.',200);
        }
    }

    public static function editar(Request $req)
    {
        $marca          =   Marca::find($req->get('id'));
        $marca->nome    =   $req->get('nome');

        if($marca->save() == false){
            throw new \Exception('Não foi possível editar.',200);
        }
    }

    public static function excluir(Request $req)
    {
        $marca          =   Marca::find($req->get('id'));

        if($marca->delete() == false){
            throw new \Exception('Não foi possível excluir.',200);
        }
    }
}