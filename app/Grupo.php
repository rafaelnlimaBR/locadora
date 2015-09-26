<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 04/09/2015
 * Time: 19:30
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Grupo extends Model
{

    private static $restricao = [
        'nome' =>  'required|unique:grupos',
    ];
    private static $mensagem = [
        'required'    => 'O :attribute é obrigado.',
        'unique'      =>    'Esse :attribute já existe',
    ];

    public static function validacao($dados)
    {
        if(array_key_exists('id',$dados)){
            static::$restricao['nome'] .= ',nome,'.$dados['id'];
        }
        return \Validator::make($dados, static::$restricao,static::$mensagem);
    }
    public function usuarios(){
        return $this->hasMany('usuarios')->get();
    }
    public function scopeAdmin($query){
        return $query->where('adm','=',1)->first();
    }

    public function scopePesquisarPorNome($query, $nome)
    {
        return $query->where('nome','like','%'.$nome.'%');
    }

    public static function cadastrar(Request $req)
    {
        $grupo = new Grupo();
        $grupo->nome = $req->nome;
        $grupo->usuario = serialize([
            'vis'   =>  $req->get('usu-vis'),
            'edi'   =>  $req->get('usu-edi'),
            'cad'   =>  $req->get('usu-cad'),
            'exc'   =>  $req->get('usu-exc'),
            'det'   =>  $req->get('usu-det')
        ]);
        $grupo->grupo = serialize([
            'vis'   =>  $req->get('gru-vis'),
            'edi'   =>  $req->get('gru-edi'),
            'cad'   =>  $req->get('gru-cad'),
            'exc'   =>  $req->get('gru-exc'),
            'det'   =>  $req->get('gru-det')
        ]);
        $grupo->situacao = $req->situacao;
        if($grupo->save() == false){
            throw  new \Exception('Não foi possível cadastrar.',200);
        }
    }

    public static function editar(Request $req)
    {
        $grupo = Grupo::find($req->get('id'));
        $grupo->nome = $req->nome;
        $grupo->usuario = serialize([
            'vis'   =>  $req->get('usu-vis'),
            'edi'   =>  $req->get('usu-edi'),
            'cad'   =>  $req->get('usu-cad'),
            'exc'   =>  $req->get('usu-exc'),
            'det'   =>  $req->get('usu-det')
        ]);
        $grupo->grupo = serialize([
            'vis'   =>  $req->get('gru-vis'),
            'edi'   =>  $req->get('gru-edi'),
            'cad'   =>  $req->get('gru-cad'),
            'exc'   =>  $req->get('gru-exc'),
            'det'   =>  $req->get('gru-det')
        ]);
        $grupo->situacao = $req->situacao;
        if($grupo->save() == false){
            throw new \Exception('Não foi possível cadastrar.',200);
        }
    }

    public static function excluir(Request $req)
    {
        $grupo = Grupo::find($req->get('id'));

        if($grupo->delete() == false){
            throw new \Exception('Não foi possível excluir esse registro',200);
        }
    }

    public static function pesquisar(Request $req)
    {

        return Grupo::PesquisarPorNome($req->get('nome'));
    }
}