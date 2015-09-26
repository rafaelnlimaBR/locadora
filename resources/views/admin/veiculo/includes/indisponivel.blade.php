{{--FORMULARIO MODAL PARA EXCLUSÃO--}}

<div class="modal fade" id="form-indisponivel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      {!! Form::open((['route'=>['veiculo.indisponibilizar'],'method'=>'post','name'=>'excluir'])) !!}
      <div class="modal-header ">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Indisponibilizar</h4>
      </div>
      <div class="modal-body">
      {!! Form::hidden('id',$veiculo->id) !!}
        <h6>O status do veículo será alterado para indisponivel e não sera mais possível fazer buscar para esse veículo</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit"  class="btn btn-danger">Indisponibilizar</button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>


