<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#dados" href="#dados" aria-expanded="true" aria-controls="collapseOne">
                    Dados da Empresa
                </a>
            </h4>
        </div>
        <div id="dados" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
                <div class="row">
                    <div class="form-group col-xs-7">
                        {!! Form::label('empresa','Nome Empresa') !!}
                        {!! Form::text('empresa',(isset($conf)?$conf->empresa:''),['class'=>'form-control',]) !!}
                        {!! ($errors->has('empresa')? "<p class='msg-alerta'>".$errors->first('empresa')."</p>":"") !!}
                    </div>
                    <div class="form-group col-xs-3">
                        {!! Form::label('breve','Nome Breve da Empresa') !!}
                        {!! Form::text('breve',(isset($conf)?$conf->breve:''),['class'=>'form-control',]) !!}
                        {!! ($errors->has('breve')? "<p class='msg-alerta'>".$errors->first('breve')."</p>":"") !!}
                    </div>
                    <div class="form-group col-xs-2">
                        {!! Form::label('cnpj','CNPJ') !!}
                        {!! Form::text('cnpj',(isset($conf)?$conf->cnpj:''),['class'=>'form-control',]) !!}
                        {!! ($errors->has('cnpj')? "<p class='msg-alerta'>".$errors->first('cnpj')."</p>":"") !!}
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-2">
                        {!! Form::label('cep','Cep') !!}
                        {!! Form::text('cep',(isset($conf)?$conf->cep:''),['class'=>'form-control cep',]) !!}
                        {!! ($errors->has('cep')? "<p class='msg-alerta'>".$errors->first('cep')."</p>":"") !!}
                    </div>
                    <div class="form-group col-xs-4">
                        {!! Form::label('logradouro','Logradouro') !!}
                        {!! Form::text('logradouro',(isset($conf)?$conf->endereco:''),['class'=>'form-control',]) !!}
                        {!! ($errors->has('logradouro')? "<p class='msg-alerta'>".$errors->first('logradouro')."</p>":"") !!}
                    </div>
                    <div class="form-group col-xs-2">
                        {!! Form::label('bairro','Bairro') !!}
                        {!! Form::text('bairro',(isset($conf)?$conf->bairro:''),['class'=>'form-control',]) !!}
                        {!! ($errors->has('bairro')? "<p class='msg-alerta'>".$errors->first('bairro')."</p>":"") !!}
                    </div>
                    <div class="form-group col-xs-3">
                        {!! Form::label('cidade','Cidade') !!}
                        {!! Form::text('cidade',(isset($conf)?$conf->cidade:''),['class'=>'form-control',]) !!}
                        {!! ($errors->has('cidade')? "<p class='msg-alerta'>".$errors->first('cidade')."</p>":"") !!}
                    </div>
                    <div class="form-group col-xs-1">
                        {!! Form::label('uf','UF') !!}
                        {!! Form::text('uf',(isset($conf)?$conf->estado:''),['class'=>'form-control',]) !!}
                        {!! ($errors->has('uf')? "<p class='msg-alerta'>".$errors->first('uf')."</p>":"") !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Veiculo
                </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
                <div class="form-group col-xs-2">
                    {!! Form::label('novo_veiculo','Novo') !!}
                    {!! Form::select('novo_veiculo',$statusVeiculos, (isset($conf)?$conf->veiculo_novo :1), ['class'=>'form-control']) !!}
                    {!! ($errors->has('novo_veiculo')? "<p class='msg-alerta'>".$errors->first('novo_veiculo')."</p>":"") !!}
                </div>
                <div class="form-group col-xs-2">
                    {!! Form::label('reparo_veiculo','Reparo') !!}
                    {!! Form::select('reparo_veiculo',$statusVeiculos, (isset($conf)?$conf->veiculo_reparo :1), ['class'=>'form-control']) !!}
                    {!! ($errors->has('reparo_veiculo')? "<p class='msg-alerta'>".$errors->first('reparo_veiculo')."</p>":"") !!}
                </div>
                <div class="form-group col-xs-2">
                    {!! Form::label('locado_veiculo','Locado') !!}
                    {!! Form::select('locado_veiculo',$statusVeiculos, (isset($conf)?$conf->veiculo_locado :1), ['class'=>'form-control']) !!}
                    {!! ($errors->has('locado_veiculo')? "<p class='msg-alerta'>".$errors->first('locado_veiculo')."</p>":"") !!}
                </div>
                <div class="form-group col-xs-2">
                    {!! Form::label('prereservado_veiculo','Pre-Reservado') !!}
                    {!! Form::select('prereservado_veiculo',$statusVeiculos, (isset($conf)?$conf->veiculo_prereservado :1), ['class'=>'form-control']) !!}
                    {!! ($errors->has('prereservado_veiculo')? "<p class='msg-alerta'>".$errors->first('prereservado_veiculo')."</p>":"") !!}
                </div>
                <div class="form-group col-xs-2">
                    {!! Form::label('reservado_veiculo','Reservado') !!}
                    {!! Form::select('reservado_veiculo',$statusVeiculos, (isset($conf)?$conf->veiculo_reservado :1), ['class'=>'form-control']) !!}
                    {!! ($errors->has('reservado_veiculo')? "<p class='msg-alerta'>".$errors->first('reservado_veiculo')."</p>":"") !!}
                </div>
                <div class="form-group col-xs-2">
                    {!! Form::label('disponivel_veiculo','Disponível') !!}
                    {!! Form::select('disponivel_veiculo',$statusVeiculos, (isset($conf)?$conf->veiculo_disponivel :1), ['class'=>'form-control']) !!}
                    {!! ($errors->has('disponivel_veiculo')? "<p class='msg-alerta'>".$errors->first('disponivel_veiculo')."</p>":"") !!}
                </div>
                <div class="form-group col-xs-2">
                    {!! Form::label('indisponivel_veiculo','Indisponível') !!}
                    {!! Form::select('indisponivel_veiculo',$statusVeiculos, (isset($conf)?$conf->veiculo_indisponivel :1), ['class'=>'form-control']) !!}
                    {!! ($errors->has('indisponivel_veiculo')? "<p class='msg-alerta'>".$errors->first('indisponivel_veiculo')."</p>":"") !!}
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#reparo" aria-expanded="false" aria-controls="reparo">
                    Reparo
                </a>
            </h4>
        </div>
        <div id="reparo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
                <div class="form-group col-xs-2">
                    {!! Form::label('novo_reparo','Novo') !!}
                    {!! Form::select('novo_reparo',$statusReparos, (isset($conf)?$conf->reparo_novo :1), ['class'=>'form-control']) !!}

                </div>
                <div class="form-group col-xs-2">
                    {!! Form::label('cancelado_reparo','Cancelado') !!}
                    {!! Form::select('cancelado_reparo',$statusReparos, (isset($conf)?$conf->reparo_cancelado :1), ['class'=>'form-control']) !!}

                </div>
                <div class="form-group col-xs-2">
                    {!! Form::label('finalizado_reparo','Finalizado') !!}
                    {!! Form::select('finalizado_reparo',$statusReparos, (isset($conf)?$conf->reparo_concluido :1), ['class'=>'form-control']) !!}

                </div>

            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#cliente" aria-expanded="false" aria-controls="reparo">
                    Cliente
                </a>
            </h4>
        </div>
        <div id="cliente" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
                <div class="form-group col-xs-2">
                    {!! Form::label('novo_cliente','Novo') !!}
                    {!! Form::select('novo_cliente',$statusClientes, (isset($conf)?$conf->novo_cliente :1), ['class'=>'form-control']) !!}

                </div>
                <div class="form-group col-xs-2">
                    {!! Form::label('pre_cliente','Pre-Cadastrado') !!}
                    {!! Form::select('pre_cliente',$statusClientes, (isset($conf)?$conf->pre_cliente :1), ['class'=>'form-control']) !!}

                </div>
                <div class="form-group col-xs-2">
                    {!! Form::label('inadimplente_cliente','Inadimplante') !!}
                    {!! Form::select('inadimplente_cliente',$statusClientes, (isset($conf)?$conf->inadimplente_cliente :1), ['class'=>'form-control']) !!}

                </div>
                <div class="form-group col-xs-2">
                    {!! Form::label('indisponivel_cliente','Indisponível') !!}
                    {!! Form::select('indisponivel_cliente',$statusClientes, (isset($conf)?$conf->indisponivel_cliente :1), ['class'=>'form-control']) !!}

                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#contrato" aria-expanded="false" aria-controls="reparo">
                    Contrato
                </a>
            </h4>
        </div>
        <div id="contrato" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
                <div class="form-group col-xs-2">
                    {!! Form::label('locado_contrato','Locado') !!}
                    {!! Form::select('locado_contrato',$statusContratos, (isset($conf)?$conf->locado_contrato :1), ['class'=>'form-control']) !!}

                </div>
                <div class="form-group col-xs-2">
                    {!! Form::label('cancelado_contrato','Cancelado') !!}
                    {!! Form::select('cancelado_contrato',$statusContratos, (isset($conf)?$conf->cancelado_contrato :1), ['class'=>'form-control']) !!}

                </div>
                <div class="form-group col-xs-2">
                    {!! Form::label('concluido_contrato','Concluido') !!}
                    {!! Form::select('concluido_contrato',$statusContratos, (isset($conf)?$conf->concluido_contrato :1), ['class'=>'form-control']) !!}

                </div>
                <div class="form-group col-xs-2">
                    {!! Form::label('pre_contrato','Pre-Reservado') !!}
                    {!! Form::select('pre_contrato',$statusContratos, (isset($conf)?$conf->pre_contrato :1), ['class'=>'form-control']) !!}

                </div>
            </div>
        </div>
    </div>

</div>