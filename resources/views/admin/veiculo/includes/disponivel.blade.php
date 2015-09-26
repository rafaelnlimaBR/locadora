{{--FORMULARIO MODAL PARA EXCLUSÃO--}}

<div class="modal fade" id="form-disponivel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      {!! Form::open((['route'=>['veiculo.disponivel'],'method'=>'post','name'=>'excluir'])) !!}
      <div class="modal-header ">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Disponibilizar</h4>
      </div>
      <div class="modal-body">
      {!! Form::hidden('id',$veiculo->id) !!}
        <h6>O status do veículo será alterado para disponivel</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit"  class="btn btn-success">Disponibilizar</button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>


