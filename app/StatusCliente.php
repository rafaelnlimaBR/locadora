<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 25/09/2015
 * Time: 00:23
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class StatusCliente extends Model
{
    protected $table    =   'status_clientes';

    public function clientes()
    {
        return $this->hasMany('App\Cliente');
    }
}