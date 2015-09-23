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



Route::get('entrar','Auth\AcessoController@getEntrar');
Route::post('entrar','Auth\AcessoController@postEntrar');

Route::get('teste',function(){
    return \App\StatusReparos::all();
});
//Route::group(['middleware'=>'auth','prefix'=>'admin'],function(){
Route::group(['prefix'=>'admin'],function(){


    Route::get('dashboard',['as'=>'dashboard','uses'=>'Admin\DashboardController@index']);
    Route::get('sair',['as'=>'sair','uses'=>'Auth\AcessoController@sair']);

//    Rotas Configuracao
    Route::get('configuracao',   ['as'=>'conf.edicao','uses'=>'Admin\ConfiguracaoController@editar']);
    Route::post('configuracao',   ['as'=>'conf.atualizar','uses'=>'Admin\ConfiguracaoController@atualizar']);

//    Rotas Usuario
    Route::get('usuario',   ['as'=>'usuario.index','uses'=>'Admin\UsuarioController@index']);
    Route::get('usuario/novo',   ['as'=>'usuario.novo','uses'=>'Admin\UsuarioController@novo']);
    Route::post('usuario/cadastrar',   ['as'=>'usuario.cadastrar','uses'=>'Admin\UsuarioController@cadastrar']);
    Route::get('usuario/editar/{id}',   ['as'=>'usuario.editar','uses'=>'Admin\UsuarioController@editar']);
    Route::post('usuario/atualizar',   ['as'=>'usuario.atualizar','uses'=>'Admin\UsuarioController@atualizar']);
    Route::post('usuario/excluir',   ['as'=>'usuario.excluir','uses'=>'Admin\UsuarioController@excluir']);
    Route::get('usuario/detalhes/{id}', ['as'=>'usuario.detalhes','uses'=>'Admin\UsuarioController@detalhes']);
    Route::post('usuario', ['as'=>'usuario.pesquisa','uses'=>'Admin\UsuarioController@pesquisa']);

//    Rotas Grupo
    Route::get('grupo',['as'=>'grupo.index','uses'=>'Admin\GrupoController@index']);
    Route::get('grupo/novo',['as'=>'grupo.novo','uses'=>'Admin\GrupoController@novo']);
    Route::post('grupo/cadastrar',['as'=>'grupo.cadastrar','uses'=>'Admin\GrupoController@cadastrar']);
    Route::get('grupo/editar/{id}',['as'=>'grupo.editar','uses'=>'Admin\GrupoController@editar']);
    Route::post('grupo/atualizar',['as'=>'grupo.atualizar','uses'=>'Admin\GrupoController@atualizar']);
    Route::post('grupo/excluir',['as'=>'grupo.excluir','uses'=>'Admin\GrupoController@excluir']);
    Route::get('grupo/detalhes/{id}',['as'=>'grupo.detalhes','uses'=>'Admin\GrupoController@detalhes']);
    Route::post('grupo',['as'=>'grupo.pesquisa','uses'=>'Admin\GrupoController@pesquisa']);

//    Rotas Classes
    Route::get('classe',['as'=>'classe.index','uses'=>'Admin\ClasseController@index']);
    Route::get('classe/novo',['as'=>'classe.novo','uses'=>'Admin\ClasseController@novo']);
    Route::post('classe/cadastrar',['as'=>'classe.cadastrar','uses'=>'Admin\ClasseController@cadastrar']);
    Route::get('classe/editar/{id}',['as'=>'classe.editar','uses'=>'Admin\ClasseController@editar']);
    Route::post('classe/excluir',['as'=>'classe.excluir','uses'=>'Admin\ClasseController@excluir']);
    Route::get('classe/detalhes/{id}',['as'=>'classe.detalhes','uses'=>'Admin\ClasseController@detalhes']);
    Route::post('classe/atualizar',['as'=>'classe.atualizar','uses'=>'Admin\ClasseController@atualizar']);
    Route::post('classe',['as'=>'classe.pesquisa','uses'=>'Admin\ClasseController@pesquisa']);

//    Rotas Patios
    Route::get('patio',['as' => 'patio.index','uses' => 'Admin\PatioController@index']);
    Route::get('patio/novo',['as' => 'patio.novo','uses' => 'Admin\PatioController@novo']);
    Route::get('patio/editar/{id}',['as' => 'patio.editar','uses' => 'Admin\PatioController@editar']);
    Route::get('patio/detalhes/{id}',['as' => 'patio.detalhes','uses' => 'Admin\PatioController@detalhes']);
    Route::get('patio/pesquisaajax/{nome}',['as' => 'patio.pesquisaajax','uses' => 'Admin\PatioController@pesquisaajax']);
    Route::post('patio',['as' => 'patio.pesquisa','uses' => 'Admin\PatioController@pesquisa']);
    Route::post('patio/atualizar',['as' => 'patio.atualizar','uses' => 'Admin\PatioController@atualizar']);
    Route::post('patio/cadastrar',['as' => 'patio.cadastrar','uses' => 'Admin\PatioController@cadastrar']);
    Route::post('patio/excluir',['as' => 'patio.excluir','uses' => 'Admin\PatioController@excluir']);

//    Rotas Marcas
    Route::get('marca',['as' => 'marca.index','uses' => 'Admin\MarcaController@index']);
    Route::get('marca/novo',['as' => 'marca.novo','uses' => 'Admin\MarcaController@novo']);
    Route::get('marca/editar/{id}',['as' => 'marca.editar','uses' => 'Admin\MarcaController@editar']);
    Route::get('marca/detalhes/{id}',['as' => 'marca.detalhes','uses' => 'Admin\MarcaController@detalhes']);
    Route::post('marca',['as' => 'marca.pesquisa','uses' => 'Admin\MarcaController@pesquisa']);
    Route::post('marca/atualizar',['as' => 'marca.atualizar','uses' => 'Admin\MarcaController@atualizar']);
    Route::post('marca/cadastrar',['as' => 'marca.cadastrar','uses' => 'Admin\MarcaController@cadastrar']);
    Route::post('marca/excluir',['as' => 'marca.excluir','uses' => 'Admin\MarcaController@excluir']);

//    Rotas Modelos
    Route::get('modelo',['as' => 'modelo.index','uses' => 'Admin\ModeloController@index']);
    Route::get('modelo/novo',['as' => 'modelo.novo','uses' => 'Admin\ModeloController@novo']);
    Route::get('modelo/editar/{id}',['as' => 'modelo.editar','uses' => 'Admin\ModeloController@editar']);
    Route::get('modelo/detalhes/{id}',['as' => 'modelo.detalhes','uses' => 'Admin\ModeloController@detalhes']);
    Route::post('modelo',['as' => 'modelo.pesquisa','uses' => 'Admin\ModeloController@pesquisa']);
    Route::post('modelo/atualizar',['as' => 'modelo.atualizar','uses' => 'Admin\ModeloController@atualizar']);
    Route::post('modelo/cadastrar',['as' => 'modelo.cadastrar','uses' => 'Admin\ModeloController@cadastrar']);
    Route::post('modelo/excluir',['as' => 'modelo.excluir','uses' => 'Admin\ModeloController@excluir']);

    //    Rotas Veiculos
    Route::get('veiculo',['as' => 'veiculo.index','uses' => 'Admin\VeiculoController@index']);
    Route::get('veiculo/novo',['as' => 'veiculo.novo','uses' => 'Admin\VeiculoController@novo']);
    Route::get('veiculo/editar/{id}',['as' => 'veiculo.editar','uses' => 'Admin\VeiculoController@editar']);
    Route::get('veiculo/detalhes/{id}',['as' => 'veiculo.detalhes','uses' => 'Admin\VeiculoController@detalhes']);
    Route::post('veiculo',['as' => 'veiculo.pesquisa','uses' => 'Admin\VeiculoController@pesquisa']);
    Route::post('veiculo/atualizar',['as' => 'veiculo.atualizar','uses' => 'Admin\VeiculoController@atualizar']);
    Route::post('veiculo/cadastrar',['as' => 'veiculo.cadastrar','uses' => 'Admin\VeiculoController@cadastrar']);
    Route::post('veiculo/excluir',['as' => 'veiculo.excluir','uses' => 'Admin\VeiculoController@excluir']);
    Route::post('veiculo/adicionarpatio',['as' => 'veiculo.adicionarpatio','uses' => 'Admin\VeiculoController@adicionarPatio']);
    Route::post('veiculo/removerpatio',['as' => 'veiculo.removerpatio','uses' => 'Admin\VeiculoController@removerPatio']);

    View::composer(['admin.usuario.includes.formulario','admin.usuario.index'],function($view) {
        $grupos = \App\Grupo::all();
        $dados = [];

        foreach($grupos as $g){
            $dados[$g->id] = $g->nome;
        }
        $view->with('grupos',$dados);
    });
    View::composer(['admin.modelo.includes.formulario'],function($view) {
        $marcas    =   \App\Marca::all();
        $dados = [];

        foreach($marcas as $g){
            $dados[$g->id] = $g->nome;
        }
        $view->with('marcas',$dados);
    });
    View::composer(['admin.veiculo.includes.formulario','admin.veiculo.index'],function($view) {
        $modelos    =   \App\Modelo::all();
        $dados = [];

        foreach($modelos as $g){
            $dados[$g->id] = $g->nome;
        }
        $view->with('modelos',$dados);
    });
    View::composer(['admin.veiculo.includes.formulario','admin.veiculo.index'],function($view) {
        $classes    =   \App\Classe::all();
        $dados = [];

        foreach($classes as $g){
            $dados[$g->id] = $g->nome;
        }
        $view->with('classes',$dados);
    });
    View::composer(['admin.veiculo.includes.formulario','admin.veiculo.index'],function($view) {
        $patios    =   \App\Patio::all();
        $dados = [];

        foreach($patios as $g){
            $dados[$g->id] = $g->nome;
        }
        $view->with('patios',$dados);
    });
    View::composer(['admin.configuracao.includes.formulario','admin.veiculo.index'],function($view) {
        $statusVeiculos    =   \App\StatusVeiculo::all();
        $dados = [];

        foreach($statusVeiculos as $r){
            $dados[$r->id] = $r->nome;
        }
        $view->with('statusVeiculos',$dados);
    });
    View::composer(['admin.configuracao.includes.formulario'],function($view) {
        $statusReparos    =   \App\StatusReparos::all();
        $dados = [];

        foreach($statusReparos as $r){
            $dados[$r->id] = $r->nome;
        }
        $view->with('statusReparos',$dados);
    });
});

