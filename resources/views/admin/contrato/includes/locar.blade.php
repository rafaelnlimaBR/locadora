{{--FORMULARIO MODAL PARA EXCLUSÃO--}}

<div class="modal fade" id="form-locar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      {!! Form::open((['route'=>['contrato.locar'],'method'=>'post','name'=>'excluir'])) !!}
      <div class="modal-header ">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Excluir</h4>
      </div>
      <div class="modal-body">
      {!! Form::hidden('id',$contrato->id,['id'=>'id']) !!}
        <h6></h6>
        <div class="form-group col-lg-12">
          {!! Form::label('descricao','Motivo do cancelamento') !!}
          {!! Form::textarea('descricao','',['class'=>'form-control',]) !!}
          {!! ($errors->has('descricao')? "<p class='msg-alerta'>".$errors->first('descricao')."</p>":"") !!}
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit"  class="btn btn-danger">Excluir</button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>


