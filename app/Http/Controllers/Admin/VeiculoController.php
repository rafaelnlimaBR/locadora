<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 20/09/2015
 * Time: 01:02
 */

namespace App\Http\Controllers\Admin;


use App\Configuracao;
use App\Veiculo;
use Illuminate\Routing\Controller;

class VeiculoController extends Controller
{
    public function index()
    {
        $veiculo  =   Veiculo::paginate(15);
        return view('admin.veiculo.index')->with('veiculos',$veiculo);
    }

    public function novo()
    {
        return view('admin.veiculo.novo');
    }

    public static function cadastrar()
    {
        $validacao  =   Veiculo::validacao(request()->all());

        if($validacao->fails()){
            return redirect()->route('veiculo.novo')->withErrors($validacao)->withInput();
        }
        try{
            $id     =   Veiculo::cadastrar(request());

            return redirect()->route('veiculo.index',['id'=>$id])->with('alerta',['tipo'=>'success','msg'=>'Cadastrado com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('veiculo.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }
    }

    public function editar($id)
    {
        $veiculo    =   Veiculo::find($id);

        if($veiculo == null){
            return redirect()->route('veiculo.index')->with('alerta',['tipo'=>'warning','msg'=>'Nenhum registro foi localizado','icon'=>'ban']);
        }

        return view('admin.veiculo.edicao')->with('veiculo',$veiculo);
    }

    public function excluir()
    {
        try{
            Veiculo::excluir(request());
            return redirect()->route('veiculo.index')->with('alerta',['tipo'=>'success','msg'=>'Excluido com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('veiculo.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }
        

    }

    public function detalhes($id)
    {
        $veiculo    =   Veiculo::find($id);

        if($veiculo == null){
            return redirect()->route('veiculo.index')->with('alerta',['tipo'=>'warning','msg'=>'Nenhum registro foi localizado','icon'=>'ban']);
        }

        return view('admin.veiculo.detalhe')->with('veiculo',$veiculo);
    }

    public function pesquisa()
    {
        $veiculos   =   Veiculo::pesquisar(request())->paginate(15);

        return view('admin.veiculo.index')->with('veiculos',$veiculos);
    }

    public function atualizar()
    {
        $validacao  =   Veiculo::validacao(request()->all());

        if($validacao->fails()){
            return redirect()->route('veiculo.edicao',['id'=>request()->get('id')])->withErrors($validacao)->withInput();
        }
        try{
            Veiculo::editar(request());

            return redirect()->route('veiculo.index')->with('alerta',['tipo'=>'success','msg'=>'Cadastrado com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('veiculo.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }

    }



    public function pesquisaajax($id)
    {
        if(request()->ajax() == true){
            return response()->json(Veiculo::PesquisarPlaca($id)->PesquisarStatus(Configuracao::getConf()->veiculo_disponivel)->get());
        }else{
            return redirect()->route('dashboard');
        }
    }

    public function indisponibilizar()
    {
        try{
            Veiculo::indisponibilizar(request());

            return redirect()->route('veiculo.index')->with('alerta',['tipo'=>'success','msg'=>'Alterado com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('veiculo.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }
    }

    public function disponivel()
    {
        try{
            Veiculo::disponibilizar(request());

            return redirect()->route('veiculo.index')->with('alerta',['tipo'=>'success','msg'=>'Alterado com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('veiculo.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }
    }
}