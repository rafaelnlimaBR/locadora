<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 04/09/2015
 * Time: 19:30
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{

    public function usuarios(){
        return $this->hasMany('usuarios')->get();
    }
    public function scopeAdmin($query){
        return $query->where('adm','=',1)->first();
    }
}