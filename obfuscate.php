<?php
session_start();
include "system/globals.php";

check_if_logged();

?>

<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="UnrealLicensing System">
    <meta name="author" content="Giovanne Oliveira">
    <link rel="shortcut icon" href="http://getbootstrap.com/assets/ico/favicon.ico">

    <title><?php echo $product_name;?> Obfuscated</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/css/dashboard.css" rel="stylesheet">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  <style type="text/css" id="holderjs-style"></style></head>

  <body>


<?php include "system/html/top-navbar.php";?>

    <div class="container-fluid">
      <div class="row">
        <?php include "system/html/sidebar.php";?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Protect your Script</h1>
		  
		<form class="form-horizontal" id="frmObfuscate" role="form">
        <div class="form-group" id="divtobeobfuscated">
    <label for="customer_email" class="col-sm-2 control-label">Code to be Protected</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="tobeobfuscated" rows="20"></textarea>
    </div>
  </div>
  
  <div class="form-group" id="obfuscated" style="display:none">
    <label for="obfuscatedcode" class="col-sm-2 control-label">Protected Code</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="obfuscatedcode" rows="20"></textarea>
    </div>
  </div>
  
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" id="btnObfuscate" class="btn btn-success">Protect!</button>
    </div>
  </div>
</form>

		
        </div>
      </div>
    </div>
	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/docs.min.js"></script>
	<script src="ajax/ajax.tools.obfuscation.js"></script>
	<script src="bootstrap/js/bootstrap-dialog.min.js"></script>
	<script> 
        var dialog = new BootstrapDialog({
            message: function(dialogRef){
                var $message = $('<div><b>Função Desativada!!</b> </div>');
                var $button = $('<button class="btn btn-danger btn-lg btn-block">Fechar</button>');
                $button.on('click', {dialogRef: dialogRef}, function(event){
                    event.data.dialogRef.close();
                });
                $message.append($button);
        
                return $message;
            },
            closable: false
        });
        dialog.realize();
        dialog.getModalHeader().hide();
        dialog.getModalFooter().hide();
        dialog.getModalBody().css('background-color', '#ff0000');
        dialog.getModalBody().css('color', '#fff');
		</script>
		

</body></html>