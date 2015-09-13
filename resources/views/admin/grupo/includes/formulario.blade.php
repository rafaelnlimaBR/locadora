
<div class="row">
    <div class="form-group col-xs-8">

        @if(isset($grupo))
            {!! Form::hidden('id',$grupo->id) !!}
        @endif
        {!! Form::label('nome','Nome') !!}
        {!! Form::text('nome',(isset($grupo)?$grupo->nome:''),['class'=>'form-control',]) !!}
        {!! ($errors->has('nome')? "<p class='msg-alerta'>".$errors->first('nome')."</p>":"") !!}
    </div>
    <div class="form-group col-xs-4">
        {!! Form::label('situacao','Situação') !!}
        {!! Form::select('situacao',[0  =>  'Inativo',1 =>  'Ativo'], (isset($grupo)?$grupo->situacao:1), ['class'=>'form-control']) !!}
        {!! ($errors->has('situacao')? "<p class='msg-alerta'>".$errors->first('situacao')."</p>":"") !!}
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#usuario" aria-expanded="false" aria-controls="collapseThree">
                            Página Usuário
                        </a>
                    </h4>
                </div>
                <div id="usuario" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
                        <div class="form-group col-xs-2">
                            {!! Form::label('usu-vis','Visualizar') !!}
                            {!! Form::select('usu-vis',[0  =>  'Não',1 =>  'Sim'], (isset($grupo)?(unserialize($grupo->usuario)['vis']):0), ['class'=>'form-control']) !!}

                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('usu-cad','Cadastrar') !!}
                            {!! Form::select('usu-cad',[0  =>  'Não',1 =>  'Sim'], (isset($grupo)?(unserialize($grupo->usuario)['cad']):0), ['class'=>'form-control']) !!}

                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('usu-edi','Editar') !!}
                            {!! Form::select('usu-edi',[0  =>  'Não',1 =>  'Sim'], (isset($grupo)?(unserialize($grupo->usuario)['edi']):0), ['class'=>'form-control']) !!}

                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('usu-exc','Excluir') !!}
                            {!! Form::select('usu-exc',[0  =>  'Não',1 =>  'Sim'], (isset($grupo)?(unserialize($grupo->usuario)['exc']):0), ['class'=>'form-control']) !!}

                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('usu-det','Detalhar') !!}
                            {!! Form::select('usu-det',[0  =>  'Não',1 =>  'Sim'], (isset($grupo)?(unserialize($grupo->usuario)['det']):0), ['class'=>'form-control']) !!}

                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#grupo" aria-expanded="false" aria-controls="collapseThree">
                            Página Grupo
                        </a>
                    </h4>
                </div>
                <div id="grupo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
                        <div class="form-group col-xs-2">
                            {!! Form::label('gru-vis','Visualizar') !!}
                            {!! Form::select('gru-vis',[0  =>  'Não',1 =>  'Sim'], (isset($grupo)?(unserialize($grupo->grupo)['vis']):0), ['class'=>'form-control']) !!}

                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('gru-cad','Cadastrar') !!}
                            {!! Form::select('gru-cad',[0  =>  'Não',1 =>  'Sim'], (isset($grupo)?(unserialize($grupo->usuario)['cad']):0), ['class'=>'form-control']) !!}

                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('gru-edi','Editar') !!}
                            {!! Form::select('gru-edi',[0  =>  'Não',1 =>  'Sim'], (isset($grupo)?(unserialize($grupo->usuario)['edi']):0), ['class'=>'form-control']) !!}

                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('gru-exc','Excluir') !!}
                            {!! Form::select('gru-exc',[0  =>  'Não',1 =>  'Sim'], (isset($grupo)?(unserialize($grupo->usuario)['exc']):0), ['class'=>'form-control']) !!}

                        </div>
                        <div class="form-group col-xs-2">
                            {!! Form::label('gru-det','Detalhar') !!}
                            {!! Form::select('gru-det',[0  =>  'Não',1 =>  'Sim'], (isset($grupo)?(unserialize($grupo->usuario)['det']):0), ['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
