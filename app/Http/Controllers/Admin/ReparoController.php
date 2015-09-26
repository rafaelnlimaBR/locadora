<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 23/09/2015
 * Time: 00:56
 */

namespace App\Http\Controllers\Admin;


use App\Reparo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ReparoController extends Controller
{

    public function index()
    {
        $reparos = Reparo::paginate(15);
        return view('admin.reparo.index')->with('reparos',$reparos);
    }
    public function novo()
    {
        return view('admin.reparo.novo');
    }
    public function cadastrar()
    {
        $validacao = Reparo::validacao(request()->all());
        if($validacao->fails()){
            return redirect()->route('reparo.novo')->withErrors($validacao)->withInput();
        }
        try{
            Reparo::cadastrar(request());
            return redirect()->route('reparo.index')->with('alerta',['tipo'=>'success','msg'=>'Cadastrado com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('reparo.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }
    }
    public function editar($id)
    {
        $reparo = Reparo::find($id);
        if($reparo == null){
            return redirect()->route('reparo.index')->with('alerta',['tipo'=>'warning','msg'=>'Nenhum registro foi localizado','icon'=>'ban']);
        }
        return view('admin.reparo.edicao')->with('reparo',$reparo);
    }
    public function atualizar()
    {
        $validacao = Reparo::validacao(request()->all());
        if($validacao->fails()){
            return redirect()->route('reparo.editar',['id'=>request()->get('id')])->withErrors($validacao)->withInput();
        }
        try{
            Reparo::editar(request());
            return redirect()->route('reparo.index')->with('alerta',['tipo'=>'success','msg'=>'Editado com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('reparo.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }
    }
    public function excluir(){

        try{
            Reparo::excluir(request());
            return redirect()->route('reparo.index')->with('alerta',['tipo'=>'success','msg'=>'Excluido com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('reparo.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }
    }

    public function detalhes($id)
    {
        $reparo = Reparo::find($id);
        if($reparo == null){
            return redirect()->route('reparo.index')->with('alerta',['tipo'=>'warning','msg'=>'Nenhum registro foi localizado','icon'=>'ban']);
        }
        return view('admin.reparo.detalhe')->with('reparo',$reparo);
    }

    public function cancelar()
    {
        try{
            Reparo::cancelar(request());
            return redirect()->route('reparo.index')->with('alerta',['tipo'=>'success','msg'=>'Status alterado com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('reparo.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }
    }

    public function finalizar()
    {
        try{
            Reparo::finalizar(request());
            return redirect()->route('reparo.index')->with('alerta',['tipo'=>'success','msg'=>'Status alterado com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('reparo.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }
    }

    public function pesquisa()
    {
        $reparo = Reparo::pesquisar(request())->paginate(15);

        return view('admin.reparo.index')->with('reparos',$reparo);
    }

    public function pesquisaAjax($nome)
    {
        return \Response::json(Patio::PesquisarPorNome($nome)->get());
        if(request()->ajax()){
            return Patio::PesquisarPorNome($nome);
        }else{
            return ['error'=>'Sem permissão.'];
        }
    }

}