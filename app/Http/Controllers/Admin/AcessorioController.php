<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 25/09/2015
 * Time: 22:37
 */

namespace App\Http\Controllers\Admin;


use App\Acessorio;
use Illuminate\Routing\Controller;

class AcessorioController extends Controller
{
    public function index()
    {
        $acessorios  =   Acessorio::paginate(15);
        return view('admin.acessorio.index')->with('acessorios',$acessorios);
    }

    public function novo()
    {
        return view('admin.acessorio.novo');
    }

    public static function cadastrar()
    {
        $validacao = Acessorio::validacao(request()->all());

        if($validacao->fails()){
            return redirect()->route('acessorio.novo')->withErrors($validacao)->withInput();
        }
        try{
            Acessorio::cadastrar(request());
            return redirect()->route('acessorio.index')->with('alerta',['tipo'=>'success','msg'=>'Cadastrado com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('acessorio.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }
    }

    public function editar($id)
    {
        $acessorio      = Acessorio::find($id);
        if($acessorio == null){
            return redirect()->route('acessorio.index')->with('alerta',['tipo'=>'warning','msg'=>'Nenhum registro foi localizado','icon'=>'ban']);
        }
        return view('admin.acessorio.edicao')->with('acessorio',$acessorio);
    }

    public function excluir()
    {
        try{
            Acessorio::excluir(request());
            return redirect()->route('acessorio.index')->with('alerta',['tipo'=>'success','msg'=>'Excluido com sucesso','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('acessorio.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);;
        }


    }

    public function detalhes($id)
    {
        $marca = Marca::find($id);
        if($marca == null){
            return redirect()->route('marca.index')->with('alerta',['tipo'=>'warning','msg'=>'Nenhum registro foi localizado','icon'=>'ban']);
        }
        return view('admin.marca.detalhe')->with('marca',$marca);
    }

    public function pesquisa()
    {
        $marcas = Marca::PesquisarPorNome(request()->get('nome'))->paginate(15);
        return view('admin.marca.index')->with('marcas',$marcas);
    }

    public function atualizar()
    {
        $validacao = Acessorio::validacao(request()->all());

        if($validacao->fails()){
            return redirect()->route('acessorio.edicao',['id'=>request()->get('id')])->withErrors($validacao)->withInput();
        }
        try{
            Acessorio::editar(request());
            return redirect()->route('acessorio.index')->with('alerta',['tipo'=>'success','msg'=>'Cadastrado com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('acessorio.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }

    }
}