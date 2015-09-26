<div>

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
                    {!! ($errors->has('cliente')? "<p class='msg-alerta'>".$errors->first('cliente')."</p>":"") !!}
                </div>
                <div class="form-group col-lg-6">


                    {!! Form::label('veiculo','Veiculo') !!}
                    {!! Form::text('veiculo',(isset($contrato)?$contrato->veiculo->placa:''),['class'=>'form-control veiculos',]) !!}
                    {!! Form::hidden('id_veiculo',(isset($contrato)?$contrato->veiculo->id:''),['class'=>'id_veiculo']) !!}
                    {!! ($errors->has('veiculo')? "<p class='msg-alerta'>".$errors->first('veiculo')."</p>":"") !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-2">


                    {!! Form::label('dataentrega','Data Entrega') !!}
                    {!! Form::text('dataentrega',(isset($contrato)?$contrato->data_entrega:''),['class'=>'form-control','id'=>'data-entrega',]) !!}
                    {!! ($errors->has('dataentrega')? "<p class='msg-alerta'>".$errors->first('dataentrega')."</p>":"") !!}
                </div>
                <div class="form-group col-lg-1">


                    {!! Form::label('horaEntrega','Hora') !!}
                    {!! Form::select('horaEntrega',$horarios, (isset($contrato)?$contrato->patio_entrega:''), ['class'=>'form-control']) !!}
                    {!! ($errors->has('horaEntrega')? "<p class='msg-alerta'>".$errors->first('horaEntrega')."</p>":"") !!}
                </div>
                <div class="form-group col-lg-3">


                    {!! Form::label('patioEntrega','Patio Entrega') !!}
                    {!! Form::select('patioEntrega',$patios, (isset($contrato)?$contrato->patio_entrega:''), ['class'=>'form-control']) !!}
                    {!! ($errors->has('patioEntrega')? "<p class='msg-alerta'>".$errors->first('patioEntrega')."</p>":"") !!}
                </div>
                <div class="form-group col-lg-2">


                    {!! Form::label('dataentrega','Data Entrega') !!}
                    {!! Form::text('dataentrega',(isset($contrato)?$contrato->data_entrega:''),['class'=>'form-control veiculos','id'=>'data-devolucao']) !!}
                    {!! ($errors->has('dataentrega')? "<p class='msg-alerta'>".$errors->first('dataentrega')."</p>":"") !!}
                </div>
                <div class="form-group col-lg-1">


                    {!! Form::label('patioDevolucao','Horario') !!}
                    {!! Form::select('patioDevolucao',$horarios, (isset($contrato)?$contrato->patio_entrega:''), ['class'=>'form-control']) !!}
                    {!! ($errors->has('patioDevolucao')? "<p class='msg-alerta'>".$errors->first('patioDevolucao')."</p>":"") !!}
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
                    {!! Form::textarea('obs',(isset($contrato)?$contrato->obs:''),['class'=>'form-control veiculos',]) !!}
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

