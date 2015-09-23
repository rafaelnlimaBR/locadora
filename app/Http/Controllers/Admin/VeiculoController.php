<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 20/09/2015
 * Time: 01:02
 */

namespace App\Http\Controllers\Admin;


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

            return redirect()->route('veiculo.editar',['id'=>$id])->with('alerta',['tipo'=>'success','msg'=>'Cadastrado com sucesso.','icon'=>'check']);
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

    public function adicionarPatio()
    {

        if(request()->ajax() == true){
            try{
                Veiculo::vincularPatio(request());

                $html   =   view('admin.veiculo.includes.patios')->with('veiculo',Veiculo::find(request()->get('veiculo_id')))->render();
                return response()->json(['html'=>$html]);

            }catch (\Exception $e){
                return response()->json(['error'=>$e->getMessage()]);
            }


        }else{
            return response()->json(['error'=>'Sem permissão.']);
        }
    }

    public function removerPatio()
    {

        if(request()->ajax() == true){
            try{
                Veiculo::desvincularPatio(request());

                $html   =   view('admin.veiculo.includes.patios')->with('veiculo',Veiculo::find(request()->get('veiculo_id')))->render();
                return response()->json(['html'=>$html]);

            }catch (\Exception $e){
                return response()->json(['error'=>$e->getMessage()]);
            }


        }else{
            return response()->json(['error'=>'Sem permissão.']);
        }
    }
}