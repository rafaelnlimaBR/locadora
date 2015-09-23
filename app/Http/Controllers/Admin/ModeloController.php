<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 20/09/2015
 * Time: 00:27
 */

namespace App\Http\Controllers\Admin;


use App\Modelo;
use Illuminate\Routing\Controller;

class ModeloController extends Controller
{
    public function index()
    {
        $modelos  =   Modelo::paginate(15);
        return view('admin.modelo.index')->with('modelos',$modelos);
    }

    public function novo()
    {
        return view('admin.modelo.novo');
    }

    public static function cadastrar()
    {
        $validacao = Modelo::validacao(request()->all());

        if($validacao->fails()){
            return redirect()->route('modelo.novo')->withErrors($validacao)->withInput();
        }
        try{
            Modelo::cadastrar(request());
            return redirect()->route('modelo.index')->with('alerta',['tipo'=>'success','msg'=>'Cadastrado com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('modelo.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }
    }

    public function editar($id)
    {
        $modelo = Modelo::find($id);
        if($modelo == null){
            return redirect()->route('modelo.index')->with('alerta',['tipo'=>'warning','msg'=>'Nenhum registro foi localizado','icon'=>'ban']);
        }
        return view('admin.modelo.edicao')->with('modelo',$modelo);
    }

    public function excluir()
    {
        try{
            Modelo::excluir(request());
            return redirect()->route('modelo.index')->with('alerta',['tipo'=>'success','msg'=>'Excluido com sucesso','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('modelo.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);;
        }


    }

    public function detalhes($id)
    {
        $modelo = Modelo::find($id);
        if($modelo == null){
            return redirect()->route('modelo.index')->with('alerta',['tipo'=>'warning','msg'=>'Nenhum registro foi localizado','icon'=>'ban']);
        }
        return view('admin.modelo.detalhe')->with('modelo',$modelo);
    }

    public function pesquisa()
    {
        $modelos = Modelo::PesquisarPorNome(request()->get('nome'))->paginate(15);
        return view('admin.modelo.index')->with('modelos',$modelos);
    }

    public function atualizar()
    {
        $validacao = Modelo::validacao(request()->all());

        if($validacao->fails()){
            return redirect()->route('modelo.editar',['id'=>request()->get('id')])->withErrors($validacao)->withInput();
        }
        try{
            Modelo::editar(request());
            return redirect()->route('modelo.index')->with('alerta',['tipo'=>'success','msg'=>'Editado com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('modelo.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }
    }

}