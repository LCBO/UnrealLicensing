<?php
session_start();
include "system/globals.php";

check_if_logged();
error_reporting(E_ALL);


if(isset($_GET["data"]))
{
	$decrypt = gauntlet_decryptaes($_GET["data"]);
	$actGetLicenses = mysql_query("SELECT * FROM products WHERE productid=".$decrypt."");
	$LicenseInfos = mysql_fetch_array($actGetLicenses);
	
	
	
}else{
	header("Location: products.php");
}


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

    <title><?php echo $product_name;?> Edit Product</title>

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
          <h1 class="page-header">Edit Product</h1>
		  
		<form class="form-horizontal" id="frmEditLicense" role="form">
  <div class="form-group">
    <label for="product_fullname" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="<?php echo $LicenseInfos["product_fullname"];?>" id="product_fullname" placeholder="Name">
    </div>
  </div>
  <div class="form-group">
    <label for="product_price" class="col-sm-2 control-label">Price</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" value="<?php echo $LicenseInfos["product_price"];?>" id="product_price" placeholder="Price">
    </div>
  </div>
    <div class="form-group">
    <label for="recurring_frequency" class="col-sm-2 control-label">Charge Frequency</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="<?php echo $LicenseInfos["recurring_frequency"];?>" id="recurring_frequency" placeholder="Charge Frequency">
    </div>
  </div>
        <div class="form-group">
    <label for="paypalemail" class="col-sm-2 control-label">Paypal Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="paypalemail" value="<?php echo $LicenseInfos["paypalemail"];?>" placeholder="Paypal Email">
    </div>
  </div>
  
  <div class="form-group">
    <label for="trial_period" class="col-sm-2 control-label">Days in Trial</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="trial_period" value="<?php echo $LicenseInfos["trial_period"];?>" placeholder="Days in Trial">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
	  <input type="hidden" id="productid" value="<?php echo $LicenseInfos["productid"];?>">
      <button type="submit" id="btnSave" class="btn btn-success">Save</button>
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
	<script src="ajax/ajax.database.editproduct.js"></script>

</body></html>