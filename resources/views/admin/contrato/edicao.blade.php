@extends('admin.layout.l1')

@section('conteudo')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                {!! Form::open(['route'=>['contrato.atualizar'],'method'=>'post','files' => true]) !!}
                <div class="box-header with-border">
                    <h3 class="box-title">Pagina teste</h3>
                    @if(isset($classe))
                        <small class="pull-right">Criado : {!! date_format($classe->created_at, 'd/m/Y H:i:s') !!}</small>
                    @endif
                </div>
                <div class="box-body">

                    @include('admin.contrato.includes.formulario')

                </div>
                <div class="box-footer">
                    <a href="{!! route('contrato.index') !!}" class="btn btn-app"><i class="fa fa-mail-reply"></i>Voltar</a>
                    <button type="submit" class="btn btn-app"><i class="fa fa-edit"></i>Editar</button>

                </div>
                {!! Form::close() !!}

            </div>
        </div>

    </div>
@include('admin.contrato.includes.cancelar')
@include('admin.contrato.includes.locar')
@include('admin.contrato.includes.finalizar')

@endsection