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
//    return \App\Contrato::find(1)->status()->get();
//    return \App\Contrato::find(1)->status()
    dd(\App\Contrato::find(1)->status());
//
//    return \App\Contrato::find(1)->status();

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

//    Rotas Clientes
    Route::get('cliente',   ['as'=>'cliente.index','uses'=>'Admin\ClienteController@index']);
    Route::get('cliente/novo',   ['as'=>'cliente.novo','uses'=>'Admin\ClienteController@novo']);
    Route::post('cliente/cadastrar',   ['as'=>'cliente.cadastrar','uses'=>'Admin\ClienteController@cadastrar']);
    Route::get('cliente/editar/{id}',   ['as'=>'cliente.editar','uses'=>'Admin\ClienteController@editar']);
    Route::post('cliente/atualizar',   ['as'=>'cliente.atualizar','uses'=>'Admin\ClienteController@atualizar']);
    Route::post('cliente/excluir',   ['as'=>'cliente.excluir','uses'=>'Admin\ClienteController@excluir']);
    Route::get('cliente/detalhes/{id}', ['as'=>'cliente.detalhes','uses'=>'Admin\ClienteController@detalhes']);
    Route::post('cliente', ['as'=>'cliente.pesquisa','uses'=>'Admin\ClienteController@pesquisa']);
    Route::get('cliente/pesquisaajax/{nome}',['as' => 'cliente.pesquisaajax','uses' => 'Admin\ClienteController@pesquisaajax']);

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
    Route::get('veiculo/pesquisaajax/{id}',['as' => 'veiculo.pesquisaajax','uses' => 'Admin\VeiculoController@pesquisaajax']);
    Route::post('veiculo',['as' => 'veiculo.pesquisa','uses' => 'Admin\VeiculoController@pesquisa']);
    Route::post('veiculo/indisponibilizar',['as' => 'veiculo.indisponibilizar','uses' => 'Admin\VeiculoController@indisponibilizar']);
    Route::post('veiculo/disponivel',['as' => 'veiculo.disponivel','uses' => 'Admin\VeiculoController@disponivel']);
    Route::post('veiculo/atualizar',['as' => 'veiculo.atualizar','uses' => 'Admin\VeiculoController@atualizar']);
    Route::post('veiculo/cadastrar',['as' => 'veiculo.cadastrar','uses' => 'Admin\VeiculoController@cadastrar']);
    Route::post('veiculo/excluir',['as' => 'veiculo.excluir','uses' => 'Admin\VeiculoController@excluir']);



//    Rotas Oficina
    Route::get('oficina',['as'  =>  'oficina.index','uses'  =>  'Admin\OficinaController@index']);
    Route::get('oficina/novo',['as'  =>  'oficina.novo','uses'  =>  'Admin\OficinaController@novo']);
    Route::post('oficina/cadastrar',['as'  =>  'oficina.cadastrar','uses'  =>  'Admin\OficinaController@cadastrar']);
    Route::post('oficina/atualizar',['as'  =>  'oficina.atualizar','uses'  =>  'Admin\OficinaController@atualizar']);
    Route::post('oficina/excluir',['as'  =>  'oficina.excluir','uses'  =>  'Admin\OficinaController@excluir']);
    Route::post('oficina',['as'  =>  'oficina.pesquisa','uses'  =>  'Admin\OficinaController@pesquisa']);
    Route::get('oficina/editar/{id}',['as'  =>  'oficina.editar','uses'  =>  'Admin\OficinaController@editar']);
    Route::get('oficina/pesquisaajax/{id}',['as'  =>  'oficina.pesquisaajax','uses'  =>  'Admin\OficinaController@pesquisaajax']);
    Route::get('oficina/detalhes/{id}',['as'  =>  'oficina.detalhes','uses'  =>  'Admin\OficinaController@detalhes']);

