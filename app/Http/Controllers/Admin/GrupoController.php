<?php
namespace App\Http\Controllers\Admin;

use App\Grupo;
use Illuminate\Routing\Controller;
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 05/09/2015
 * Time: 00:55
 */


class GrupoController extends Controller
{
    public function index(){
        $grupos = Grupo::paginate(15);
        return view('admin.grupo.index')->with('grupos',$grupos);
    }
    public function novo(){
        return view('admin.grupo.novo');
    }
    public function cadastrar(){
        $validacao = Grupo::validacao(request()->all());

        if($validacao->fails()){
            return redirect()->route('grupo.novo')->withErrors($validacao)->withInput();
        }

        try{

            Grupo::cadastrar(request());
            return redirect()->route('grupo.index')->with('alerta',['tipo'=>'success','msg'=>'Cadastrado com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('grupo.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }
    }
    public function editar($id){
        $grupo = Grupo::find($id);
        if($grupo == null){
            return redirect()->route('grupo.index')->with('alerta',['tipo'=>'warning','msg'=>'Nenhum registro foi localizado','icon'=>'ban']);
        }
        return view('admin.grupo.edicao')->with('grupo',$grupo);
    }
    public function atualizar(){
        $validacao = Grupo::validacao(request()->all());

        if($validacao->fails()){
            return redirect()->route('grupo.novo',['id'=>request()->get('id')])->withErrors($validacao)->withInput();
        }
        try{

            Grupo::editar(request());
            return redirect()->route('grupo.index');
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }
    public function excluir(){
        try{
            Grupo::excluir(request());
            return redirect()->route('grupo.index')->with('alerta',['tipo'=>'success','msg'=>'Excluido com sucesso','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('grupo.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);;
        }

    }

    public function detalhes($id)
    {
        $grupo = Grupo::find($id);

        if($grupo == null){
            return redirect()->route('grupo.index')->with('alerta',['tipo'=>'warning','msg'=>'Nenhum registro foi localizado','icon'=>'ban']);
        }
        return view('admin.grupo.detalhe')->with('grupo',$grupo);
    }

    public function pesquisa()
    {
        $grupos = Grupo::pesquisar(request())->paginate(15);
        return view('admin.grupo.index')->with('grupos',$grupos);
    }
}