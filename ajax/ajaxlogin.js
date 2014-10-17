$(function(){
    $("#frmLogin").submit(function(e){
        e.preventDefault();
  
        var username = $("#username").val();
        var password = $("#password").val();
        $.ajax({
              
            type: "POST",
            data: { username:username, password:password },
              
            url: "ajax/login.php",
            dataType: "html",
            success: function(result){
                if (result.indexOf("Login_Sucessfull") > -1)
                {
                    $("#btnDoLogin").html('Redirecionando...');
					$('#btnDoLogin').addClass("btn-success");
                    $(window.document.location).attr('href','/v2/');
                    return false;
                }else{
                $("#btnDoLogin").html('Usuário ou senha Inválidos!');
                $('#btnDoLogin').addClass("btn-danger");
                }
            },
            beforeSend: function(){
                  
                $('#btnDoLogin').css({class:"btn btn-primary disabled"});
                $("#btnDoLogin").html('Verificando...');
                  
            },
            error: function(){
                $("#btnDoLogin").html('Erro!');
                $('#btnDoLogin').addClass("btn-danger");
            }
        });
        return false;
    });
}); 