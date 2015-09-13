<?php
namespace App\Http\Controllers\Admin;

use App\Usuario;
use Illuminate\Routing\Controller;

/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 05/09/2015
 * Time: 00:54
 */


class UsuarioController extends Controller
{
    var $dados = [
        'titulo'    =>  'Usuario',
        'pagina'    =>  'Usuarios',
        'descricao' =>  'Gerenciamento dos usuarios do sistema',
        'caminho'   =>  [
                        ['titulo' => 'dashboard', 'url' => 'admin/dashboard'],
                        ['titulo' => 'usuarios',  'url' => 'admin/usuario']
                        ]
    ];


    public function index(){
        $usuarios = Usuario::paginate(15);
        return view('admin.usuario.index')->with('usuarios',$usuarios);
    }
    public function novo(){
        return \View::make('admin.usuario.novo');
    }
    public function cadastrar(){

        $validacao = \Validator::make(request()->all(),Usuario::$restricao, Usuario::$mensagem);

        if($validacao->fails()){
            return redirect()->route('usuario.novo')->withErrors($validacao)->withInput();
        }


        try{
            Usuario::cadastrar(request());

            return redirect()->route('usuario.index')->with('alerta',['tipo'=>'success','msg'=>'Cadastrado com sucesso.','icon'=>'check']);


        }catch (\Exception $e){
            return redirect()->route('usuario.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }

//        $validacao = \Validator::make(\Request::all(),$rules,$messages);
//        if($validacao->fails()){
//            return redirect()->route('usuario.novo')->withErrors($validacao)->withInput();
//        }

    }
    public function editar($id){
        $usuario = Usuario::find($id);
        if($usuario == null){
            return redirect()->route('usuario.index')->with('alerta',['tipo'=>'warning','msg'=>'Nenhum registro foi localizado','icon'=>'ban']);
        }
        return view('admin.usuario.edicao')->with('usuario',$usuario);
    }
    public function atualizar(){
        try {
            Usuario::atualizar(request());
            return redirect()->route('usuario.index')->with('alerta',['tipo'=>'success','msg'=>'Editado com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('usuario.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }
    }
    public function excluir(){

        try{
            Usuario::excluir(request());
            return redirect()->route('usuario.index')->with('alerta',['tipo'=>'success','msg'=>'Excluido com sucesso.','icon'=>'check']);
        }catch (\Exception $e){
            return redirect()->route('usuario.index')->with('alerta',['tipo'=>'danger','msg'=>$e->getMessage(),'icon'=>'ban']);
        }
    }

    public function detalhes($id)
    {
        $usuario = Usuario::find($id);
        if($usuario == null){
            return redirect()->route('usuario.index')->with('alerta',['tipo'=>'warning','msg'=>'Nenhum registro foi localizado','icon'=>'ban']);
        }
        return view('admin.usuario.detalhe')->with('usuario',$usuario);
    }

    public function pesquisa()
    {
        $usuario = Usuario::pesquisar(request())->paginate(15);

        return view('admin.usuario.index')->with('usuarios',$usuario);
    }

}