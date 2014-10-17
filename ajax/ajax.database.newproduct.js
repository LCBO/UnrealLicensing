$(function(){
    $("#frmNewProduct").submit(function(e){
        e.preventDefault();
  
        var product_fullname = $("#product_fullname").val();
        var product_price = $("#product_price").val();
		var recurring_frequency = $("#recurring_frequency").val();
		var paypalemail = $("#paypalemail").val();
		var trial_period = $("#trial_period").val();
		var downloadlink = $("#downloadlink").val();
		var details = $("#details").val();
		//var product_code = $("#product_code").val();
        $.ajax({
              
            type: "GET",
            data: { product_fullname:product_fullname, product_price:product_price, recurring_frequency:recurring_frequency, paypalemail:paypalemail, trial_period:trial_period, downloadlink:downloadlink, details:details },
              
            url: "ajax/ajax.database.newproduct.php",
            dataType: "html",
            success: function(result){
                if (result.indexOf("Success") > -1)
                {
                    $("#btnSave").html('Successfully Added!!...');
					//$("#error").html('Log:'+result);
					$('#btnSave').addClass("btn-success");
                    $(window.document.location).attr('href','products.php');
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