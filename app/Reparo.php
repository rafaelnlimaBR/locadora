<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 23/09/2015
 * Time: 00:44
 */

namespace App;


use Faker\Provider\zh_TW\DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Reparo extends Model
{
    protected $table    =   'reparos';

    private static $rules = [
        'defeito'       =>  'required',
        'id_oficina'    =>  'required',
        'id_veiculo'    =>  'required'
    ];
    private static $mensagens = [
        'required' =>  'O :attribute é obrigatório.',
    ];

    public static function validacao($data)
    {

        return \Validator::make($data, static::$rules, static::$mensagens);
    }
    public function veiculo()
    {
        return $this->belongsTo('App\Veiculo');
    }

    public function oficina()
    {
        return $this->belongsTo('App\Oficina');
    }

    public function status()
    {
        return $this->belongsTo('App\StatusReparo','status_id');
    }

    public function scopePesquisarStatus($query, $id)
    {
        if($id != 0){
            return $query->where('status_id','=',$id);
        }
    }
    public function scopePesquisarOficina($query, $id)
    {
        if($id != 0){
            return $query->where('oficina_id','=',$id);
        }
    }
    public function scopePesquisarVeiculos($query, $id)
    {
        if($id != 0){
            return $query->where('veiculo_id','=',$id);
        }
    }

    public static function cadastrar(Request $req)
    {
        $reparo             =   new Reparo();
        $veiculo            =   Veiculo::find($req->get('id_veiculo'));
        $reparo->defeito    =   $req->get('defeito');
        $reparo->oficina()->associate(Oficina::find($req->get('id_oficina')));
        $reparo->veiculo()->associate($veiculo);
        $reparo->status()->associate(StatusReparo::find(Configuracao::getConf()->reparo_novo));
        $veiculo->status()->associate(StatusVeiculo::find(Configuracao::getConf()->veiculo_reparo));
        if($reparo->save() == false){
            throw new \Exception('Não foi possível cadastrar.',200);
        }else{
            $veiculo->save();
        }
    }

    public static function editar(Request $req)
    {
        $reparo          =   Reparo::find($req->get('id'));
        $reparo->defeito    =   $req->get('defeito');
        $reparo->oficina()->associate(Oficina::find($req->get('id_oficina')));
        $reparo->veiculo()->associate(Veiculo::find($req->get('id_veiculo')));


        if($reparo->save() == false){
            throw new \Exception('Não foi possível editar.',200);
        }
    }

    public static function excluir(Request $req)
    {
        $reparo          =   Reparo::find($req->get('id'));

        $veiculo    =   Veiculo::find($reparo->veiculo_id);

        if($reparo->delete() == false){
            throw new \Exception('Não foi possível excluir.',200);
        }else{
            $veiculo->status()->associate(StatusVeiculo::find(Configuracao::getConf()->veiculo_disponivel));
        }
    }

    public static function cancelar(Request $req)
    {
        $reparo     =   Reparo::find($req->get('id'));
        $veiculo    =   Veiculo::find($req->get('idveiculo'));

        $reparo->status()->associate(StatusReparo::find(Configuracao::getConf()->reparo_cancelado));
        $veiculo->status()->associate(StatusVeiculo::find(Configuracao::getConf()->veiculo_disponivel));
        if($reparo->save() == false){
            throw new \Exception('Não foi possível alterar o status.',200);
        }else{
            $veiculo->save();
        }
    }
    public static function finalizar(Request $req)
    {
        $reparo =   Reparo::find($req->get('id'));
        $veiculo    =   Veiculo::find($req->get('idveiculo'));

        $reparo->valor      =  $req->get('valor');
        $reparo->solucao    =  $req->get('solucao');
        $reparo->entrega    =   new \DateTime();
        $reparo->status()->associate(StatusReparo::find(Configuracao::getConf()->reparo_concluido));
        $veiculo->status()->associate(StatusVeiculo::find(Configuracao::getConf()->veiculo_disponivel));

        if($reparo->save() == false){
            throw new \Exception('Não foi possível alterar o status.',200);
        }else{
            $veiculo->save();
        }
    }

    public static function  pesquisar(Request $req)
    {
        return Reparo::PesquisarStatus($req->get('status'))->PesquisarVeiculos($req->get('veiculo'))->PesquisarOficina($req->get('oficina'));
    }

}