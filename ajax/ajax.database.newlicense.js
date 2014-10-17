$(function(){
    $("#frmEditLicense").submit(function(e){
        e.preventDefault();
  
        var id = $("#id").val();
        var domain = $("#domain").val();
		var expiry_date = $("#expiry_date").val();
		var customer_email = $("#customer_email").val();
		var product = $("#product").val();
		var details = $("#details").val();
        $.ajax({
              
            type: "GET",
            data: { id:id, domain:domain, product:product, expiry_date:expiry_date, customer_email:customer_email, details:details },
              
            url: "ajax/ajax.database.newlicense.php",
            dataType: "html",
            success: function(result){
                if (result.indexOf("Success") > -1)
                {
                    $("#btnSave").html('Successfully Added!!...');
					$('#btnSave').addClass("btn-success");
                    $(window.document.location).attr('href','licenses.php');
                    return false;
                }else{
                $("#btnSave").html('Saving Error!');
                $('#btnSave').addClass("btn-danger");
                }
            },
            beforeSend: function(){
                  
                $('#btnSave').addClass("disabled");
                $("#btnSave").html('Processing...');
                  
            },
            error: function(){
                $("#btnSave").html('Internal Error!');
                $('#btnSave').addClass("btn-danger");
            }
        });
        return false;
    });
}); 