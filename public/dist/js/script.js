$(document).ready(function (){

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


    $('.patios').autocomplete({
        source: function(request , response){
            $.get(URL+'/admin/patio/pesquisaajax/'+request.term,function(data){
                response ($.map(data.slice(0,5),function(item){
                    return {
                        label:item.nome+" | "+item.cidade,
                        value:item.nome,
                        id:item.id
                    }
                }));
            });
        },
        select:function (event, ui){
            $('.idpatio').val(ui.item.id);
            $('.patios').val('');
        }
    });
    $('#botaopatiopesquisa').click(function(){

        var idpatio         =   $(".idpatio").val();
        var idveiculo       =   $('#id-veiculo').val();
        var token           =   $("input[name=_token]").val();

        if(idpatio == 0){
            alert("Selecione um patio.");
            $('.idpatio').onfocus();
        }else{
            $.ajax({
                url: URL+'/admin/veiculo/adicionarpatio',
                headers: {'X-CSRF-TOKEN': token},
                type: 'POST',
                dataType: 'json',
                data: {
                    'patio_id'      :   idpatio,
                    'veiculo_id'    :   idveiculo
                },
                success:function(data){
                    if('error' in data){
                        alert('Não foi possível adicionar.\n '+data.error);
                    }else{
                        $('#tabela-patios').html(data.html);
                    }
                }
            });

        }
    });
    //$( "#descricao-servico" ).autocomplete({
    //    source: function (request, response){
    //        var descricao = $('#descricao-servico').val();
    //        $.post(dominio+'/admin/servico/pesquisar',{"descricao" : descricao}, function(data, status){
    //            response($.map(data.slice(0, 5), function(item){
    //                return {
    //                    label:item.descricao+' | '+item.valor,
    //                    value:item.descricao,
    //                    id:item.id,
    //                    valor:item.valor,
    //
    //                };
    //            }));
    //
    //        });
    //    },
    //    select:function (event, ui){
    //        $('#id-servico').val(ui.item.id);
    //        $('#valor-servico').val(ui.item.valor);
    //        $('#novovalor-servico').val(ui.item.valor);
    //
    //    }
    //});
});