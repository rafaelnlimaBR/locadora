@extends('admin.layout.l1')

@section('conteudo')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                {!! Form::open(['route'=>['contrato.reservar'],'method'=>'post','files' => true]) !!}
                <div class="box-header with-border">
                    <h3 class="box-title" x>Pagina teste</h3>
                </div>
                <div class="box-body">

                    @include('admin.contrato.includes.formulario',['status'=>\App\Configuracao::getConf()->reservado_contrato])

                </div>
                <div class="box-footer">
                    <a href="{!! route('contrato.index') !!}" class="btn btn-default">Voltar</a>
                    <button type="submit" class="btn btn-success">Continuar</button>

                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>


@endsection