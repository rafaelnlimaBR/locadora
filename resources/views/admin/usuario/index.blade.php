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
                    {!! Form::open(['route'=>['usuario.pesquisa'],'method'=>'post']) !!}
                        <div class="form-group col-xs-3">

                            {!! Form::label('nome','Nome') !!}
                            {!! Form::text('nome','',['class'=>'form-control cep',]) !!}

                        </div>
                        <div class="form-group col-xs-2">

                            {!! Form::label('apelido','Apelido') !!}
                            {!! Form::text('apelido','',['class'=>'form-control cep',]) !!}

                        </div>
                        <div class="form-group col-xs-3">

                            {!! Form::label('email','Email') !!}
                            {!! Form::text('email','',['class'=>'form-control cep',]) !!}

                        </div>
                        <div class="form-group col-xs-3">

                            {!! Form::label('grupo','Grupo') !!}
                            {!! Form::select('grupo',([0=>"Todos"]+$grupos), 0, ['class'=>'form-control']) !!}

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
                        <th style="width:3%">ID</th>
                        <th style="width:30%">Nome</th>
                        <th style="width:10%">Grupo</th>
                        <th>Email</th>
                        <th>Situação</th>
                        <th>Criado</th>
                        <th style="width:13%"></th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($usuarios as $usuario)
                    <tr>
                        <td>{!! $usuario->id !!}</td>
                        <td>{!! $usuario->nome !!}</td>
                        <td>{!! $usuario->grupo->nome !!}</td>
                        <td>{!! $usuario->email !!}</td>
                        <td>{!! ($usuario->situacao == 0? "<h6 class='inf inf-danger'>Inativo</h6>":"<h6 class='inf inf-success'>Ativo</h6>") !!}</td>
                        <td>{!! date_format($usuario->created_at , 'd/m/Y') !!}</td>
                        <td>
                            <a href="{!! route('usuario.detalhes',['id'=>$usuario->id]) !!}" class="btn btn-social-icon btn-info"><i class="fa fa-eye"></i></a>
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