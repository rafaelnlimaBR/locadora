<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('teste', function () {
    return \App\Grupo::admin()->id;
});


Route::get('entrar','Auth\AcessoController@getEntrar');
Route::post('entrar','Auth\AcessoController@postEntrar');


//Route::group(['middleware'=>'auth','prefix'=>'admin'],function(){
Route::group(['prefix'=>'admin'],function(){

//    Route::controller('dashboard','Admin\DashboardController');

    Route::get('dashboard',['as'=>'dashboard','uses'=>'Admin\DashboardController@index']);
    Route::get('sair',['as'=>'sair','uses'=>'Auth\AcessoController@sair']);

//    Rotas Usuario
    Route::get('usuario',   ['as'=>'usuario.index','uses'=>'Admin\UsuarioController@index']);
    Route::get('usuario/novo',   ['as'=>'usuario.novo','uses'=>'Admin\UsuarioController@novo']);
    Route::post('usuario/cadastrar',   ['as'=>'usuario.cadastrar','uses'=>'Admin\UsuarioController@cadastrar']);
    Route::get('usuario/editar/{id}',   ['as'=>'usuario.editar','uses'=>'Admin\UsuarioController@editar']);
    Route::post('usuario/atualizar',   ['as'=>'usuario.atualizar','uses'=>'Admin\UsuarioController@atualizar']);
    Route::post('usuario/excluir',   ['as'=>'usuario.excluir','uses'=>'Admin\UsuarioController@excluir']);
    Route::get('usuario/detalhes/{id}', ['as'=>'usuario.detalhes','uses'=>'Admin\UsuarioController@detalhes']);

//    Rotas Grupo
    Route::get('grupo',['as'=>'grupo.index','uses'=>'Admin\GrupoController@index']);
    Route::get('grupo/novo',['as'=>'grupo.novo','uses'=>'Admin\GrupoController@novo']);
    Route::post('grupo/cadastrar',['as'=>'grupo.cadastrar','uses'=>'Admin\GrupoController@cadastrar']);
    Route::get('grupo/editar/{id}',['as'=>'grupo.editar','uses'=>'Admin\GrupoController@editar']);
    Route::post('grupo/atualizar',['as'=>'grupo.atualizar','uses'=>'Admin\GrupoController@atualizar']);
    Route::post('grupo/excluir',['as'=>'grupo.excluir','uses'=>'Admin\GrupoController@excluir']);

    View::composer(['admin.usuario.includes.formulario','admin.usuario.index'],function($view) {
        $grupos = \App\Grupo::all();
        $dados = [];

        foreach($grupos as $g){
            $dados[$g->id] = $g->nome;
        }
        $view->with('grupos',$dados);
    });
});

