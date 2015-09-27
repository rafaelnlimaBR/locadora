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

    public function patioEntrega()
    {
        return $this->belongsTo('App\Patio','patio_entrega');
    }
    public function patioDevolucao()
    {
        return $this->belongsTo('App\Patio','patio_devolucao');
    }

    public function historicos()
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
        'id_veiculo'    =>  'required',
        'id_cliente'    =>  'required',
        'dataentrega'   =>  'required|date_format:d-m-Y|after:now',
        'datadevolucao' =>  'required|date_format:d-m-Y|after:dataentrega'
    ];
    private static $mensagem = [
        'required'      =>   'Campo Obrigatório',
        'date_format'   =>  'Formato da data esta incorreto',
        'after'         =>  'Dia inválido'
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
        $veiculo    =   Veiculo::find($req->get('id_veiculo'));

        $contrato->cliente()->associate(Cliente::find($req->get('id_cliente')));
        $contrato->veiculo()->associate($veiculo);
        $contrato->patioEntrega()->associate(Patio::find($req->get('patioEntrega')));
        $contrato->patioDevolucao()->associate(Patio::find($req->get('patioDevolucao')));
        $contrato->data_entrega     =   date('Y-m-d',strtotime(request()->get('dataentrega')));
        $contrato->data_devolucao     =   date('Y-m-d',strtotime(request()->get('datadevolucao')));
        $contrato->hora_entrega        =   $req->get('horaEntrega');
        $contrato->hora_devolucao        =   $req->get('horadevolucao');
        $contrato->obs  =   $req->get('obs');


        if($contrato->save() == false){
            throw  new \Exception('Não foi possível cadastrar.',200);
        }else{
            $contrato->status()->attach($req->get('status_id'),['descricao'=>'Reservado.','criado'=>new \DateTime()]);

            if(Configuracao::getConf()->locado_contrato == $req->get('status_id')){
                $veiculo->status()->associate(StatusVeiculo::find(Configuracao::getConf()->veiculo_locado));
            }elseif(Configuracao::getConf()->reservado_contrato == $req->get('status_id')){
                $veiculo->status()->associate(StatusVeiculo::find(Configuracao::getConf()->veiculo_reservado));
            }
            $veiculo->save();

            return $contrato->id;
        }
    }

    public static function editar(Request $req)
    {
        $contrato   =   Contrato::find($req->get('id'));
        $veiculo    =   Veiculo::find($req->get('id_veiculo'));

        $contrato->cliente()->associate(Cliente::find($req->get('id_cliente')));
        $contrato->veiculo()->associate($veiculo);
        $contrato->patioEntrega()->associate(Patio::find($req->get('patioEntrega')));
        $contrato->patioDevolucao()->associate(Patio::find($req->get('patioDevolucao')));
        $contrato->data_entrega     =   $req->get('dataentrega');
        $contrato->data_devolucao     =   $req->get('datadevolucao');
        $contrato->hora_entrega        =   $req->get('horaEntrega');
        $contrato->hora_devolucao        =   $req->get('horadevolucao');
        $contrato->obs  =   $req->get('obs');

        if($contrato->save() == false){
            throw new \Exception('Não foi possível cadastrar.',200);
        }
    }

    public static function excluir(Request $req)
    {
        $contrato   =   Contrato::find($req->get('id'));
        $veiculo    =   Veiculo::find($contrato->veiculo_id);

        if($contrato->delete() == false){
            throw new \Exception('Não foi possível excluir esse registro',200);
        }else{
            $veiculo->status()->associate(StatusVeiculo::find(Configuracao::getConf()->veiculo_disponivel));
            $veiculo->save();
        }
    }

    public static function pesquisar(Request $req)
    {

        return Grupo::PesquisarPorNome($req->get('nome'));
    }

    public static function cancelar(Request $req)
    {
        $contrato   =   Contrato::find($req->get('id'));
        
        $contrato->status()->attach(Configuracao::getConf()->cancelado_contrato,['descricao'=>$req->get('descricao'),'criado'=>new \DateTime()]);

        $veiculo    =   Veiculo::find($contrato->veiculo_id);
        $veiculo->status()->associate(StatusVeiculo::find(Configuracao::getConf()->veiculo_disponivel));
        $veiculo->save();
    }

    public static function locar(Request $req)
    {
        $contrato   =   Contrato::find($req->get('id'));
        $contrato->status()->attach(Configuracao::getConf()->locado_contrato,['descricao'=>$req->get('descricao'),'criado'=>new \DateTime()]);


        $veiculo    =   Veiculo::find($contrato->veiculo_id);
        $veiculo->status()->associate(StatusVeiculo::find(Configuracao::getConf()->veiculo_locado));
        $veiculo->save();
    }

    public static function finalizar(Request $req)
    {
        $contrato   =   Contrato::find($req->get('id'));

        $contrato->status()->attach(Configuracao::getConf()->concluido_contrato,['descricao'=>$req->get('descricao'),'criado'=>new \DateTime()]);

        $veiculo    =   Veiculo::find($contrato->veiculo_id);
        $veiculo->status()->associate(StatusVeiculo::find(Configuracao::getConf()->veiculo_disponivel));
        $veiculo->save();
    }
}