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
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Criado</th>
                            <th style="width: 125px;"></th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($grupos as $grupo)
                            <tr>
                                <td>{!! $grupo->id !!}</td>
                                <td>{!! $grupo->nome !!}</td>

                                <td>{!! $grupo->created_at !!}</td>
                                <td>
                                    <a href="#" class="btn btn-social-icon btn-info"><i class="fa fa-eye"></i></a>
                                    <a href="{!! route('usuario.editar',['id'=>$grupo->id]) !!}" class="btn btn-social-icon btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-social-icon btn-danger"><i class="fa fa-trash-o"></i></a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
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

@endsection