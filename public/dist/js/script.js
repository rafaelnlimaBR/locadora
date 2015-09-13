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