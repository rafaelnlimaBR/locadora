<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 21/09/2015
 * Time: 22:12
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class StatusVeiculo extends Model
{
    protected $table = 'status_veiculos';

    public function veiculos()
    {
        return $this->hasMany('App\Veiculo','status_id');
    }
}