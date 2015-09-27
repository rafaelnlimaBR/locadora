<div>
@if(isset($status))
        {!! $status !!}
        @endif
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#dados" aria-controls="dados" role="tab" data-toggle="tab">Home</a></li>
        @if(isset($contrato))
        <li role="presentation"><a href="#acessorio" aria-controls="acessorio" role="tab" data-toggle="tab">Acessório</a></li>
        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
        @endif
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="dados">
            <div class="row">
                <div class="form-group col-lg-6">

                    @if(isset($contrato))
                        {!! Form::hidden('id',$contrato->id) !!}
                    @endif
                    {!! Form::label('cliente','Cliente') !!}
                    {!! Form::text('cliente',(isset($contrato)?$contrato->cliente->nome:''),['class'=>'form-control clientes',]) !!}
                    {!! Form::hidden('id_cliente',(isset($contrato)?$contrato->cliente->id:''),['class'=>'id_cliente']) !!}
                    {!! Form::hidden('status_id',(isset($status)?$status:'')) !!}
                    {!! ($errors->has('id_cliente')? "<p class='msg-alerta'>".$errors->first('id_cliente')."</p>":"") !!}
                </div>
                <div class="form-group col-lg-6">


                    {!! Form::label('veiculo','Veiculo') !!}
                    {!! Form::text('veiculo',(isset($contrato)?$contrato->veiculo->placa:''),['class'=>'form-control veiculos',]) !!}
                    {!! Form::hidden('id_veiculo',(isset($contrato)?$contrato->veiculo->id:''),['class'=>'id_veiculo']) !!}
                    {!! ($errors->has('id_veiculo')? "<p class='msg-alerta'>".$errors->first('id_veiculo')."</p>":"") !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-2">


                    {!! Form::label('dataentrega','Data Entrega') !!}
                    {!! Form::text('dataentrega',(isset($contrato)?date('d-m-Y',strtotime($contrato->data_entrega)):''),['class'=>'form-control','id'=>'data-entrega',]) !!}
                    {!! ($errors->has('dataentrega')? "<p class='msg-alerta'>".$errors->first('dataentrega')."</p>":"") !!}
                </div>
                <div class="form-group col-lg-1">


                    {!! Form::label('horaEntrega','Hora') !!}
                    {!! Form::select('horaEntrega',$horarios, (isset($contrato)?$contrato->hora_entrega:''), ['class'=>'form-control']) !!}
                    {!! ($errors->has('horaEntrega')? "<p class='msg-alerta'>".$errors->first('horaEntrega')."</p>":"") !!}
                </div>
                <div class="form-group col-lg-3">


                    {!! Form::label('patioEntrega','Patio Entrega') !!}
                    {!! Form::select('patioEntrega',$patios, (isset($contrato)?$contrato->patio_entrega:''), ['class'=>'form-control']) !!}
                    {!! ($errors->has('patioEntrega')? "<p class='msg-alerta'>".$errors->first('patioEntrega')."</p>":"") !!}
                </div>
                <div class="form-group col-lg-2">


                    {!! Form::label('datadevolucao','Data Devolucao') !!}
                    {!! Form::text('datadevolucao',(isset($contrato)?date('d-m-Y',strtotime($contrato->data_devolucao)):''),['class'=>'form-control ','id'=>'data-devolucao']) !!}
                    {!! ($errors->has('datadevolucao')? "<p class='msg-alerta'>".$errors->first('datadevolucao')."</p>":"") !!}
                </div>
                <div class="form-group col-lg-1">


                    {!! Form::label('horadevolucao','Horario') !!}
                    {!! Form::select('horadevolucao',$horarios, (isset($contrato)?$contrato->patio_entrega:''), ['class'=>'form-control']) !!}
                    {!! ($errors->has('horadevolucao')? "<p class='msg-alerta'>".$errors->first('horadevolucao')."</p>":"") !!}
                </div>
                <div class="form-group col-lg-3">


                    {!! Form::label('patioDevolucao','Patio Devolução') !!}
                    {!! Form::select('patioDevolucao',$patios, (isset($contrato)?$contrato->patio_entrega:''), ['class'=>'form-control']) !!}
                    {!! ($errors->has('patioDevolucao')? "<p class='msg-alerta'>".$errors->first('patioDevolucao')."</p>":"") !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-12">
                    {!! Form::label('obs','Observação') !!}
                    {!! Form::textarea('obs',(isset($contrato)?$contrato->obs:''),['class'=>'form-control',]) !!}
                    {!! ($errors->has('obs')? "<p class='msg-alerta'>".$errors->first('obs')."</p>":"") !!}
                </div>
            </div>




        </div>
        @if(isset($contrato))
        <div role="tabpanel" class="tab-pane" id="acessorio">...</div>
        <div role="tabpanel" class="tab-pane" id="messages">...</div>
        <div role="tabpanel" class="tab-pane" id="settings">...</div>
        @endif
    </div>

</div>
@if(isset($contrato))
    @if(\App\Configuracao::getConf()->locado_contrato == $contrato->historicos()->ultimoregistro()->first()->status_id)
        <a href="#" class="btn btn-info" data-toggle="modal" data-target="#form-finalizar"> Finalizar</a>

    @elseif(\App\Configuracao::getConf()->pre_contrato == $contrato->historicos()->ultimoregistro()->first()->status_id or  \App\Configuracao::getConf()->reservado_contrato == $contrato->historicos()->ultimoregistro()->first()->status_id)
        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#form-cancelar"> Cancelar</a>
        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#form-locar"> Locar</a>
    @endif


@endif

