$(function(){
    $("#frmGenerateClass").submit(function(e){
        e.preventDefault();
  
        var product = $("#product").val();
        $.ajax({
              
            type: "POST",
            data: { product:product },
              
            url: "ajax/ajax.tools.generateclass.php",
            dataType: "html",
            success: function(result){
				$("#InformationControls").fadeOut("slow", function(){
					$("#code").fadeIn("slow")});
				$("#classcode").html(result);
                $("#btnGenerate").html('Done!');
				$('#btnGenerate').addClass("btn-success");
            },
            beforeSend: function(){
                  
                $('#btnGenerate').addClass("disabled");
                $("#btnGenerate").html('Processing...');
                  
            },
            error: function(){
                $("#btnGenerate").html('Internal Error!');
                $('#btnGenerate').addClass("btn-danger");
            }
        });
        return false;
    });
}); 