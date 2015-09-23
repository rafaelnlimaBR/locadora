
<div class="row">
    <div class="form-group col-xs-8">

        @if(isset($modelo))
            {!! Form::hidden('id',$modelo->id) !!}
        @endif
        {!! Form::label('nome','Nome') !!}
        {!! Form::text('nome',(isset($modelo)?$modelo->nome:''),['class'=>'form-control',]) !!}
        {!! ($errors->has('nome')? "<p class='msg-alerta'>".$errors->first('nome')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-4">

        {!! Form::label('marca','Marca') !!}
        {!! Form::select('marca',$marcas, (isset($modelo)?$modelo->marca_id:''), ['class'=>'form-control']) !!}
        {!! ($errors->has('marca')? "<p class='msg-alerta'>".$errors->first('marca')."</p>":"") !!}
    </div>

</div>