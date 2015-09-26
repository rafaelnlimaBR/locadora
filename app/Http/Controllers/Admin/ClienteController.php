<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 25/09/2015
 * Time: 15:00
 */

namespace App\Http\Controllers\Admin;


use App\Cliente;
use Illuminate\Routing\Controller;

class ClienteController extends Controller
{
    public function index(){
        $clientes = Cliente::paginate(15);
        return view('admin.cliente.index')->with('clientes',$clientes);
    }
    public function novo(){
        return \View::make('admin.cliente.novo');
    }
    public function cadastrar(){

        $validacao = Cliente::validacao(request()->all());

        if($validacao->fails()){
            return redirect()->route('cliente.novo')->withErrors($validacao)->withInput();
        }


        try{
            Cliente::cadastrar(request());

            return redirect()->route('cliente.index')->with('alerta',['tipo'=>'success','msg'=>'Cadastrado com sucesso.','icon'=>'check']);


        }catch (\Exception $e){
            return redirect()->route('cliente.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }

    }
    public function editar($id){
        $cliente = Cliente::find($id);
        if($cliente == null){
            return redirect()->route('cliente.index')->with('alerta',['tipo'=>'warning','msg'=>'Nenhum registro foi localizado','icon'=>'ban']);
        }
        return view('admin.cliente.edicao')->with('cliente',$cliente);
    }
    public function atualizar(){
        $validacao = Cliente::validacao(request()->all());

        if($validacao->fails()){
            return redirect()->route('cliente.editar',['id'=>request()->get('id')])->withErrors($validacao)->withInput();
        }

        try {
            Cliente::atualizar(request());
            return redirect()->route('cliente.index')->with('alerta',['tipo'=>'success','msg'=>'Editado com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('cliente.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }
    }
    public function excluir(){

        try{
            Cliente::excluir(request());
            return redirect()->route('cliente.index')->with('alerta',['tipo'=>'success','msg'=>'Excluido com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('cliente.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }
    }

    public function detalhes($id)
    {
        $cliente = Cliente::find($id);
        if($cliente == null){
            return redirect()->route('cliente.index')->with('alerta',['tipo'=>'warning','msg'=>'Nenhum registro foi localizado','icon'=>'ban']);
        }
        return view('admin.cliente.detalhe')->with('cliente',$cliente);
    }

    public function pesquisa()
    {
        $cliente = Cliente::pesquisar(request())->paginate(15);

        return view('admin.cliente.index')->with('clientes',$cliente);
    }

    public function pesquisaAjax($id)
    {


        if(request()->ajax()) {
            $cliente = Cliente::pesquisaAjax($id);

            return response()->json($cliente);
        }else{
            return redirect()->route('dashboard')->with('alerta',['tipo'=>'warning','msg'=>'Acesso negado.','icon'=>'ban']);
        }
    }
}