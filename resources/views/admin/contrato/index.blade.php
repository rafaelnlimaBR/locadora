@extends('admin.layout.l1')

@section('conteudo')
    <div class="row">
        <div class="col-xs-12">
            <div class="botoes">
                <a href="{!! route('contrato.novo') !!}" class="btn btn-success"><i class="fa fa-plus"> </i>  Nova Locação</a>
                <a href="{!! route('contrato.reserva') !!}" class="btn btn-warning"><i class="fa fa-plus"> </i>  Nova Reserva</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Titulo Pagina</h3>
                    <div class="row">
                        {!! Form::open(['route'=>['contrato.pesquisa'],'method'=>'post']) !!}
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
                            <th style="width: 45%">Cliente</th>
                            <th style="width: 9%">Placa</th>
                            <th style="width: 9%">Modelo</th>
                            <th style="width: 9%">Status</th>
                            <th style="width: 10%">Criado</th>
                            <th style="width: 20%;"></th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contratos as $r)
                            <tr>
                               <td>{!! $r->id !!}</td>
                               <td>{!! $r->cliente->nome !!}</td>
                               <td>{!! $r->veiculo->placa !!}</td>
                               <td>{!! $r->veiculo->modelo->nome !!}</td>
                                <td><h6 class="inf" style="background: {!! $r->historicos()->ultimoregistro()->first()->status()->first()->cor!!}; color: #ffffff;">{!! $r->historicos()->ultimoregistro()->first()->status()->first()->nome !!}</h6></td>
                                <td>{!! date_format($r->created_at , 'd/m/Y') !!}</td>
                                <td>
                                    <a href="{!! route('contrato.detalhes',['id'=>$r->id]) !!}" class="btn btn-social-icon btn-info"><i class="fa fa-eye"></i></a>
                                    <a href="{!! route('contrato.editar',['id'=>$r->id]) !!}" class="btn btn-social-icon btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-social-icon btn-danger excluir" data-toggle="modal" data-target="#form-excluir" excluir="{!! $r->id !!}"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th >ID</th>
                            <th >Cliente</th>
                            <th >Placa</th>
                            <th >Modelo</th>
                            <th >Status</th>
                            <th >Criado</th>
                            <th ></th>
                        </tr>
                        </tfoot>
                    </table>
                    {!! $contratos->render() !!}
                </div><!-- /.box-body -->
            </div><!-- /.box -->


        </div><!-- /.col -->
    </div><!-- /.row -->
    @include('admin.contrato.includes.excluir')
@endsection