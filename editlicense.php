<?php
session_start();
include "system/globals.php";

check_if_logged();
error_reporting(E_ALL);


if(isset($_GET["data"]))
{
	$decrypt = gauntlet_decryptaes($_GET["data"]);
	$query = "SELECT * FROM licenseinfo WHERE id=".$decrypt."";
//	echo $decrypt;
	$actGetLicenses = mysql_query($query) or die(mysql_error());
	$LicenseInfos = mysql_fetch_array($actGetLicenses);
	
	
	
}else{
	header("Location: licenses.php");
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

    <title><?php echo $product_name;?> Edit License</title>

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
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Edit License</h1>
		  
		<form class="form-horizontal" id="frmEditLicense" role="form">
  <div class="form-group">
    <label for="domain" class="col-sm-2 control-label">Domain</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="<?php echo $LicenseInfos["domain"];?>" id="domain" placeholder="Domain">
    </div>
  </div>
  <div class="form-group">
    <label for="product" class="col-sm-2 control-label">Product</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" disabled value="<?php echo $LicenseInfos["product"];?>" id="product" placeholder="Product">
    </div>
  </div>
    <div class="form-group">
    <label for="licensekey" class="col-sm-2 control-label">License Key</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="<?php echo $LicenseInfos["licensekey"];?>" id="licensekey" placeholder="License Key">
    </div>
  </div>
      <div class="form-group">
    <label for="expiry_date" class="col-sm-2 control-label">Expiration Date</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" value="<?php echo $LicenseInfos["expiry_date"];?>" id="expiry_date" placeholder="Expiration Date">
    </div>
  </div>
        <div class="form-group">
    <label for="customer_email" class="col-sm-2 control-label">Customer E-mail</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="customer_email" value="<?php echo $LicenseInfos["customer_email"];?>" placeholder="Customer Email">
    </div>
  </div>
  
    
      <div class="form-group">
    <label for="joomla_id" class="col-sm-2 control-label">Connected Joomla ID</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="joomla_id" value="<?php echo $LicenseInfos["connected_joomla_id"];?>" placeholder="Connected Joomla ID">
    </div>
  </div>
  
  <div class="form-group">
    <label for="customer_email" class="col-sm-2 control-label">Details</label>
    <div class="col-sm-10">
      <textarea id="details" placeholder="Details" class="form-control" rows="3"><?php echo $LicenseInfos["comments"];?></textarea>

    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
	  <input type="hidden" value="<?php echo $decrypt;?>" id="id" />
      <button type="submit" id="btnSave" class="btn btn-success">Save</button>
    </div>
  </div>
</form>

		<div id="error"></div>
        </div>
      </div>
    </div>
	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/docs.min.js"></script>
	<script src="ajax/ajax.database.savelicense.js?id=1"></script>

</body></html>