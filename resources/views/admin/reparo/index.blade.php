@extends('admin.layout.l1')

@section('conteudo')
    <div class="row">
        <div class="col-xs-12">
            <div class="botoes">
                <a href="{!! route('reparo.novo') !!}" class="btn btn-success"><i class="fa fa-plus"> </i>  Novo Registro</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Titulo Pagina</h3>
                    <div class="row">
                        {!! Form::open(['route'=>['reparo.pesquisa'],'method'=>'post']) !!}
                        <div class="form-group col-xs-3">

                            {!! Form::label('veiculo','Veiculo') !!}
                            {!! Form::select('veiculo',[0    =>  'Todos']+$veiculos, 0, ['class'=>'form-control']) !!}

                        </div>
                        <div class="form-group col-xs-4">

                            {!! Form::label('oficina','Oficina') !!}
                            {!! Form::select('oficina',[0    =>  'Todos']+$oficinas, 0, ['class'=>'form-control']) !!}

                        </div>
                        <div class="form-group col-xs-2">

                            {!! Form::label('status','Status') !!}
                            {!! Form::select('status',[0    =>  'Todos']+$statusReparos, 0, ['class'=>'form-control']) !!}

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
                            <th style="width: 10%">Placa</th>
                            <th style="width: 10%">Modelo</th>
                            <th style="width: 25%">Oficina</th>
                            <th style="width: 10%">Telefone</th>
                            <th style="width: 15%">Status</th>
                            <th style="width: 10%;">Criado</th>
                            <th style="width: 20%;"></th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reparos as $r)
                            <tr>
                                <td>{!! $r->id !!}</td>
                                <td>{!! $r->veiculo->placa !!}</td>
                                <td>{!! $r->veiculo->modelo->nome !!}</td>
                                <td>{!! $r->oficina->nome   !!}</td>
                                <td>{!! $r->oficina->telefone   !!}</td>
                                <td><h6 class="inf" style="background: {!! $r->status->cor !!}; color: #ffffff">{!! $r->status->nome !!}</h6></td>
                                <td>{!! date_format($r->created_at, 'd/m/Y')   !!}</td>
                                <td>
                                    <a href="{!! route('reparo.detalhes',['id'=>$r->id]) !!}" class="btn btn-social-icon btn-info"><i class="fa fa-eye"></i></a>
                                    <a href="{!! route('reparo.editar',['id'=>$r->id]) !!}" class="btn btn-social-icon btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-social-icon btn-danger excluir" data-toggle="modal" data-target="#form-excluir" excluir="{!! $r->id !!}"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th >ID</th>
                            <th >Placa</th>
                            <th >Modelo</th>
                            <th >Oficina</th>
                            <th >Telefone</th>
                            <th >Status</th>
                            <th >Criado</th>
                            <th ></th>
                        </tr>
                        </tfoot>
                    </table>
                    {!! $reparos->render() !!}
                </div><!-- /.box-body -->
            </div><!-- /.box -->


        </div><!-- /.col -->
    </div><!-- /.row -->
    @include('admin.reparo.includes.excluir')
@endsection