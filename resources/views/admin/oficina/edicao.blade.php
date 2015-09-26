@extends('admin.layout.l1')

@section('conteudo')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                {!! Form::open(['route'=>['oficina.atualizar'],'method'=>'post','files' => true]) !!}
                <div class="box-header with-border">
                    <h3 class="box-title">Pagina teste</h3>
                    @if(isset($patio))
                        <small class="pull-right">Criado : {!! date_format($modelo->created_at, 'd/m/Y H:i:s') !!}</small>
                    @endif
                </div>
                <div class="box-body">

                    @include('admin.oficina.includes.formulario')

                </div>
                <div class="box-footer">
                    <a href="{!! route('oficina.index') !!}" class="btn btn-app"><i class="fa fa-mail-reply"></i>Voltar</a>
                    <button type="submit" class="btn btn-app"><i class="fa fa-edit"></i>Editar</button>

                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>


@endsection