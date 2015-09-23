
<div class="row">
    <div class="form-group col-xs-8">

        @if(isset($patio))
            {!! Form::hidden('id',$patio->id) !!}
        @endif
        {!! Form::label('nome','Nome') !!}
        {!! Form::text('nome',(isset($patio)?$patio->nome:''),['class'=>'form-control',]) !!}
        {!! ($errors->has('nome')? "<p class='msg-alerta'>".$errors->first('nome')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-4">
        {!! Form::label('situacao','Situação') !!}
        {!! Form::select('situacao',[0  =>  'Inativo',1 =>  'Ativo'], (isset($patio)?$patio->situacao:1), ['class'=>'form-control']) !!}
        {!! ($errors->has('situacao')? "<p class='msg-alerta'>".$errors->first('situacao')."</p>":"") !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-xs-2">
        {!! Form::label('cep','Cep') !!}
        {!! Form::text('cep',(isset($patio)?$patio->cep:''),['class'=>'form-control cep',]) !!}
        {!! ($errors->has('cep')? "<p class='msg-alerta'>".$errors->first('cep')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-4">
        {!! Form::label('logradouro','Logradouro') !!}
        {!! Form::text('logradouro',(isset($patio)?$patio->logradouro:''),['class'=>'form-control endereco',]) !!}
        {!! ($errors->has('logradouro')? "<p class='msg-alerta'>".$errors->first('logradouro')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-1">
        {!! Form::label('numero','Numero') !!}
        {!! Form::text('numero',(isset($patio)?$patio->numero:''),['class'=>'form-control numero',]) !!}
        {!! ($errors->has('numero')? "<p class='msg-alerta'>".$errors->first('numero')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-3">
        {!! Form::label('cidade','Cidade') !!}
        {!! Form::text('cidade',(isset($patio)?$patio->cidade:''),['class'=>'form-control cidade',]) !!}
        {!! ($errors->has('cidade')? "<p class='msg-alerta'>".$errors->first('cidade')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-2">
        {!! Form::label('estado','estado') !!}
        {!! Form::text('estado',(isset($patio)?$patio->estado:''),['class'=>'form-control uf',]) !!}
        {!! ($errors->has('estado')? "<p class='msg-alerta'>".$errors->first('estado')."</p>":"") !!}
    </div>
</div>
