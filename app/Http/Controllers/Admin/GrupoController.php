<?php
namespace App\Http\Controllers\Admin;

use App\Grupo;
use Illuminate\Routing\Controller;
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 05/09/2015
 * Time: 00:55
 */


class GrupoController extends Controller
{
    public function index(){
        $grupos = Grupo::paginate(15);
        return \View::make('admin.grupo.index')->with('grupos',$grupos);
    }
    public function novo(){

    }
    public function cadastrar(){

    }
    public function editar($id){

    }
    public function atualizar(){

    }
    public function excluir($id){

    }
}