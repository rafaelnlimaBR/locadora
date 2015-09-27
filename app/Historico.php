<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 26/09/2015
 * Time: 00:08
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    protected $table    =   'historicos';
    public $timestamps = true;

    public function status()
    {
        return $this->belongsTo('App\StatusContrato');
    }

    public function scopeUltimoRegistro($query)
    {
        return $query->orderBy('created_at','desc');
    }
}