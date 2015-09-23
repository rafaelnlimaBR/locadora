<div>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs " role="tablist">
        <li role="presentation" class="active"><a href="#dados" aria-controls="dados" role="tab" data-toggle="tab">Dados</a></li>
        @if(isset($veiculo))
            <li role="presentation"><a href="#pesquisa" aria-controls="pesquisa" role="tab" data-toggle="tab">Pesquisa</a></li>
        @endif


    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="dados">
            <div class="row">
                <div class="form-group col-xs-2">

                    @if(isset($veiculo))
                        {!! Form::hidden('id',$veiculo->id,['id'=>'id-veiculo']) !!}
                    @endif
                    {!! Form::label('placa','Placa') !!}
                    {!! Form::text('placa',(isset($veiculo)?$veiculo->placa:''),['class'=>'form-control',]) !!}
                    {!! ($errors->has('placa')? "<p class='msg-alerta'>".$errors->first('placa')."</p>":"") !!}
                </div>
                <div class="form-group col-xs-3">

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
                <div class="form-group col-xs-2">

                    {!! Form::label('situacao','Situação') !!}
                    {!! Form::select('situacao',[0=>'Inativo',1=>'Ativo'], (isset($veiculo)?$veiculo->situacao:1), ['class'=>'form-control']) !!}
                    {!! ($errors->has('situacao')? "<p class='msg-alerta'>".$errors->first('situacao')."</p>":"") !!}
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


        </div>
        <div role="tabpanel" class="tab-pane" id="pesquisa">

            <div class="row">
                <div class="form-group col-xs-4">


                    <label>Patios</label>
                    <input type="text" class="form-control patios">

                    <input type="hidden" name="csrf-token" class="idpatio" id="idpatio" value="0">
                    <input type="hidden" class="token" id="token" value="{!! csrf_token() !!}">
                </div>
                <div class="form-group col-xs-2">

                    <label>.</label>
                    <button type="button" class="btn btn-success form-control" id="botaopatiopesquisa">Adicionar</button>

                </div>
            </div>
            <div id="tabela-patios" >
                @include('admin.veiculo.includes.patios')
            </div>
        </div>
    </div>

</div>
