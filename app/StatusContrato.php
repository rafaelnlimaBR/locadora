<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 26/09/2015
 * Time: 00:07
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class StatusContrato extends Model
{
    protected $table    =   'status_contratos';

    public function contratos()
    {
        return $this->belongsToMany('App\Contrato','status_contratos','status_id','contrato_id');
    }
}