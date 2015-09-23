
<div class="row">
    <div class="form-group col-xs-6">

        @if(isset($classe))
            {!! Form::hidden('id',$classe->id) !!}
        @endif
        {!! Form::label('nome','Nome') !!}
        {!! Form::text('nome',(isset($classe)?$classe->nome:''),['class'=>'form-control',]) !!}
        {!! ($errors->has('nome')? "<p class='msg-alerta'>".$errors->first('nome')."</p>":"") !!}
    </div>

    <div class="form-group col-xs-4">
        {!! Form::label('situacao','Situação') !!}
        {!! Form::select('situacao',[0  =>  'Inativo',1 =>  'Ativo'], (isset($classe)?$classe->situacao:1), ['class'=>'form-control']) !!}
        {!! ($errors->has('situacao')? "<p class='msg-alerta'>".$errors->first('situacao')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-2">


        {!! Form::label('valor','Valor') !!}
        {!! Form::text('valor',(isset($classe)?$classe->valor:''),['class'=>'form-control',]) !!}
        {!! ($errors->has('valor')? "<p class='msg-alerta'>".$errors->first('valor')."</p>":"") !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-xs-2">
        {!! Form::label('passageiros','Passageiros') !!}
        {!! Form::select('passageiros',[1,2,3,4,5,6,7,8,9,10,11,12], (isset($classe)?$classe->passageiros:1), ['class'=>'form-control']) !!}
    </div>
    <div class="form-group col-xs-2">
        {!! Form::label('malas','Malas') !!}
        {!! Form::select('malas',[1,2,3,4,5,6,7], (isset($classe)?$classe->malas:1), ['class'=>'form-control']) !!}
    </div>
    <div class="form-group col-xs-2">
        {!! Form::label('ar','Ar') !!}
        {!! Form::select('ar',[0 => 'Não',1 => 'Sim'], (isset($classe)?$classe->ar:0), ['class'=>'form-control']) !!}
    </div>
    <div class="form-group col-xs-2">
        {!! Form::label('dh','DH') !!}
        {!! Form::select('dh',[0 => 'Não',1 => 'Sim'], (isset($classe)?$classe->dh:0), ['class'=>'form-control']) !!}
    </div>
    <div class="form-group col-xs-2">
        {!! Form::label('abs','Abs') !!}
        {!! Form::select('abs',[0 => 'Não',1 => 'Sim'], (isset($classe)?$classe->abs:0), ['class'=>'form-control']) !!}
    </div>
    <div class="form-group col-xs-2">
        {!! Form::label('airbag','Airbag') !!}
        {!! Form::select('airbag',[0 => 'Não',1 => 'Sim'], (isset($classe)?$classe->airbag:0), ['class'=>'form-control']) !!}
    </div>
</div>
