<?php

include "system/globals.php";

if(isset($_GET["go"]))
{
	$go = gauntlet_exec($_GET["go"]);
}else{
	$go = $patch;
}
?>

<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="UnrealLicensing PHP Licensing System">
    <meta name="author" content="Giovanne Oliveira">
    <link rel="shortcut icon" href="http://getbootstrap.com/assets/ico/favicon.ico">

    <title><?php echo $product_name;?> Login</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="form-container">

      <form class="form-signin" id="frmLogin" role="form">
        <h2 class="form-signin-heading">Log In To Activate</h2>
        <input class="form-control" placeholder="Username or Access Code" id="username" required="" autofocus="" type="text">
        <input class="form-control" placeholder="Password or Access Key" id="password" required="" type="password">
        <button class="btn btn-lg btn-primary btn-block" id="btnDoLogin" type="submit">Login</button>
		
		
		<div class="progress progress-striped active" id="progressbar" style="display:none">
			<div class="progress-bar block"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
			</div>
			</div>

      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	
	<script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/docs.min.js"></script>
	<script>$(function(){
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
					$("#progressbar").hide();
					$("#btnDoLogin").show();
                    $("#btnDoLogin").html('Redirecting...');
					$('#btnDoLogin').addClass("btn-success");
                    $(window.document.location).attr('href','<?php echo $go;?>');
                    return false;
                }else{
				$("#progressbar").hide();
				$("#btnDoLogin").show();
                $("#btnDoLogin").html('Invalid Login Data!<b> Try Again.');
                $('#btnDoLogin').addClass("btn-danger");
                }
            },
            beforeSend: function(){
                  
                $('#btnDoLogin').css({class:"btn btn-primary disabled"});
             // $("#btnDoLogin").html('Verificando...');
				$("#btnDoLogin").hide();
				$("#progressbar").show();
                  
            },
            error: function(){
				$("#progressbar").hide();
				$("#btnDoLogin").show();
                $("#btnDoLogin").html('Error!<br> Contact the System Admin or SegSIS');
                $('#btnDoLogin').addClass("btn-danger");
            }
        });
        return false;
    });
}); </script>
  

</body></html>