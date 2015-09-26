<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 26/09/2015
 * Time: 00:07
 */

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Contrato extends Model
{
    protected $table    =   'contratos';


    public function status()
    {
        return $this->belongsToMany('App\StatusContrato','historicos','contrato_id','status_id')
            ->withPivot('id','descricao','criado')
            ->withTimestamps();
    }

    public function historico()
    {
        return $this->hasMany('App\Historico','contrato_id');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'cliente_id');
    }

    public function veiculo()
    {
        return $this->belongsTo('App\Veiculo','veiculo_id');
    }

    private static $restricao = [

    ];
    private static $mensagem = [

    ];

    public static function validacao($dados)
    {
        if(array_key_exists('id',$dados)){
//            static::$restricao['nome'] .= ',nome,'.$dados['id'];
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
        $contrato   =   new Contrato();
        $contrato->cliente()->associate(Cliente::find($req->get('id_cliente')));
        $contrato->veiculo()->associate(Veiculo::find($req->get('id_veiculo')));


        if($contrato->save() == false){
            throw  new \Exception('Não foi possível cadastrar.',200);
        }else{
            $contrato->status()->attach(1,['descricao'=>'Reservado.','criado'=>new \DateTime()]);
            return $contrato->id;
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