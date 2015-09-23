<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 21/09/2015
 * Time: 22:05
 */

namespace App\Http\Controllers\Admin;


use App\Configuracao;
use Illuminate\Routing\Controller;

class ConfiguracaoController extends Controller
{
    public function editar()
    {
        $conf   =   Configuracao::getConf();

        return view('admin.configuracao.edicao')->with('conf',$conf);
    }

    public function atualizar()
    {
//        return request()->all();
        try{
            Configuracao::atualizar(request());
            return redirect()->route('dashboard')->with('alerta',['tipo'=>'success','msg'=>'Configuração realizado com sucesso .','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('dashboard')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }
    }
}