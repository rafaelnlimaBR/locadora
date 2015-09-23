@extends('admin.layout.l1')

@section('conteudo')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <div class="box-title">
                        #{!! $patio->id !!} | Detalhes
                    </div>
                    <small class="pull-right">Criado : {!! date_format($patio->created_at, 'd/m/Y H:i:s') !!}</small>
                </div>
                <div class="box-body">

                </div>
                <div class="box-footer">
                    <a class="btn btn-app" href="{!! route('patio.index') !!}"><i class="fa fa-mail-reply"> </i> Voltar</a>
                </div>
            </div>
        </div>
    </div>




@endsection