
<div class="row">
    <div class="form-group col-xs-12">

        @if(isset($marca))
            {!! Form::hidden('id',$marca->id) !!}
        @endif
        {!! Form::label('nome','Nome') !!}
        {!! Form::text('nome',(isset($marca)?$marca->nome:''),['class'=>'form-control',]) !!}
        {!! ($errors->has('nome')? "<p class='msg-alerta'>".$errors->first('nome')."</p>":"") !!}
    </div>

</div>