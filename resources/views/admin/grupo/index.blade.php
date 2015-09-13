@extends('admin.layout.l1')

@section('conteudo')
    <div class="row">
        <div class="col-xs-12">
            <div class="botoes">
                <a href="{!! route('grupo.novo') !!}" class="btn btn-success"><i class="fa fa-plus"> </i>  Novo Registro</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Titulo Pagina</h3>
                    <div class="row">
                        {!! Form::open(['route'=>['grupo.pesquisa'],'method'=>'post']) !!}
                        <div class="form-group col-xs-4">

                            {!! Form::label('nome','Nome') !!}
                            {!! Form::text('nome','',['class'=>'form-control cep',]) !!}

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
                            <th style="width: 5%">ID</th>
                            <th style="width: 57%">Nome</th>
                            <th style="width: 9%">Situação</th>
                            <th style="width: 15%">Criado</th>
                            <th style="width: 20%;"></th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($grupos as $grupo)
                            <tr>
                                <td>{!! $grupo->id !!}</td>
                                <td>{!! $grupo->nome !!}</td>
                                <td>{!! ($grupo->situacao == 0? "<h6 class='inf inf-danger'>Inativo</h6>":"<h6 class='inf inf-success'>Ativo</h6>") !!}</td>

                                <td>{!! $grupo->created_at !!}</td>
                                <td>
                                    <a href="{!! route('grupo.detalhes',['id'=>$grupo->id]) !!}" class="btn btn-social-icon btn-info"><i class="fa fa-eye"></i></a>
                                    <a href="{!! route('grupo.editar',['id'=>$grupo->id]) !!}" class="btn btn-social-icon btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-social-icon btn-danger excluir" data-toggle="modal" data-target="#form-excluir" excluir="{!! $grupo->id !!}"><i class="fa fa-trash-o"></i></a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Situação</th>
                            <th>Criado</th>
                            <th></th>
                        </tr>
                        </tfoot>
                    </table>
                    {!! $grupos->render() !!}
                </div><!-- /.box-body -->
            </div><!-- /.box -->


        </div><!-- /.col -->
    </div><!-- /.row -->
@include('admin.grupo.includes.excluir')
@endsection