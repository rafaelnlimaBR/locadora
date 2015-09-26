@extends('admin.layout.l1')

@section('conteudo')
    <div class="row">
        <div class="col-xs-12">
            <div class="botoes">
                <a href="{!! route('cliente.novo') !!}" class="btn btn-success"><i class="fa fa-plus"> </i> Novo Registro</a>
            </div>
        </div>
    </div>

    <div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">Titulo Pagina</h3>
                <div class="row">
                    {!! Form::open(['route'=>['cliente.pesquisa'],'method'=>'post']) !!}
                        <div class="form-group col-xs-3">

                            {!! Form::label('nome','Nome') !!}
                            {!! Form::text('nome','',['class'=>'form-control cep',]) !!}

                        </div>
                        <div class="form-group col-xs-2">

                            {!! Form::label('registro','Registro') !!}
                            {!! Form::text('registro','',['class'=>'form-control',]) !!}

                        </div>
                        <div class="form-group col-xs-3">

                            {!! Form::label('email','Email') !!}
                            {!! Form::text('email','',['class'=>'form-control cep',]) !!}

                        </div>

                        <div class="form-group col-xs-1 pull-right">

                            {!! Form::label('pesquisa','Pesquisar') !!}
                            <button type="submit" class="btn btn-success form-control"><i class="fa fa-search"> </i></button>
                        </div>
                        <div class="form-group col-xs-2">

                            {!! Form::label('status','Status') !!}
                            {!! Form::select('status',[0=>'Todos']+$statusClientes, 0, ['class'=>'form-control']) !!}
                            {!! ($errors->has('status')? "<p class='msg-alerta'>".$errors->first('status')."</p>":"") !!}
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
                        <th>Status</th>
                        <th>Criado</th>
                        <th style="width:13%"></th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clientes as $cliente)
                    <tr>
                        <td>{!! $cliente->id !!}</td>
                        <td>{!! $cliente->nome !!}</td>
                        <td></td>
                        <td>{!! $cliente->email !!}</td>
                        <td><h6 class="inf" style="background: {!! $cliente->status->cor !!}; color: #ffffff">{!! $cliente->status->nome !!}</h6></td>
                        <td>{!! date_format($cliente->created_at , 'd/m/Y') !!}</td>
                        <td>
                            <a href="{!! route('cliente.detalhes',['id'=>$cliente->id]) !!}" class="btn btn-social-icon btn-info"><i class="fa fa-eye"></i></a>
                            <a href="{!! route('cliente.editar',['id'=>$cliente->id]) !!}" class="btn btn-social-icon btn-success"><i class="fa fa-edit"></i></a>
                            <a href="#" class="btn btn-social-icon btn-danger excluir" data-toggle="modal" data-target="#form-excluir" excluir="{!! $cliente->id !!}"><i class="fa fa-trash-o"></i></a>
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
                        <th>Status</th>
                        <th>Criado</th>
                        <td></td>
                    </tr>
                    </tfoot>
                </table>
                {!! $clientes->render() !!}
            </div><!-- /.box-body -->
        </div><!-- /.box -->


    </div><!-- /.col -->
    </div><!-- /.row -->

    @include('admin.cliente.includes.excluir')
@endsection