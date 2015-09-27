<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 26/09/2015
 * Time: 00:13
 */

namespace App\Http\Controllers\Admin;


use App\Contrato;
use App\Veiculo;
use Illuminate\Routing\Controller;

class ContratoController extends Controller
{
    public function index(){
        $contrato = Contrato::paginate(15);
        return view('admin.contrato.index')->with('contratos',$contrato);
    }
    public function novo(){
        return \View::make('admin.contrato.novo');
    }
    public function cadastrar(){



        $validacao = Contrato::validacao(request()->all());

        if($validacao->fails()){
            return redirect()->route('contrato.novo')->withErrors($validacao)->withInput();
        }


        try{
            $id     =   Contrato::cadastrar(request());

            return redirect()->route('contrato.editar',['id'    =>  $id])->with('alerta',['tipo'=>'success','msg'=>'Cadastrado com sucesso.','icon'=>'check']);


        }catch (\Exception $e){
            return redirect()->route('contrato.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }

    }

    public function reserva()
    {
        return view('admin.contrato.reserva');
    }

    public function reservar()
    {
        $validacao = Contrato::validacao(request()->all());

        if($validacao->fails()){
            return redirect()->route('contrato.reserva')->withErrors($validacao)->withInput();
        }


        try{
            $id     =   Contrato::cadastrar(request());

            return redirect()->route('contrato.editar',['id'    =>  $id])->with('alerta',['tipo'=>'success','msg'=>'Cadastrado com sucesso.','icon'=>'check']);


        }catch (\Exception $e){
            return redirect()->route('contrato.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }
    }


    public function locar()
    {
        try{

            Contrato::locar(request());
            return redirect()->route('contrato.index')->with('alerta',['tipo'=>'success','msg'=>'Excluido com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('contrato.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }
    }
    public function editar($id){
        $contrato   =   Contrato::find($id);
        if($contrato == null){
            return redirect()->route('contrato.index')->with('alerta',['tipo'=>'warning','msg'=>'Nenhum registro foi localizado','icon'=>'ban']);
        }
        return view('admin.contrato.edicao')->with('contrato',$contrato);
    }
    public function atualizar(){
        $validacao = Contrato::validacao(request()->all());

        if($validacao->fails()){
            return redirect()->route('contrato.editar',['id'=>request()->get('id')])->withErrors($validacao)->withInput();
        }

        try {
            Contrato::editar(request());
            return redirect()->route('contrato.index')->with('alerta',['tipo'=>'success','msg'=>'Editado com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('contrato.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }
    }
    public function excluir(){


        try{
            Contrato::excluir(request());
            return redirect()->route('contrato.index')->with('alerta',['tipo'=>'success','msg'=>'Excluido com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('contrato.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }
    }

    public function detalhes($id)
    {
        $contrato   =   Contrato::find($id);
        if($contrato == null){
            return redirect()->route('contrato.index')->with('alerta',['tipo'=>'warning','msg'=>'Nenhum registro foi localizado','icon'=>'ban']);
        }
        return view('admin.contrato.detalhe')->with('contrato',$contrato);
    }

    public function pesquisa()
    {
        $cliente = Cliente::pesquisar(request())->paginate(15);

        return view('admin.cliente.index')->with('clientes',$cliente);
    }

    public function cancelar()
    {

        try{

            Contrato::cancelar(request());
            return redirect()->route('contrato.index')->with('alerta',['tipo'=>'success','msg'=>'Cancelado com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('contrato.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }

    }

    public function finalizar()
    {
        try{

            Contrato::finalizar(request());
            return redirect()->route('contrato.index')->with('alerta',['tipo'=>'success','msg'=>'Finalizado com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('contrato.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }

    }



}