function loginGoogle(usuarioLogado){
    var logoff = $("#logoff").val();
    if (logoff == "S"){
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
            auth2.disconnect();
        });
        window.location.href=BASE_URL;
    }else{
        var perfilDoUsuario = usuarioLogado.getBasicProfile();

        $.ajax({
            url: BASE_URL+"/usuario/autenticar",
            method: 'post',
            data: {
                nome: perfilDoUsuario.getName(),
                login: perfilDoUsuario.getEmail(),
                foto: perfilDoUsuario.getImageUrl(),
                tipo_login: "api"
            },
            dataType: 'json'
        }).done(function(dados){
            window.location.href=BASE_URL;
        });
    }
}
 

var suap = new SuapClient(SUAP_URL, CLIENT_ID, REDIRECT_URI, SCOPE);
suap.init();
$("#suap-login-button").attr("href", suap.getLoginURL());
var logoff = $("#logoff").val();

if (logoff == "S" && suap.isAuthenticated()){
    suap.logout();
}

if (suap.isAuthenticated()){
    var escopos = suap.getToken().getScope();
    suap.getResource(escopos, respostaSUAP);
}

function respostaSUAP(dados){
    $.ajax({
        url: BASE_URL+"/usuario/autenticar",
        method: "post",
        data: {
            tipo_login: "api",
            nome: dados.identificacao,
            login: dados.email,
            foto: ""
        },
        dataType: 'json'
    }).done(function(){
        window.location.href=BASE_URL;
    });
}
