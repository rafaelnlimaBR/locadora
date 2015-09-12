<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 04/09/2015
 * Time: 23:05
 */

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;

class AcessoController extends Controller
{


    public function getEntrar(){
        if(\Auth::check()){
            return \Redirect::to('admin/dashboard');

        }
        return \View::make('login');
    }
    public function postEntrar(){

        if(\Auth::attempt(['email'=>\Input::get('endemail'),'password'=>\Input::get('password')])){
            if(\Auth::user()->situacao == 1) {
                return \Redirect::to('admin/dashboard');
            }else{
                \Auth::logout();
                return \Redirect::to('entrar')->with('alerta',['tipo'=>'danger','msg'=>'Usuário bloqueado','icon'=>'ban']);
            }
        }

        return \Redirect::to('entrar')->with('alerta',['tipo'=>'danger','msg'=>'Usuário ou senha incorretos','icon'=>'ban']);

    }
    public function sair(){


            \Auth::logout();
            return \Redirect::to('entrar');



    }
}