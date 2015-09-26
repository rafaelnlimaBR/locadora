<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 23/09/2015
 * Time: 22:16
 */

namespace App\Http\Controllers\Admin;


use App\Oficina;
use Illuminate\Routing\Controller;

class OficinaController extends Controller
{

    public function index()
    {
        $oficinas   =   Oficina::paginate(15);

        return view('admin.oficina.index')->with('oficinas',$oficinas);
    }

    public function novo()
    {
        return view('admin.oficina.novo');
    }

    public function cadastrar()
    {
        $validacao  =   Oficina::validacao(request()->all());

        if($validacao->fails()){
            return redirect()->route('oficina.novo')->withErrors($validacao)->withInput();
        }

        try{

            Oficina::cadastrar(request());

            return redirect()->route('oficina.index')->with('alerta',['tipo'=>'success','msg'=>'Cadastrado com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('oficina.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }
    }

    public function editar($id)
    {
        $oficina    =   Oficina::find($id);

        if($oficina == null){
            return redirect()->route('oficina.index')->with('alerta',['tipo'=>'warning','msg'=>'Nenhum registro foi localizado','icon'=>'ban']);
        }

        return view('admin.oficina.edicao')->with('oficina',$oficina);
    }

    public function atualizar()
    {
        $validacao  =   Oficina::validacao(request()->all());

        if($validacao->fails()){
            return redirect()->route('oficina.edicao')->withErrors($validacao)->withInput();
        }

        try{

            Oficina::editar(request());

            return redirect()->route('oficina.index')->with('alerta',['tipo'=>'success','msg'=>'Editado com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('oficina.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }
    }

    public function excluir()
    {
        try{

            Oficina::excluir(request());
            return redirect()->route('oficina.index')->with('alerta',['tipo'=>'success','msg'=>'Excluido com sucesso','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('oficina.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);;
        }
    }

    public function detalhes($id)
    {
        $oficina    =   Oficina::find($id);

        if($oficina == null){
            return redirect()->route('oficina.index')->with('alerta',['tipo'=>'warning','msg'=>'Nenhum registro foi localizado','icon'=>'ban']);
        }

        return view('admin.oficina.detalhe')->with('oficina',$oficina);
    }

    public function pesquisa()
    {
        $oficina    =   Oficina::PesquisarPorNome(request()->get('nome'))->paginate(15);
        return view('admin.oficina.index')->with('oficinas',$oficina);
    }

    public function pesquisaajax($id)
    {
        if(request()->ajax() == true){
            return response()->json(Oficina::PesquisarPorNome($id)->get());
        }else{
            return redirect()->route('dashboard');
        }
    }
}