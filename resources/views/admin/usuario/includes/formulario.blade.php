

<div class="row">
    <div class="form-group col-xs-8">

        @if(isset($usuario))
            {!! Form::hidden('id',$usuario->id) !!}
        @endif
        {!! Form::label('nome','Nome Completo') !!}
        {!! Form::text('nome',(isset($usuario)?$usuario->pri_nome:''),['class'=>'form-control',]) !!}
        {!! ($errors->has('nome')? "<p class='msg-alerta'>".$errors->first('nome')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-4">
        {!! Form::label('apelido','Apelido') !!}
        {!! Form::text('apelido',(isset($usuario)?$usuario->seg_nome:''),['class'=>'form-control',]) !!}
        {!! ($errors->has('apelido')? "<p class='msg-alerta'>".$errors->first('apelido')."</p>":"") !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-xs-2">

        {!! Form::label('cep','Cep') !!}
        {!! Form::text('cep',(isset($usuario)?$usuario->cep:''),['class'=>'form-control cep',]) !!}
        {!! ($errors->has('cep')? "<p class='msg-alerta'>".$errors->first('cep')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-3">
        {!! Form::label('endereco','Endereço') !!}
        {!! Form::text('endereco',(isset($usuario)?$usuario->endereco:''),['class'=>'form-control endereco',]) !!}
        {!! ($errors->has('endereco')? "<p class='msg-alerta'>".$errors->first('endereco')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-1">
        {!! Form::label('numero','Numero') !!}
        {!! Form::text('numero',(isset($usuario)?$usuario->numero:''),['class'=>'form-control numero',]) !!}
        {!! ($errors->has('numero')? "<p class='msg-alerta'>".$errors->first('numero')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-3">
        {!! Form::label('bairro','Bairro') !!}
        {!! Form::text('bairro',(isset($usuario)?$usuario->bairro:''),['class'=>'form-control bairro',]) !!}
        {!! ($errors->has('bairro')? "<p class='msg-alerta'>".$errors->first('bairro')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-2">
        {!! Form::label('cidade','Cidade') !!}
        {!! Form::text('cidade',(isset($usuario)?$usuario->cidade:''),['class'=>'form-control cidade',]) !!}
        {!! ($errors->has('cidade')? "<p class='msg-alerta'>".$errors->first('cidade')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-1">
        {!! Form::label('uf','UF') !!}
        {!! Form::text('uf',(isset($usuario)?$usuario->uf:''),['class'=>'form-control uf',]) !!}
        {!! ($errors->has('uf')? "<p class='msg-alerta'>".$errors->first('uf')."</p>":"") !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-xs-4">

        {!! Form::label('grupo','Grupo') !!}
        {!! Form::select('grupo',$grupos, (isset($usuario)?$usuario->grupo_id:''), ['class'=>'form-control']) !!}
        {!! ($errors->has('grupo')? "<p class='msg-alerta'>".$errors->first('grupo')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-4">

        {!! Form::label('email','Email') !!}
        {!! Form::text('email',(isset($usuario)?$usuario->email:''),['class'=>'form-control',]) !!}
        {!! ($errors->has('email')? "<p class='msg-alerta'>".$errors->first('email')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-4">

        {!! Form::label('situacao','Situação') !!}
        {!! Form::select('situacao',[0=>'Inativo',1=>'Ativo'], (isset($usuario)?$usuario->situacao:''), ['class'=>'form-control']) !!}
        {!! ($errors->has('situacao')? "<p class='msg-alerta'>".$errors->first('situacao')."</p>":"") !!}
    </div>

</div>