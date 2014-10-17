<?php
session_start();
include "system/globals.php";

check_if_logged();

$actGetProducts = mysql_query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="http://getbootstrap.com/assets/ico/favicon.ico">

    <title><?php echo $product_name;?> Class Generator</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap/css/dashboard.css" rel="stylesheet">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link href="bootstrap/msgbox/jquery.msgbox.css" rel="stylesheet">
	
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
          <h1 class="page-header">Verification Class Generator</h1>
		  
		<form class="form-horizontal" id="frmGenerateClass" role="form">
        <div class="form-group" id="InformationControls">
    <label for="customer_email" class="col-sm-2 control-label">Product</label>
    <div class="col-sm-10">
     <select class="form-control" id="product">
	 <?php while($row = mysql_fetch_array($actGetProducts)){?>
  <option id="<?php echo $row["product_fullname"];?>"><?php echo $row["product_fullname"];?></option><?php }?>
</select>
    </div>
  </div>
  
  <div class="form-group" id="code" style="display:none">
  <div class="alert alert-success">Your class is ready! Now, just copy that to a file with the name whatever you want, and include it in all your project's files.</div>
    <label for="classcode" class="col-sm-2 control-label">Class Script</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="classcode" rows="20"></textarea>
    </div>
  </div>
  
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" id="btnGenerate" class="btn btn-success">Generate</button>
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
	<script src="bootstrap/msgbox/jquery.msgbox.min.js"></script>
	<script src="ajax/ajax.tools.generateclass.js"></script>

	
		

</body></html>