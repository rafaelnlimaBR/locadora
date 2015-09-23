<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 20/09/2015
 * Time: 00:26
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Modelo extends Model
{
    protected $table = 'modelos';

    private static $rules = [
        'nome' =>  'required|unique:modelos',
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

    public function marca()
    {
        return $this->belongsTo('App\Marca');
    }

    public static function cadastrar(Request $req)
    {

        $modelo             =   new Modelo();
        $modelo->nome       =   $req->get('nome');
        $modelo->marca()->associate(Marca::find($req->get('marca')));

        if($modelo->save() == false){
            throw new \Exception('Não foi possível cadastrar.',200);
        }
    }
    public static function editar(Request $req)
    {
        $modelo             =   Modelo::find($req->get('id'));
        $modelo->nome       =   $req->get('nome');
        $modelo->marca()->associate(Marca::find($req->get('marca')));

        if($modelo->save() == false){
            throw new \Exception('Não foi possível editar.',200);
        }
    }
    public static function excluir(Request $req)
    {
        $modelo          =   Modelo::find($req->get('id'));

        if($modelo->delete() == false){
            throw new \Exception('Não foi possível excluir.',200);
        }
    }
}