@if(isset($veiculo))
    <table class="table table-bordered table-hover">
        <thead>
        <tr>

            <th style="width: 50%">Patio</th>
            <th style="width: 16%">Cidade</th>
            <th style="width: 16%">Estado</th>

            <th style="width: 5%;"></th>

        </tr>
        </thead>
        <tbody>
        @foreach($veiculo->patios as $r)
            <tr>
                <td>{!! $r->nome !!}</td>
                <td>{!! $r->cidade !!}</td>
                <td>{!! $r->estado !!}</td>

                <td><a href="#" class="btn btn-social-icon btn-danger excluir-patios" excluir="{!! $r->id !!}"> <i class="fa fa-trash-o"></i></a></td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th >Patio</th>
            <th >Cidade</th>
            <th >Estado</th>

            <th ></th>
        </tr>
        </tfoot>
    </table>
    <script type="text/javascript">

        $(document).ready(function(){
            var URL = $('#url').val();

            $('.excluir-patios').click(function(){
                var idPatio         =   $(this).attr('excluir');
                var idVeiculo       =   $('#id-veiculo').val();
                var token           =   $("input[name=_token]").val();

                $.ajax({
                    url: URL+'/admin/veiculo/removerpatio',
                    headers: {'X-CSRF-TOKEN': token},
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'patio_id'      :   idPatio,
                        'veiculo_id'    :   idVeiculo
                    },
                    success:function(data){
                        if('error' in data){
                            alert(data.error);
                        }else{
                            $('#tabela-patios').html(data.html);
                        }
                    }
                });
                return false;
            });
        });
    </script>
@endif