@extends('admin.layout.l1')

@section('conteudo')
    <div class="row">
        <div class="col-xs-12">
            <div class="botoes">
                <a href="{!! route('veiculo.novo') !!}" class="btn btn-success"><i class="fa fa-plus"> </i>  Novo Registro</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Titulo Pagina</h3>
                    <div class="row">
                        {!! Form::open(['route'=>['veiculo.pesquisa'],'method'=>'post']) !!}
                        <div class="form-group col-xs-2">

                            {!! Form::label('placa','Placa') !!}
                            {!! Form::text('placa','',['class'=>'form-control',]) !!}

                        </div>
                        <div class="form-group col-xs-2">

                            {!! Form::label('status','Status') !!}
                            {!! Form::select('status',[0 => 'Todos']+$statusVeiculos, 0, ['class'=>'form-control']) !!}

                        </div>
                        <div class="form-group col-xs-2">

                            {!! Form::label('modelos','Modelos') !!}
                            {!! Form::select('modelos',[0 => 'Todos']+$modelos, 0, ['class'=>'form-control']) !!}

                        </div>
                        <div class="form-group col-xs-2">

                            {!! Form::label('patios','Patios') !!}
                            {!! Form::select('patios',[0 => 'Todos']+$patios, 0, ['class'=>'form-control']) !!}

                        </div>
                        <div class="form-group col-xs-2">

                            {!! Form::label('classes','Classes') !!}
                            {!! Form::select('classes',[0 => 'Todos']+$classes, 0, ['class'=>'form-control']) !!}

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
                            <th style="width: 8%">Placa</th>
                            <th style="width: 18%">Modelo</th>
                            <th style="width: 12%">Marca</th>
                            <th style="width: 11%">Ano</th>
                            <th style="width: 12%">Status</th>
                            <th style="width: 12%">Situação</th>
                            <th style="width: 8%">Criado</th>
                            <th style="width: 20%;"></th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($veiculos as $r)
                            <tr>
                                <td>{!! $r->id !!}</td>
                                <td>{!! $r->placa !!}</td>
                                <td>{!! $r->modelo->nome !!}</td>
                                <td>{!! $r->modelo->marca->nome !!}</td>
                                <td>{!! $r->anomodelo.' / '.$r->anofabricacao !!}</td>
                                <td><h6 class="inf" style="background: {!! $r->status->cor !!}; color: #ffffff">{!! $r->status->nome !!}</h6></td>
                                <td>{!! ($r->situacao == 0? "<h6 class='inf inf-danger'>Inativo</h6>":"<h6 class='inf inf-success'>Ativo</h6>") !!}</td>
                                <td>{!! date_format($r->created_at, 'd/m/Y') !!}</td>
                                <td>
                                    <a href="{!! route('veiculo.detalhes',['id'=>$r->id]) !!}" class="btn btn-social-icon btn-info"><i class="fa fa-eye"></i></a>
                                    <a href="{!! route('veiculo.editar',['id'=>$r->id]) !!}" class="btn btn-social-icon btn-success"><i class="fa fa-edit"></i></a>
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
                            <th >Marca</th>
                            <th >Ano</th>
                            <th>Criado</th>
                            <th ></th>
                        </tr>
                        </tfoot>
                    </table>
                    {!! $veiculos->render() !!}
                </div><!-- /.box-body -->
            </div><!-- /.box -->


        </div><!-- /.col -->
    </div><!-- /.row -->
    @include('admin.veiculo.includes.excluir')
@endsection