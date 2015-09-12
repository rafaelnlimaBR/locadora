@extends('admin.layout.l1')

@section('conteudo')
    <div class="row">
        <div class="col-xs-12">
            <div class="botoes">
                <a href="{!! route('usuario.novo') !!}" class="btn btn-success"><i class="fa fa-plus"> </i> Novo Registro</a>
            </div>
        </div>
    </div>

    <div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">Titulo Pagina</h3>
                <div class="row">
                    {!! Form::open() !!}
                        <div class="form-group col-xs-6">

                            {!! Form::label('pesquisa','Pesquisa') !!}
                            {!! Form::text('pesquisa','',['class'=>'form-control cep',]) !!}

                        </div>
                        <div class="form-group col-xs-3">

                            {!! Form::label('grupo','Grupo') !!}
                            {!! Form::select('grupo',$grupos, '', ['class'=>'form-control']) !!}

                        </div>
                        <div class="form-group col-xs-1 pull-right">

                            {!! Form::label('pesquisa','Pesquisar') !!}
                            <button type="submit" class="btn btn-success form-control"><i class="fa fa-search"> </i></button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Grupo</th>
                        <th>Email</th>
                        <th>Endereço</th>
                        <th>Situação</th>
                        <th>Criado</th>
                        <th style="width:125px"></th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($usuarios as $usuario)
                    <tr>
                        <td>{!! $usuario->id !!}</td>
                        <td>{!! $usuario->pri_nome !!}</td>
                        <td>{!! $usuario->grupo->nome !!}</td>
                        <td>{!! $usuario->email !!}</td>
                        <td>{!! $usuario->endereco !!}</td>
                        <td>{!! ($usuario->situacao == 0? "<h6 class='inf inf-danger'>Inativo</h6>":"<h6 class='inf inf-success'>Ativo</h6>") !!}</td>
                        <td>{!! $usuario->created_at !!}</td>
                        <td>
                            <a href="#" class="btn btn-social-icon btn-info"><i class="fa fa-eye"></i></a>
                            <a href="{!! route('usuario.editar',['id'=>$usuario->id]) !!}" class="btn btn-social-icon btn-success"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-social-icon btn-danger excluir" data-toggle="modal" data-target="#form-excluir" excluir="{!! $usuario->id !!}"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Grupo</th>
                        <th>Email</th>
                        <th>Endereço</th>
                        <th>Situação</th>
                        <th>Criado</th>
                        <td></td>
                    </tr>
                    </tfoot>
                </table>
                {!! $usuarios->render() !!}
            </div><!-- /.box-body -->
        </div><!-- /.box -->


    </div><!-- /.col -->
    </div><!-- /.row -->

    @include('admin.usuario.includes.excluir')
@endsection