//    Rotas Reparos
    Route::get('reparo',['as'  =>  'reparo.index','uses'  =>  'Admin\ReparoController@index']);
    Route::get('reparo/novo',['as'  =>  'reparo.novo','uses'  =>  'Admin\ReparoController@novo']);
    Route::post('reparo/cadastrar',['as'  =>  'reparo.cadastrar','uses'  =>  'Admin\ReparoController@cadastrar']);
    Route::post('reparo/atualizar',['as'  =>  'reparo.atualizar','uses'  =>  'Admin\ReparoController@atualizar']);
    Route::post('reparo/excluir',['as'  =>  'reparo.excluir','uses'  =>  'Admin\ReparoController@excluir']);
    Route::post('reparo',['as'  =>  'reparo.pesquisa','uses'  =>  'Admin\ReparoController@pesquisa']);
    Route::post('reparo/cancelar',['as'  =>  'reparo.cancelar','uses'  =>  'Admin\ReparoController@cancelar']);
    Route::post('reparo/finalizar',['as'  =>  'reparo.finalizar','uses'  =>  'Admin\ReparoController@finalizar']);
    Route::get('reparo/editar/{id}',['as'  =>  'reparo.editar','uses'  =>  'Admin\ReparoController@editar']);
    Route::get('reparo/detalhes/{id}',['as'  =>  'reparo.detalhes','uses'  =>  'Admin\ReparoController@detalhes']);

//    Rotas Acessorios
    Route::get('acessorio',['as'  =>  'acessorio.index','uses'  =>  'Admin\AcessorioController@index']);
    Route::get('acessorio/novo',['as'  =>  'acessorio.novo','uses'  =>  'Admin\AcessorioController@novo']);
    Route::post('acessorio/cadastrar',['as'  =>  'acessorio.cadastrar','uses'  =>  'Admin\AcessorioController@cadastrar']);
    Route::post('acessorio/atualizar',['as'  =>  'acessorio.atualizar','uses'  =>  'Admin\AcessorioController@atualizar']);
    Route::post('acessorio/excluir',['as'  =>  'acessorio.excluir','uses'  =>  'Admin\AcessorioController@excluir']);
    Route::post('acessorio',['as'  =>  'acessorio.pesquisa','uses'  =>  'Admin\AcessorioController@pesquisa']);
    Route::post('acessorio/cancelar',['as'  =>  'acessorio.cancelar','uses'  =>  'Admin\AcessorioController@cancelar']);
    Route::post('acessorio/finalizar',['as'  =>  'acessorio.finalizar','uses'  =>  'Admin\AcessorioController@finalizar']);
    Route::get('acessorio/editar/{id}',['as'  =>  'acessorio.editar','uses'  =>  'Admin\AcessorioController@editar']);
    Route::get('acessorio/detalhes/{id}',['as'  =>  'acessorio.detalhes','uses'  =>  'Admin\AcessorioController@detalhes']);

