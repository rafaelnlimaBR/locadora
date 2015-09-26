
<div class="row">
    <div class="form-group col-xs-8">

        @if(isset($acessorio))
            {!! Form::hidden('id',$acessorio->id) !!}
        @endif
        {!! Form::label('nome','Nome') !!}
        {!! Form::text('nome',(isset($acessorio)?$acessorio->nome:''),['class'=>'form-control',]) !!}
        {!! ($errors->has('nome')? "<p class='msg-alerta'>".$errors->first('nome')."</p>":"") !!}
    </div>

    <div class="form-group col-xs-2">
        {!! Form::label('valor','Valor') !!}
        {!! Form::text('valor',(isset($acessorio)?$acessorio->valor:''),['class'=>'form-control',]) !!}
        {!! ($errors->has('valor')? "<p class='msg-alerta'>".$errors->first('valor')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-2">


        {!! Form::label('quantidade','Quantidade') !!}
        {!! Form::text('quantidade',(isset($acessorio)?$acessorio->qnt:''),['class'=>'form-control',]) !!}
        {!! ($errors->has('quantidade')? "<p class='msg-alerta'>".$errors->first('quantidade')."</p>":"") !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-xs-12">
        {!! Form::label('descricao','Descrição') !!}
        {!! Form::textarea('descricao',(isset($acessorio)?$acessorio->descricao:''),['class'=>'form-control',]) !!}
        {!! ($errors->has('descricao')? "<p class='msg-alerta'>".$errors->first('descricao')."</p>":"") !!}
    </div>
</div>

