@extends('admin.layout.l1')

@section('conteudo')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                {!! Form::model($usuario,['route'=>['usuario.atualizar'],'method'=>'post']) !!}
                <div class="box-header with-border">
                    <h3 class="box-title">Pagina teste</h3>
                </div>
                <div class="box-body">

                    @include('admin.usuario.includes.formulario')

                </div>
                <div class="box-footer">
                    <a href="{!! route('usuario.index') !!}" class="btn btn-app"><i class="fa fa-mail-reply"></i>Voltar</a>
                    <button type="submit" class="btn btn-app"><i class="fa fa-edit"></i>Editar</button>

                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>


@endsection