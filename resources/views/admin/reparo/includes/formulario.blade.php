
<div class="row">
    <div class="form-group col-xs-6">

        @if(isset($reparo))
            {!! Form::hidden('id',$reparo->id) !!}
        @endif
        {!! Form::label('veiculo','Veículo') !!}
        {!! Form::text('veiculo',(isset($reparo)?$reparo->veiculo->placa:''),['class'=>'form-control veiculos',]) !!}
        {!! Form::hidden('id_veiculo',(isset($reparo)?$reparo->veiculo_id:''),['class'=>'form-control id_veiculo',]) !!}
        {!! ($errors->has('id_veiculo')? "<p class='msg-alerta'>".$errors->first('id_veiculo')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-6">

        {!! Form::label('oficina','Oficina') !!}
        {!! Form::text('oficina',(isset($reparo)?$reparo->oficina->nome:''),['class'=>'form-control oficinas',]) !!}
        {!! Form::hidden('id_oficina',(isset($reparo)?$reparo->oficina_id:''),['class'=>'form-control id_oficina',]) !!}
        {!! ($errors->has('id_oficina')? "<p class='msg-alerta'>".$errors->first('id_oficina')."</p>":"") !!}
    </div>




</div>
<div class="row">
    <div class="form-group col-xs-12">

        {!! Form::label('defeito','Defeito') !!}
        {!! Form::textarea('defeito',(isset($reparo)?$reparo->defeito:''),['class'=>'form-control ',]) !!}
        {!! ($errors->has('defeito')? "<p class='msg-alerta'>".$errors->first('defeito')."</p>":"") !!}
    </div>
</div>
@if(isset($reparo))
    @if($reparo->status_id == \App\Configuracao::getConf()->reparo_novo)
    <div class="row">
        <div class="col-xs-12">
            <a href="#" class="btn btn-success " data-toggle="modal" data-target="#form-finalizar" excluir="{!! $reparo->id !!}"><i class="fa fa-check" > </i> Finalizar</a>
            <a href="#" class="btn btn-danger " data-toggle="modal" data-target="#form-cancelar" excluir="{!! $reparo->id !!}"><i class="fa fa-ban"> </i> Cancelar</a>
        </div>

    </div>
    @endif
@endif
