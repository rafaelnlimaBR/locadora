<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 19/09/2015
 * Time: 18:49
 */

namespace App\Http\Controllers\Admin;


use App\Marca;
use Illuminate\Routing\Controller;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas  =   Marca::paginate(15);
        return view('admin.marca.index')->with('marcas',$marcas);
    }

    public function novo()
    {
        return view('admin.marca.novo');
    }

    public static function cadastrar()
    {
        $validacao = Marca::validacao(request()->all());

        if($validacao->fails()){
            return redirect()->route('marca.novo')->withErrors($validacao)->withInput();
        }
        try{
            Marca::cadastrar(request());
            return redirect()->route('marca.index')->with('alerta',['tipo'=>'success','msg'=>'Cadastrado com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('marca.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }
    }

    public function editar($id)
    {
        $marca = Marca::find($id);
        if($marca == null){
            return redirect()->route('marca.index')->with('alerta',['tipo'=>'warning','msg'=>'Nenhum registro foi localizado','icon'=>'ban']);
        }
        return view('admin.marca.edicao')->with('marca',$marca);
    }

    public function excluir()
    {
        try{
            Marca::excluir(request());
            return redirect()->route('marca.index')->with('alerta',['tipo'=>'success','msg'=>'Excluido com sucesso','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('marca.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);;
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
        $validacao = Marca::validacao(request()->all());

        if($validacao->fails()){
            return redirect()->route('marca.edicao',['id'=>request()->get('id')])->withErrors($validacao)->withInput();
        }
        try{
            Marca::editar(request());
            return redirect()->route('marca.index')->with('alerta',['tipo'=>'success','msg'=>'Cadastrado com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('marca.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }

    }
}