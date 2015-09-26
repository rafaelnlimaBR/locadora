

<div class="row">
    <div class="form-group col-xs-6">

        @if(isset($cliente))
            {!! Form::hidden('id',$cliente->id) !!}
        @endif
        {!! Form::label('nome','Nome Completo') !!}
        {!! Form::text('nome',(isset($cliente)?$cliente->nome:''),['class'=>'form-control',]) !!}
        {!! ($errors->has('nome')? "<p class='msg-alerta'>".$errors->first('nome')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-2">

        {!! Form::label('tipo','Tipo Registro') !!}
        {!! Form::select('tipo',['passaporte'=>'Passaporte','cpf'=>'Cpf'], (isset($cliente)?$cliente->tipo_registro:2), ['class'=>'form-control']) !!}
        {!! ($errors->has('tipo')? "<p class='msg-alerta'>".$errors->first('tipo')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-4">
        {!! Form::label('registro','Registro') !!}
        {!! Form::text('registro',(isset($cliente)?$cliente->registro:''),['class'=>'form-control',]) !!}
        {!! ($errors->has('registro')? "<p class='msg-alerta'>".$errors->first('registro')."</p>":"") !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-xs-2">

        {!! Form::label('cep','Cep') !!}
        {!! Form::text('cep',(isset($cliente)?$cliente->cep:''),['class'=>'form-control cep',]) !!}
        {!! ($errors->has('cep')? "<p class='msg-alerta'>".$errors->first('cep')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-3">
        {!! Form::label('logradouro','Logradouro') !!}
        {!! Form::text('logradouro',(isset($cliente)?$cliente->logradouro:''),['class'=>'form-control endereco',]) !!}
        {!! ($errors->has('logradouro')? "<p class='msg-alerta'>".$errors->first('logradouro')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-1">
        {!! Form::label('numero','Numero') !!}
        {!! Form::text('numero',(isset($cliente)?$cliente->numero:''),['class'=>'form-control numero',]) !!}
        {!! ($errors->has('numero')? "<p class='msg-alerta'>".$errors->first('numero')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-3">
        {!! Form::label('bairro','Bairro') !!}
        {!! Form::text('bairro',(isset($cliente)?$cliente->bairro:''),['class'=>'form-control bairro',]) !!}
        {!! ($errors->has('bairro')? "<p class='msg-alerta'>".$errors->first('bairro')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-2">
        {!! Form::label('cidade','Cidade') !!}
        {!! Form::text('cidade',(isset($cliente)?$cliente->cidade:''),['class'=>'form-control cidade',]) !!}
        {!! ($errors->has('cidade')? "<p class='msg-alerta'>".$errors->first('cidade')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-1">
        {!! Form::label('uf','UF') !!}
        {!! Form::text('uf',(isset($cliente)?$cliente->uf:''),['class'=>'form-control uf',]) !!}
        {!! ($errors->has('uf')? "<p class='msg-alerta'>".$errors->first('uf')."</p>":"") !!}
    </div>
</div>
<div class="row">

    <div class="form-group col-xs-3">

        {!! Form::label('telefone1','Telefone1') !!}
        {!! Form::text('telefone1',(isset($cliente)?$cliente->telefone1:''),['class'=>'form-control',]) !!}
        {!! ($errors->has('telefone1')? "<p class='msg-alerta'>".$errors->first('telefone1')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-3">

        {!! Form::label('telefone1','Telefone1') !!}
        {!! Form::text('telefone1',(isset($cliente)?$cliente->telefone1:''),['class'=>'form-control',]) !!}
        {!! ($errors->has('telefone1')? "<p class='msg-alerta'>".$errors->first('telefone1')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-3">

        {!! Form::label('telefone1','Telefone1') !!}
        {!! Form::text('telefone1',(isset($cliente)?$cliente->telefone1:''),['class'=>'form-control',]) !!}
        {!! ($errors->has('telefone1')? "<p class='msg-alerta'>".$errors->first('telefone1')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-3">

        {!! Form::label('telefone1','Telefone1') !!}
        {!! Form::text('telefone1',(isset($cliente)?$cliente->telefone1:''),['class'=>'form-control',]) !!}
        {!! ($errors->has('telefone1')? "<p class='msg-alerta'>".$errors->first('telefone1')."</p>":"") !!}
    </div>

</div>
<div class="row">
    <div class="form-group col-xs-5">

        {!! Form::label('email','Email') !!}
        {!! Form::text('email',(isset($cliente)?$cliente->email:''),['class'=>'form-control',]) !!}
        {!! ($errors->has('email')? "<p class='msg-alerta'>".$errors->first('email')."</p>":"") !!}
    </div>
</div>