//    Rotas Contrato
    Route::get('contrato',['as'  =>  'contrato.index','uses'  =>  'Admin\ContratoController@index']);
    Route::get('contrato/novo',['as'  =>  'contrato.novo','uses'  =>  'Admin\ContratoController@novo']);
    Route::post('contrato/cadastrar',['as'  =>  'contrato.cadastrar','uses'  =>  'Admin\ContratoController@cadastrar']);
    Route::post('contrato/atualizar',['as'  =>  'contrato.atualizar','uses'  =>  'Admin\ContratoController@atualizar']);
    Route::post('contrato/excluir',['as'  =>  'contrato.excluir','uses'  =>  'Admin\ContratoController@excluir']);
    Route::post('contrato',['as'  =>  'contrato.pesquisa','uses'  =>  'Admin\ContratoController@pesquisa']);
    Route::post('contrato/cancelar',['as'  =>  'contrato.cancelar','uses'  =>  'Admin\ContratoController@cancelar']);
    Route::post('contrato/finalizar',['as'  =>  'contrato.finalizar','uses'  =>  'Admin\ContratoController@finalizar']);
    Route::get('contrato/editar/{id}',['as'  =>  'contrato.editar','uses'  =>  'Admin\ContratoController@editar']);
    Route::get('contrato/detalhes/{id}',['as'  =>  'contrato.detalhes','uses'  =>  'Admin\ContratoController@detalhes']);


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
    View::composer(['admin.veiculo.includes.formulario','admin.veiculo.index','admin.contrato.includes.formulario'],function($view) {
        $patios    =   \App\Patio::all();
        $dados = [];

        foreach($patios as $g){
            $dados[$g->id] = $g->cidade." | ".$g->nome;
        }
        $view->with('patios',$dados);
    });
    View::composer(['admin.contrato.includes.formulario'],function($view) {
        $horarios = [
            '07:00' =>  '07:00',
            '07:30' =>  '07:30',
            '08:00' =>  '08:00',
            '08:30' =>  '08:30',
            '09:00' =>  '09:00',
            '09:30' => '09:30',
            '10:00' => '10:00',
            '10:30' => '10:30',
            '11:00' => '11:00',
            '11:30' => '11:30',
            '12:00' => '12:00',
            '12:30' => '12:30',
            '13:00' => '13:00',
            '13:30' => '13:30',
            '14:00' => '14:00',
            '14:30' => '14:30',
            '15:00' => '15:00',
            '15:30' => '15:30',
            '16:00' => '16:00',
            '16:30' => '16:30',
            '16:30' => '16:30',
            '17:30' => '17:30',
            '18:00' => '18:00',
            '18:30' => '18:30',
            '19:00' => '19:00',
            '19:30' => '19:30',


        ];


        $view->with('horarios',$horarios);
    });
    View::composer(['admin.configuracao.includes.formulario','admin.veiculo.index'],function($view) {
        $statusVeiculos    =   \App\StatusVeiculo::all();
        $dados = [];

        foreach($statusVeiculos as $r){
            $dados[$r->id] = $r->nome;
        }
        $view->with('statusVeiculos',$dados);
    });
    View::composer(['admin.configuracao.includes.formulario','admin.veiculo.index'],function($view) {
        $statusContratos    =   \App\StatusContrato::all();
        $dados = [];

        foreach($statusContratos as $r){
            $dados[$r->id] = $r->nome;
        }
        $view->with('statusContratos',$dados);
    });
    View::composer(['admin.configuracao.includes.formulario','admin.cliente.index'],function($view) {
        $statusClientes    =   \App\StatusCliente::all();
        $dados = [];

        foreach($statusClientes as $r){
            $dados[$r->id] = $r->nome;
        }
        $view->with('statusClientes',$dados);
    });
    View::composer(['admin.configuracao.includes.formulario','admin.reparo.index'],function($view) {
        $statusReparos    =   \App\StatusReparo::all();
        $dados = [];

        foreach($statusReparos as $r){
            $dados[$r->id] = $r->nome;
        }
        $view->with('statusReparos',$dados);
    });
    View::composer(['admin.configuracao.includes.formulario','admin.reparo.index'],function($view) {
        $statusReparos    =   \App\StatusReparo::all();
        $dados = [];

        foreach($statusReparos as $r){
            $dados[$r->id] = $r->nome;
        }
        $view->with('statusReparos',$dados);
    });
    View::composer(['admin.reparo.index'],function($view) {
        $veiculos    =   \App\Veiculo::all();
        $dados = [];

        foreach($veiculos as $r){
            $dados[$r->id] = $r->placa." | ".$r->modelo->nome;
        }
        $view->with('veiculos',$dados);
    });
    View::composer(['admin.reparo.index'],function($view) {
        $oficina    =   \App\Oficina::all();
        $dados = [];

        foreach($oficina as $r){
            $dados[$r->id] = $r->nome;
        }
        $view->with('oficinas',$dados);
    });
});

