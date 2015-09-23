<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 17/09/2015
 * Time: 18:26
 */

namespace App\Http\Controllers\Admin;

use App\Classe;
use Illuminate\Routing\Controller;

class ClasseController extends Controller
{
    public function index()
    {
        $classes = Classe::paginate(15);

        return view('admin.classe.index')->with('classes',$classes);
    }

    public function novo()
    {
        return view('admin.classe.novo');
    }

    public static function cadastrar()
    {
        $validacao = Classe::validacao(request()->all());
        if($validacao->fails()){
            return redirect()->route('classe.novo')->withErrors($validacao)->withInput();
        }
        try{
            Classe::cadastrar(request());
            return redirect()->route('classe.index')->with('alerta',['tipo'=>'success','msg'=>'Cadastrado com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('classe.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }
    }

    public function editar($id)
    {
        $classe = Classe::find($id);

        if($classe == null){
            return redirect()->route('classe.index')->with('alerta',['tipo'=>'warning','msg'=>'Nenhum registro foi localizado','icon'=>'ban']);
        }
        return view('admin.classe.edicao')->with('classe',$classe);
    }

    public function excluir()
    {

        try{
            Classe::excluir(request());
            return redirect()->route('classe.index')->with('alerta',['tipo'=>'success','msg'=>'Excluido com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('classe.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }

    }

    public function detalhes($id)
    {
        $classe = Classe::find($id);

        return view('admin.classe.detalhe')->with('classe',$classe);
    }

    public function pesquisa()
    {
        $classes = Classe::pesquisarPorNome(request()->get('nome'))->paginate(15);
        return view('admin.classe.index')->with('classes',$classes);
    }

    public function atualizar()
    {
        $validacao = Classe::validacao(request()->all());
        if($validacao->fails()){
            return redirect()->route('classe.editar',['id'=>request()->get('id')])->withErrors($validacao)->withInput();
        }
        try{

            Classe::editar(request());
            return redirect()->route('classe.index')->with('alerta',['tipo'=>'success','msg'=>'Editado com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('classe.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }
    }
}