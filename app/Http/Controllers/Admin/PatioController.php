<?php


namespace App\Http\Controllers\Admin;


use App\Patio;
use Illuminate\Routing\Controller;

class PatioController extends Controller
{
    public function index()
    {
        $patios = Patio::paginate(15);
        return view('admin.patio.index')->with('patios',$patios);
    }
    public function novo()
    {
        return view('admin.patio.novo');
    }
    public function cadastrar()
    {
        $validacao = Patio::validacao(request()->all());
        if($validacao->fails()){
            return redirect()->route('patio.novo')->withErrors($validacao)->withInput();
        }
        try{
            Patio::cadastrar(request());
            return redirect()->route('patio.index')->with('alerta',['tipo'=>'success','msg'=>'Cadastrado com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('patio.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }
    }
    public function editar($id)
    {
        $patio = Patio::find($id);
        if($patio == null){
            return redirect()->route('patio.index')->with('alerta',['tipo'=>'warning','msg'=>'Nenhum registro foi localizado','icon'=>'ban']);
        }
        return view('admin.patio.edicao')->with('patio',$patio);
    }
    public function atualizar()
    {
        $validacao = Patio::validacao(request()->all());
        if($validacao->fails()){
            return redirect()->route('patio.editar',['id'=>request()->get('id')])->withErrors($validacao)->withInput();
        }
        try{
            Patio::editar(request());
            return redirect()->route('patio.index')->with('alerta',['tipo'=>'success','msg'=>'Editado com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('patio.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }
    }
    public function excluir(){

        try{
            Patio::excluir(request());
            return redirect()->route('patio.index')->with('alerta',['tipo'=>'success','msg'=>'Excluido com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('patio.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }
    }

    public function detalhes($id)
    {
        $patio = Patio::find($id);
        if($patio == null){
            return redirect()->route('patio.index')->with('alerta',['tipo'=>'warning','msg'=>'Nenhum registro foi localizado','icon'=>'ban']);
        }
        return view('admin.patio.detalhe')->with('patio',$patio);
    }

    public function pesquisa()
    {
        $patios = Patio::PesquisarPorNome(request()->get('nome'))->paginate(15);

        return view('admin.patio.index')->with('patios',$patios);
    }

}