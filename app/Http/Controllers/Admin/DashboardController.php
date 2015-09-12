<?php


namespace App\Http\Controllers\Admin;


use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    /*var $dados = [
        'titulo'    =>  'Usuario',
        'pagina'    =>  'Usuarios',
        'descricao' =>  'Gerenciamento dos usuarios do sistema',
        'caminho'   =>  [
            ['titulo' => 'dashboard', 'url' => 'admin/dashboard'],
            ['titulo' => 'usuarios',  'url' => 'admin/usuario']
        ]
    ];*/


    public function index(){
        return view('admin.dashboard');
    }
}