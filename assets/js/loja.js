function detalhesFabricante(id){
    $.ajax({
        url: BASE_URL+"/fabricante/detalhes_json/"+id,
        dataType: 'json',
        beforeSend: carregando()
    }).done(function(dados){
        console.log(dados.fabricante);
        $("#dados-ajax").html("");
        $("#dados-ajax").append("Codigo: "+ dados.codfabricante);
        $("#dados-ajax").append("<br/>");
        $("#dados-ajax").append("Fabricante: "+ dados.fabricante);
    });
}

function carregando(){
    $("#dados-ajax").html("");
    $("#dados-ajax").append("Carregando...");
}

function novoFabricante(){
    $("#dados-ajax").html("");
    $("#exampleModalLabel").html("Novo Fabricante");
    $("#dados-ajax").append("Fabricante: <input type='text' id='fabricante'><br/>");
    $("#botao-salvar").attr("onclick", "salvarFabricante()");
    $("#botao-salvar").css('display', 'block');
}

function salvarFabricante(){
    $.ajax({
        url: BASE_URL+"/fabricante/salvar_json",
        method: "post",
        dataType: 'json',
        data: {
            nome_fabricante:  $("#fabricante").val()
        }
    }).done(function(dados){
        $("#exampleModalLabel").html(dados.titulo);
        $("#dados-ajax").html(dados.conteudo);
        $("#botao-salvar").css('display', 'none');
    });    
}

function editarFabricante(id){
    $("#dados-ajax").html("");
    $("#exampleModalLabel").html("Editar Fabricante");
    $("#dados-ajax").append("Código: <input type='text' id='codfabricante' disabled><br/>");
    $("#dados-ajax").append("Fabricante: <input type='text' id='fabricante'><br/>");
    $("#botao-salvar").attr("onclick", "modificarFabricante()");
    $("#botao-salvar").css('display', 'block');
    
    $.ajax({
        url: BASE_URL+"/fabricante/detalhes_json/"+id,
        dataType: 'json'
    }).done(function(dados){
        console.log(dados.fabricante);
        $("#codfabricante").val(dados.codfabricante);
        $("#fabricante").val(dados.fabricante);
    }).fail(function(dados){
        console.log("Não foi :(");
    });
}


function modificarFabricante(){
    $.ajax({
        url: "SEU_BASE_URL_AQUI/fabricante/modificar_json",
        method: "post",
        dataType: 'json',
        data: {
            nome_fabricante:  $("#fabricante").val(),
            cod_fabricante:  $("#codfabricante").val()
        }
    }).done(function(dados){
        $("#exampleModalLabel").html(dados.titulo);
        $("#dados-ajax").html(dados.conteudo);
        $("#botao-salvar").css('display', 'none');
    });    
}
