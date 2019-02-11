$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$("#formCard").submit(function(event){
    event.preventDefault()
    if($("#formCard #nome").val() == '') {
        $('#nome').addClass('is-invalid');
    }

    if($("#formCard #descricao").val() == '')
        $('#descricao').addClass('is-invalid');


    var card =  {
                    nome: $("#formCard #nome").val(),
                    descricao:$("#formCard #descricao").val()
                }
     $.post('/cards',card, function(data){
         listarCards();
         $("#formCard").get(0).reset();
     });

});

function cadastrarUsuario(){
    var usuario =  {
        nome: $("#formCadUsuario #nome").val()
    }
    console.log(usuario);
    $.post('/usuarios',usuario, function(data){
        console.log(data);
        $(".modal").modal('hide');
        $("#formCadUsuario").get(0).reset();
    });
}

function listarCards(){
    $.getJSON('/cards/all',function(cards){

        var html = '';
        for(var i=0;i< cards.length;i++){
            html+='<div id="card-'+cards[i].id+'" class="card border-dark mb-3" >\n' +
                '        <div class="card-header"  style="cursor:pointer "onclick="verificaCard('+cards[i].id+');">'+cards[i].nome+' </div>\n' +
                '        <div id="title" class="card-body text-dark" style="display: none">\n' +
                '            <p class="card-text">'+cards[i].descricao+'</p>\n' +
                '            <a href="javascript:excluir('+cards[i].id+')" style="margin-left:240px;"><img style="margin-top: 6px;" src="images/icon-trash.png" width="15" height="15"></a>\n' +
                '        </div>\n' +
                '\n' +
                '    </div>';
        }
        $("#divCards").html(html);
    });
}

function excluir(id_card){
    $.get('/cards/delete/'+id_card,function (data) {
       listarCards();
    });
}

function verificaCard(id_card){
    if($('#card-'+id_card+' .card-body').is(':visible')){
        $('#card-'+id_card+' .card-body').hide();
    }else
        $('#card-'+id_card+' .card-body').show();
}


$(function (){
    listarCards();

    $("#formCard #nome").focus(function (){
        $("#formCard #descricao").show();
        $("#formCard #errorDescricao").show();
    });

    $("#formCard #nome").blur(function (){
        if($("#formCard #nome").val() == ''){
            $("#formCard #descricao").hide();
            $("#formCard #errorDescricao").hide();
        }

    });

    $("#formCard #descricao").blur(function (){
        if($("#formCard #nome").val() == ''){
            $("#formCard #descricao").hide();
            $("#formCard #errorDescricao").hide();
        }

    });
});

