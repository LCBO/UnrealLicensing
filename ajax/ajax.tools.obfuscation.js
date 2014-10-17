$(function(){
    $("#frmObfuscate").submit(function(e){
        e.preventDefault();
  
        var txtscript = $("#tobeobfuscated").val();
        $.ajax({
              
            type: "POST",
            data: { txtscript:txtscript },
              
            url: "ajax/ajax.tools.obfuscation.php",
            dataType: "html",
            success: function(result){
				$("#divtobeobfuscated").fadeOut("slow", function(){
					$("#obfuscated").fadeIn("slow")});
				$("#obfuscatedcode").html(result);
                $("#btnObfuscate").html('Done!');
				$('#btnObfuscate').addClass("btn-success");
            },
            beforeSend: function(){
                  
                $('#btnObfuscate').addClass("disabled");
                $("#btnObfuscate").html('Processing...');
                  
            },
            error: function(){
                $("#btnObfuscate").html('Internal Error!');
                $('#btnObfuscate').addClass("btn-danger");
            }
        });
        return false;
    });
}); 