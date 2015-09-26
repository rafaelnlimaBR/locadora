<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 20/09/2015
 * Time: 01:03
 */

namespace App;


use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $table = 'veiculos';

    public function modelo()
    {
        return $this->belongsTo('App\Modelo');
    }
    public function status()
    {
        return $this->belongsTo('App\StatusVeiculo','status_id');
    }

    public function classe()
    {
        return $this->belongsTo('App\Classe');
    }

    public function patio()
    {
        return $this->belongsTo('App\Patio');
    }

    public function scopePesquisarStatus($query, $id)
    {
        if($id != 0) {
            return $query->where('status_id', '=', $id);
        }
    }

    public function scopePesquisarPatio($query, $id)
    {
        if($id != 0){
            return $query->where('patio_id','=',$id);
        }
    }

    public function scopePesquisarClasse($query, $id)
    {
        if($id != 0){
            return $query->where('classe_id','=',$id);
        }
    }

    public function scopePesquisarPlaca($query, $placa)
    {
        return $query->where('placa','like','%'.$placa.'%');
    }

    public function scopePesqusiarModelo($query, $id)
    {
        if($id != 0) {
            return $query->where('modelo_id', '=', $id);
        }
    }
    private static $rules = [
        'placa'         =>  'required|unique:veiculos',
        'fabricacao'    =>  'required',
        'anomodelo'     =>  'required',
        'km'            =>  'required'
    ];
    private static $mensagens = [
        'required' =>  'O :attribute é obrigatório.',
        'unique'    =>  'O :attribute já existe.'
    ];

    public static function validacao($data)
    {
        if(array_key_exists('id',$data))
            static::$rules['placa']  .=  ',placa,'.$data['id'];

        return \Validator::make($data, static::$rules, static::$mensagens);
    }

    public static function cadastrar(Request $req)
    {
        $veiculo                    =   new Veiculo();
        $veiculo->anofabricacao        =   $req->get('fabricacao');
        $veiculo->placa             =   $req->get('placa');
        $veiculo->anomodelo            =   $req->get('anomodelo');
        $veiculo->cor               =   $req->get('cor');
        $veiculo->km                =   $req->get('km');
        $veiculo->classe()->associate(Classe::find($req->get('classe')));
        $veiculo->patio()->associate(Patio::find($req->get('patio')));
        $veiculo->modelo()->associate(Modelo::find($req->get('modelo')));
        $veiculo->status()->associate(StatusVeiculo::find(Configuracao::getConf()->veiculo_novo));

        if($veiculo->save() == false){
             throw new \Exception('Não foi possível cadastrar',200);
        }
        return $veiculo->id;

    }
    public static function editar(Request $req)
    {
        $veiculo                        =   Veiculo::find($req->get('id'));

        $veiculo->anofabricacao         =   $req->get('fabricacao');
        $veiculo->placa                 =   $req->get('placa');
        $veiculo->anomodelo             =   $req->get('anomodelo');
        $veiculo->cor                   =   $req->get('cor');
        $veiculo->km                    =   $req->get('km');
        $veiculo->classe()->associate(Classe::find($req->get('classe')));
        $veiculo->patio()->associate(Patio::find($req->get('patio')));
        $veiculo->modelo()->associate(Modelo::find($req->get('modelo')));

        if($veiculo->save() == false){
            throw new \Exception('Não foi possível editar',200);
        }

    }

    public static function excluir(Request $req)
    {
        $veiculo    =   Veiculo::find($req->get('id'));

        if($veiculo->delete() == false){
            throw new \Exception("Não foi possível excluir",200);
        }
    }

    public static function vincularPatio(Request $req)
    {
        $veiculo        =   Veiculo::find($req->get('veiculo_id'));
        $veiculo->patios()->attach($req->get('patio_id'));

        if($veiculo->save() == false){
            throw new  \Exception('Não foi possível adicionar.',200);
        }
    }

    public static function desvincularPatio(Request $req)
    {
        $veiculo        =   Veiculo::find($req->get('veiculo_id'));
        $veiculo->patios()->detach($req->get('patio_id'));

        if($veiculo->save() == false){
            throw new \Exception('Não foi possível desvincular o pátio');
        }
    }

    public static function pesquisar(Request $req)
    {
        return Veiculo::PesquisarPlaca($req->get('placa'))
            ->PesquisarStatus($req->get('status'))
            ->PesqusiarModelo($req->get('modelos'))
            ->PesquisarPatio($req->get('patios'))
            ->PesquisarClasse($req->get('classes'));
    }

    public static function indisponibilizar(Request $req)
    {
        $veiculo    =   Veiculo::find($req->get('id'));

        $veiculo->status()->associate(StatusVeiculo::find(Configuracao::getConf()->veiculo_indisponivel));

        if($veiculo->save() == false){
            throw new \Exception('Não foi possível alterar o status do veículo');
        }
    }

    public static function disponibilizar(Request $req)
    {
        $veiculo    =   Veiculo::find($req->get('id'));

        $veiculo->status()->associate(StatusVeiculo::find(Configuracao::getConf()->veiculo_disponivel));

        if($veiculo->save() == false){
            throw new \Exception('Não foi possível alterar o status do veículo');
        }
    }
}