$(function(){
    $("#frmEditLicense").submit(function(e){
        e.preventDefault();
  
        var product_fullname = $("#product_fullname").val();
        var product_price = $("#product_price").val();
		var recurring_frequency = $("#recurring_frequency").val();
		var paypalemail = $("#paypalemail").val();
		var trial_period = $("#trial_period").val();
		var productid = $("#productid").val();
        $.ajax({
              
            type: "GET",
            data: { product_fullname:product_fullname, product_price:product_price, recurring_frequency:recurring_frequency, paypalemail:paypalemail, trial_period:trial_period, productid:productid },
              
            url: "ajax/ajax.database.editproduct.php",
            dataType: "html",
            success: function(result){
                if (result.indexOf("Success") > -1)
                {
                    $("#btnSave").html('Edited Successfully!...');
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