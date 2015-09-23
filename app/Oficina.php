<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 22/09/2015
 * Time: 23:59
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Oficina extends Model
{
    protected $table    =   'oficinas';

    public function veiculos()
    {
        return $this->belongsToMany('App\Veiculo','reparos')
            ->withPivot('defeito')
            ->withPivot('solucao')
            ->withPivot('valor')
            ->withPivot('status_id')
            ->withTimestamps();
    }
}