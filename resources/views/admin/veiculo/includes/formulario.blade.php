<div class="row">
    <div class="form-group col-xs-2">

        @if(isset($veiculo))
            {!! Form::hidden('id',$veiculo->id,['id'=>'id-veiculo']) !!}
        @endif
        {!! Form::label('placa','Placa') !!}
        {!! Form::text('placa',(isset($veiculo)?$veiculo->placa:''),['class'=>'form-control',]) !!}
        {!! ($errors->has('placa')? "<p class='msg-alerta'>".$errors->first('placa')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-5">

        {!! Form::label('modelo','Modelos') !!}
        {!! Form::select('modelo',$modelos, (isset($veiculo)?$veiculo->modelo_id:''), ['class'=>'form-control']) !!}
        {!! ($errors->has('modelo')? "<p class='msg-alerta'>".$errors->first('modelo')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-2">

        {!! Form::label('cor','Cor') !!}
        {!! Form::select('cor',['branco'=>'Branco','azul'=>'Azul','prata'=>'Prata','preto'=>'Preto','vermelho'=>'Vermelho'], (isset($veiculo)?$veiculo->cor:''), ['class'=>'form-control']) !!}
        {!! ($errors->has('cor')? "<p class='msg-alerta'>".$errors->first('cor')."</p>":"") !!}
    </div>

    <div class="form-group col-xs-1">

        {!! Form::label('anomodelo','Modelo') !!}
        {!! Form::text('anomodelo',(isset($veiculo)?$veiculo->anomodelo:''),['class'=>'form-control',]) !!}
        {!! ($errors->has('anomodelo')? "<p class='msg-alerta'>".$errors->first('anomodelo')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-1">

        {!! Form::label('fabricacao','Fabricação') !!}
        {!! Form::text('fabricacao',(isset($veiculo)?$veiculo->anofabricacao:''),['class'=>'form-control',]) !!}
        {!! ($errors->has('fabricacao')? "<p class='msg-alerta'>".$errors->first('fabricacao')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-1">

        {!! Form::label('km','KM') !!}
        {!! Form::text('km',(isset($veiculo)?$veiculo->km:''),['class'=>'form-control',]) !!}
        {!! ($errors->has('km')? "<p class='msg-alerta'>".$errors->first('km')."</p>":"") !!}
    </div>

</div>
<div class="row">
    <div class="form-group col-xs-3">

        {!! Form::label('classe','Classe') !!}
        {!! Form::select('classe',$classes, (isset($veiculo)?$veiculo->classe_id:''), ['class'=>'form-control']) !!}
        {!! ($errors->has('classe')? "<p class='msg-alerta'>".$errors->first('classe')."</p>":"") !!}
    </div>


    <div class="form-group col-xs-3">

        {!! Form::label('patio','Patio') !!}
        {!! Form::select('patio',$patios, (isset($veiculo)?$veiculo->patio_id:''), ['class'=>'form-control']) !!}
        {!! ($errors->has('patio')? "<p class='msg-alerta'>".$errors->first('patio')."</p>":"") !!}
    </div>
</div>

