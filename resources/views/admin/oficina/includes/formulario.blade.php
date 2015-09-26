
<div class="row">
    <div class="form-group col-xs-8">

        @if(isset($oficina))
            {!! Form::hidden('id',$oficina->id) !!}
        @endif
        {!! Form::label('nome','Nome') !!}
        {!! Form::text('nome',(isset($oficina)?$oficina->nome:''),['class'=>'form-control',]) !!}
        {!! ($errors->has('nome')? "<p class='msg-alerta'>".$errors->first('nome')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-4">
        {!! Form::label('cep','Cep') !!}
        {!! Form::text('cep',(isset($oficina)?$oficina->cep:''),['class'=>'form-control cep',]) !!}
        {!! ($errors->has('cep')? "<p class='msg-alerta'>".$errors->first('cep')."</p>":"") !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-xs-4">
        {!! Form::label('logradouro','Logradouro') !!}
        {!! Form::text('logradouro',(isset($oficina)?$oficina->endereco:''),['class'=>'form-control endereco',]) !!}
        {!! ($errors->has('logradouro')? "<p class='msg-alerta'>".$errors->first('logradouro')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-1">
        {!! Form::label('numero','N') !!}
        {!! Form::text('numero',(isset($oficina)?$oficina->numero:''),['class'=>'form-control numero',]) !!}
        {!! ($errors->has('numero')? "<p class='msg-alerta'>".$errors->first('numero')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-3">
        {!! Form::label('bairro','Bairro') !!}
        {!! Form::text('bairro',(isset($oficina)?$oficina->bairro:''),['class'=>'form-control bairro',]) !!}
        {!! ($errors->has('bairro')? "<p class='msg-alerta'>".$errors->first('bairro')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-3">
        {!! Form::label('cidade','Cidade') !!}
        {!! Form::text('cidade',(isset($oficina)?$oficina->cidade:''),['class'=>'form-control cidade',]) !!}
        {!! ($errors->has('cidade')? "<p class='msg-alerta'>".$errors->first('cidade')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-1">
        {!! Form::label('estado','Estado') !!}
        {!! Form::text('estado',(isset($oficina)?$oficina->estado:''),['class'=>'form-control uf',]) !!}
        {!! ($errors->has('estado')? "<p class='msg-alerta'>".$errors->first('estado')."</p>":"") !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-xs-3">
        {!! Form::label('telefone','Telefone') !!}
        {!! Form::text('telefone',(isset($oficina)?$oficina->telefone:''),['class'=>'form-control',]) !!}
        {!! ($errors->has('telefone')? "<p class='msg-alerta'>".$errors->first('telefone')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-3">
        {!! Form::label('celular','Celular') !!}
        {!! Form::text('celular',(isset($oficina)?$oficina->celular:''),['class'=>'form-control',]) !!}
        {!! ($errors->has('celular')? "<p class='msg-alerta'>".$errors->first('celular')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-6">
        {!! Form::label('email','Email') !!}
        {!! Form::text('email',(isset($oficina)?$oficina->email:''),['class'=>'form-control',]) !!}
        {!! ($errors->has('email')? "<p class='msg-alerta'>".$errors->first('email')."</p>":"") !!}
    </div>
</div>