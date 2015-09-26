{{--FORMULARIO MODAL PARA EXCLUSÃO--}}

<div class="modal fade" id="form-cancelar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      {!! Form::open((['route'=>['reparo.cancelar'],'method'=>'post','name'=>'excluir'])) !!}
      <div class="modal-header ">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cancelamento</h4>
      </div>
      <div class="modal-body">
      {!! Form::hidden('id',$reparo->id,['id'=>'id']) !!}
      {!! Form::hidden('idveiculo',$reparo->veiculo->id) !!}
        <h6>Deseja realmente cancelar esse registor?</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
        <button type="submit"  class="btn btn-danger">Cancelar</button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>


