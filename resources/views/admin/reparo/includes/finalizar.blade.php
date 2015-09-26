{{--FORMULARIO MODAL PARA EXCLUSÃO--}}

<div class="modal fade" id="form-finalizar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      {!! Form::open((['route'=>['reparo.finalizar'],'method'=>'post','name'=>'excluir'])) !!}
      <div class="modal-header ">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Finalizar</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="form-group col-xs-4">

            {!! Form::label('valor','Valor') !!}
            {!! Form::text('valor',(isset($reparo)?$reparo->valor:''),['class'=>'form-control',]) !!}
            {!! Form::hidden('id',$reparo->id,['id'=>'id']) !!}
            {!! Form::hidden('idveiculo',$reparo->veiculo->id) !!}
            {!! ($errors->has('valor')? "<p class='msg-alerta'>".$errors->first('valor')."</p>":"") !!}
          </div>
        </div>
        <div class="row">
          <div class="form-group col-xs-12">

            {!! Form::label('solucao','Solução') !!}
            {!! Form::textarea('solucao',(isset($reparo)?$reparo->solucao:''),['class'=>'form-control ',]) !!}
            {!! ($errors->has('solucao')? "<p class='msg-alerta'>".$errors->first('solucao')."</p>":"") !!}
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit"  class="btn btn-success">Finalizar</button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>


