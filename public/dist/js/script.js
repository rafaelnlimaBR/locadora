$(document).ready(function (){
    var diasMin =   [ "Do", "Se", "Te", "Qu", "Qi", "Se", "Sa" ];
    var dias    =   [ "Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sabado" ];
    var mes     =  [ "Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez" ];
    var formato =   "dd/mm/yy";
    $('#data-entrega').datepicker({
        numberOfMonths: 3,
        showButtonPanel: true,
        changeMonth: true,
        dayNamesMin: diasMin,
        dayNames: dias,
        autoSize: true,
        monthNamesShort: mes,
        dateFormat: formato
    });
    $('#data-devolucao').datepicker({
        numberOfMonths: 3,
        showButtonPanel: true,
        changeMonth: true,
        dayNamesMin: diasMin,
        dayNames: dias,
        autoSize: true,
        monthNamesShort: mes,
        dateFormat: formato
    });


    var URL = $('#url').val();


    $('.cep').blur(function () {
        var cep = $(this).val();

        $.get("https://viacep.com.br/ws/"+cep+"/json/", function (data) {
            $('.numero').focus();
            $('.bairro').val(data.bairro);
            $('.cidade').val(data.localidade);
            $('.uf').val(data.uf);
            $('.endereco').val(data.logradouro);

        })
    });

    $('.excluir').click(function(){

        var id = $(this).attr('excluir');

        $('#id').val(id);

    });
    $('.check-formulario-grupo').change(function () {
        $(this).find('.corpo-formulario-grupo').hide();
    })



    $('.veiculos').autocomplete({
        source: function(request , response){
            $.get(URL+'/admin/veiculo/pesquisaajax/'+request.term,function(data){

                response ($.map(data.slice(0,5),function(item){
                    return {
                        label:item.placa,
                        value:item.placa,
                        id:item.id
                    }
                }));
            });
        },
        select:function (event, ui){
            $('.id_veiculo').val(ui.item.id);

        }
    });
    $('.clientes').autocomplete({
        source: function(request , response){
            $.get(URL+'/admin/cliente/pesquisaajax/'+request.term,function(data){

                response ($.map(data.slice(0,5),function(item){
                    return {
                        label:item.nome,
                        value:item.nome,
                        id:item.id
                    }
                }));
            });
        },
        select:function (event, ui){
            $('.id_cliente').val(ui.item.id);

        }
    });
    $('.oficinas').autocomplete({
        source: function(request , response){
            $.get(URL+'/admin/oficina/pesquisaajax/'+request.term,function(data){

                response ($.map(data.slice(0,5),function(item){
                    return {
                        label:item.nome,
                        value:item.nome,
                        id:item.id
                    }
                }));
            });
        },
        select:function (event, ui){
            $('.id_oficina').val(ui.item.id);

        }
    });

});